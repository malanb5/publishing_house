<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @param Request $request
     * @param Book $books
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Book $books){
        return view('books.index', ['books' => $books->getAllWithPagination($request)]);
    }

    /**
     * @param Request $request
     * @param Book $books
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tableIndex(Request $request, Book $books){
        return view('admin.books.index', ['books' => $books->getAllWithPagination($request, 10)]);
    }
}
