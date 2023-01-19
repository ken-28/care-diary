<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'isLeader',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withTimestamps();
    }
}
