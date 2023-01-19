<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hour',
        'minute',
        'event_content',
    ];

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    public function event_names()
    {
        return $this->belongsToMany(EventName::class)->withTimestamps();
    }

}
