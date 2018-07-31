<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'description', 'author_id', 'publisher_id', 'image', 'published_at'
    ];
}
