<?php

namespace App\Http\Requests\Admin\Books;

use App\Http\Requests\Request;

class DeleteBookFormRequest extends Request
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'book' => 'required|array',
        ];
    }
}