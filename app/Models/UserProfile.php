<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userProfile extends Model
{
    use HasFactory;
    protected $table = "userprofile";
    protected $fillable = [
        'user_id',
        'photo',
        'title',
        'about',
        'experience',
        'location',
        'cause',
        'recommandations'
    ];
}
