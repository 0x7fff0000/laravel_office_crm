<?php

namespace App\Services;

use App\Models\OfficeUnit;
use App\Models\OfficeUnitMember;

class OfficeUnitService
{
    public static function createUniqueMember(OfficeUnit $unit, $userId)
    {
        $member = new OfficeUnitMember([
            'unit_id' => $unit->id,
            'user_id' => $userId
        ]);
        if ($unit->hasMember($member)) {
            return null;
        }
        $member->save();
        return $member;
    }
}
