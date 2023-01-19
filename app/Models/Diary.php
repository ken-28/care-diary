<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_water_amount',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function diary_comments()
    {
        return $this->hasMany(DiaryComment::class);
    }

    public function diary_events()
    {
        return $this->hasMany(DiaryEvent::class);
    }
}
