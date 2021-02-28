<?php

namespace App\Services;

use App\Models\Office;
use App\Models\User;

class OfficeService
{
    public static function getUserList()
    {
        return User::select('id', 'name', 'email');
    }

    public static function getUserListExludedDirector($office)
    {
        return OfficeService::getUserList()->where('director_id', '!=', $office->director->id);
    }
}
