<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Publisher;

class Book extends Model
{
    protected $fillable = [
        'name', 'description', 'author_id', 'publisher_id', 'image', 'published_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    /**
     * @param Request $request
     * @param int $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPagination(Request $request, $perPage = 12){
        $query = $this->query();
        $query
            ->with('author')
            ->with('publisher')
        ;
        return $query->paginate($perPage);
    }
}
