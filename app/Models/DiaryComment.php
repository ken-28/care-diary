<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'diary_comment',
        'image',
    ];

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

}
