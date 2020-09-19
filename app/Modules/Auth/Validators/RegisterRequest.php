<?php


namespace App\Modules\Auth\Validators;

use App\Common\Bases\Request;

/**
 * Class RegisterRequest
 * @package App\Modules\Auth\Requests
 */
class RegisterRequest extends Request
{

    /**
     * @return string[]
     */
    protected function postRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|confirmed|string|min:6'
        ];
    }
}
