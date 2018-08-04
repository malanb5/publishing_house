<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Author;

class Book extends Model
{
    protected $fillable = [
        'name', 'description', 'author_id', 'publisher_id', 'image', 'published_at'
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getAllWithPagination(Request $request){
        $query = $this->query();
        $query->with('author');
        return $query->paginate(12);
    }
}
