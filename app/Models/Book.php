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

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'want_to_read'      => 'Ingin Dibaca',
            'currently_reading' => 'Sedang Dibaca',
            'finished'          => 'Selesai',
            default             => ucwords(str_replace('_', ' ', $this->status)),
        };
    }
}