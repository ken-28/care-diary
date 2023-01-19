<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
    ];

    public function family_user()
    {
        return $this->hasOne(FamilyUser::class);
    }

    public function medical_users()
    {
        return $this->belongsToMany(MedicalUser::class)->withTimestamps();
    }

}
