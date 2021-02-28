<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'director_id',
        'creator_id',
        'title',
        'description'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function director()
    {
        return $this->belongsTo(User::class, 'director_id');
    }

    public function units()
    {
        return $this->hasMany(OfficeUnit::class);
    }
}
