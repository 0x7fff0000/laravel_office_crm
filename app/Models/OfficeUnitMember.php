<?php

namespace App\Models;

use App\Models\OfficeUnit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeUnitMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'user_id'
    ];

    public function unit()
    {
        return $this->belongsTo(OfficeUnit::class);
    }
}
