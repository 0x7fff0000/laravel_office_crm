<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public static function createUser($attributes = [])
    {
        $user = new User($attributes);
        $user->password = bcrypt($user->password);
        $user->save();
        return $user;
    }
}
