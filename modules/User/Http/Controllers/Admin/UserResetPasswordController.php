<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Http;
use Modules\User\Contracts\Authentication;

class UserResetPasswordController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store($id, Authentication $auth)
    {
        $user = User::findOrFail($id);
        $code = $auth->createReminderCode($user);
        $this->sendSMS($user->phone, "کد بازیابی رمز عبور شما: $code");
//        Mail::to($user)
//            ->send(new ResetPasswordEmail($user, $this->getResetCompleteURL($user, $code)));
        return redirect()->route('admin.users.index')
            ->withSuccess(trans('user::messages.users.reset_password_email_sent'));
    }

    private function sendSMS($phone, $message)
    {
        Http::post('https://sms-provider.com/api/send', [
            'to' => $phone,
            'message' => $message,
            'api_key' => 'API_KEY_YOU_RECEIVED_FROM_PROVIDER',
        ]);
    }

    private function getResetCompleteURL($user, $code)
    {
        return route('admin.reset.complete', [$user->email, $code]);
    }
}
