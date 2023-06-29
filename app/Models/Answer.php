<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = "answer";

    protected $fillable = [
        'answer_by',
        'question_id',
        'media',
        'comments'
    ];

    // public function answer()
    // {
    //     return $this->belongsTo('App\Models\Question');
    // }
}
