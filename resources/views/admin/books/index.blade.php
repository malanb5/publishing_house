@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Edit Books list</h1>
                <p>Admin zone for edit books</p>
                <hr>

                <!-- Items container >> -->
                <div class="row">
                    <div class="col-sm-12 mb-4">
                        <book-index
                                props_books="{{ collect($books) }}"
                                books_index_url="{{ route('admin.books.index') }}"
                        ></book-index>
                    </div>

                </div>
                <!-- << Items container  -->

                <div class="page-navigation">
                    {{ $books->links() }}
                </div>


            </div>
        </div>
    </div>
@endsection
