<?php

namespace App\Libraries;

use App\Models\User;

class Auth
{
    public static function validateUser($email, $password)
    {
        $User = new User();
        $user = $User->where('email', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
