<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mediatype extends Model
{
    use HasFactory;
    protected $table = "media_type";
    protected $fillable = [
        'name',
    ];
}
