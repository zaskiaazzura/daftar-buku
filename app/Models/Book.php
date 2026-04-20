<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'genre',
        'pages',
        'cover',
        'status',
        'started_at',
        'finished_at',
        'rating'
    ];
}