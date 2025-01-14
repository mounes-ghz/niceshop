<?php

namespace Modules\User\Http\Controllers;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;
use Illuminate\Routing\Controller;
use Modules\User\Contracts\Authentication;
use Modules\User\Events\CustomerRegistered;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Http\Requests\PasswordResetRequest;
use Modules\User\Http\Requests\ResetCompleteRequest;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

abstract class BaseAuthController extends Controller
{
    /**
     * The Authentication instance.
     *
     * @var Authentication
     */
    protected $auth;


    /**
     * @param Authentication $auth
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;

        $this->middleware('guest')->except('getLogout');
    }


    /**
     * Show login form.
     *
     * @return Response
     */
    abstract public function getLogin();


    /**
     * Show reset password form.
     *
     * @return Response
     */
    abstract public function getReset();


    /**
     * Login a user.
     *
     * @param LoginRequest $request
     *
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
        try {
            // اطلاعات لاگین
            $credentials = [
                'phone' => $request->phone,
                'password' => $request->password,
            ];
            $remember = (bool) $request->get('remember_me', false);

            $loggedIn = $this->auth->login($credentials, $remember);
            if (!$loggedIn) {
                return back()->withInput()
                    ->withError(trans('user::messages.users.invalid_credentials'));
            }

            return redirect()->intended($this->redirectTo());
        } catch (NotActivatedException $e) {
            return back()->withInput()
                ->withError(trans('user::messages.users.account_not_activated'));
        } catch (ThrottlingException $e) {
            return back()->withInput()
                ->withError(trans('user::messages.users.account_is_blocked', ['delay' => $e->getDelay()]));
        }
    }



    /**
     * Logout current user.
     *
     * @return void
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect($this->loginUrl());
    }


    /**
     * Register a user.
     *
     * @param RegisterRequest $request
     *
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
        $user = $this->auth->registerAndActivate($request->only([
            'first_name',
            'last_name',
            'email',
            'phone',
            'password',
        ]));

        $this->assignCustomerRole($user);

        event(new CustomerRegistered($user));

        return redirect($this->loginUrl())
            ->withSuccess(trans('user::messages.users.account_created'));
    }


    /**
     * Start the reset password process.
     *
     * @param PasswordResetRequest $request
     *
     * @return Response
     */
    public function postReset(PasswordResetRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if (is_null($user)) {
            return back()->withInput()
                ->withError(trans('user::messages.users.no_user_found'));
        }

        $code = $this->auth->createReminderCode($user);
        $route = route('reset.complete', ['phone' => $user->phone, 'code' => $code]);
        $this->sendSMS($user->phone, "برای تغییر رمز عبور به لینک زیر مراجعه کنید:\n $route");

        return back()->withSuccess('کد و لینک بازنشانی به شماره موبایل شما ارسال شد.');
    }


    private function sendSMS($phone, $message)
    {
//        Log::info($message);
//        // کد ارسال SMS از طریق سرویس پیامکی
//        Http::post('https://sms-provider.com/api', [
//            'to' => $phone,
//            'message' => $message,
//            'api_key' => 'YOUR_API_KEY',
//        ]);
    }



    /**
     * Show reset password complete form.
     *
     * @param string $email
     * @param string $code
     *
     * @return Response
     */
    public function getResetComplete($phone, $code)
    {
        $user = User::where('phone', $phone)->firstOrFail();
        if ($this->invalidResetCode($user, $code)) {
            return redirect()->route('reset')
                ->withError(trans('user::messages.users.invalid_reset_code'));
        }

        return $this->resetCompleteView()->with(compact('user', 'code'));
    }



    /**
     * Complete the reset password process.
     *
     * @param string $email
     * @param string $code
     * @param ResetCompleteRequest $request
     *
     * @return Response
     */
    public function postResetComplete($email, $code, ResetCompleteRequest $request)
    {
        $user = User::where('email', $email)->firstOrFail();

        $completed = $this->auth->completeResetPassword($user, $code, $request->new_password);

        if (!$completed) {
            return back()->withInput()
                ->withError(trans('user::messages.users.invalid_reset_code'));
        }

        return redirect($this->loginUrl())
            ->withSuccess(trans('user::messages.users.password_has_been_reset'));
    }


    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    abstract protected function redirectTo();


    /**
     * The login route.
     *
     * @return string
     */
    abstract protected function loginUrl();


    protected function assignCustomerRole($user)
    {
        $role = Role::findOrNew(setting('customer_role'));

        if ($role->exists) {
            $this->auth->assignRole($user, $role);
        }
    }


    /**
     * Reset complete form route.
     *
     * @param User $user
     * @param string $code
     *
     * @return string
     */
    abstract protected function resetCompleteRoute($user, $code);


    /**
     * Password reset complete view.
     *
     * @return string
     */
    abstract protected function resetCompleteView();


    /**
     * Determine the given reset code is invalid.
     *
     * @param User $user
     * @param string $code
     *
     * @return bool
     */
    private function invalidResetCode($user, $code)
    {
        return $user->reminders()->where('code', $code)->doesntExist();
    }
}
