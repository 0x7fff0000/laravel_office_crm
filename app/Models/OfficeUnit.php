<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'title',
        'description',
        'address'
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function members()
    {
        return $this->hasMany(OfficeUnitMember::class);
    }

    public function hasMember(OfficeUnitMember $member)
    {
        return $this->members()->where('user_id', $member->id);
    }
}
