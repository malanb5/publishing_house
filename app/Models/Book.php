<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Book extends Model
{
    protected $fillable = [
        'name', 'description', 'author_id', 'publisher_id', 'image', 'published_at'
    ];

    /**
     * @param Request $request
     * @return mixed
     */
    public function getAllWithPagination(Request $request){
        return $this->paginate(12);
    }
}
