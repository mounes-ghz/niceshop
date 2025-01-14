<?php

namespace Modules\User\Http\Requests;

use Modules\Core\Http\Requests\Request;

class LoginRequest extends Request
{
    /**
     * Available attributes for users.
     *
     * @var string
     */
    protected $availableAttributes = 'user::attributes.users';


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|regex:/^09[0-9]{9}$/',
            'password' => 'required',
        ];
    }
}
