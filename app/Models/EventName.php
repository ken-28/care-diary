<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventName extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
    ];

    public function diary_events()
    {
        return $this->belongsToMany(DiaryEvent::class)->withTimestamps();
    }

}
