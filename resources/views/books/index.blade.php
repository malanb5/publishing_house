@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Books list</h1>
            <p>Here you can see the most famous books</p>
            <hr>

            <!-- Items container >> -->
            <div class="row">

                @forelse($books as $book)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="{{ $book->image }}" class="img-fluid" alt="{{ $book->name }}">
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Meta-->
                                <div class="meta d-flex justify-content-between mb-3">
                                    <span class="autor_name"><i>{{ $book->author->name }}</i></span>
                                    <span class="published_date">{{ $book->published_at }}</span>
                                </div>
                                <div class="meta d-flex justify-content-between mb-3">
                                    <span class="autor_name"><b>{{ $book->publisher->name }}</b></span>
                                </div>
                                <!--Title-->
                                <h4 class="card-title">{{ $book->name }}</h4>
                                <!--Text-->
                                <p class="card-text">{{ $book->description }}</p>
                                <a href="#" class="btn btn-deep-orange btn-md waves-effect waves-light">Read more</a>
                            </div>

                        </div>
                    </div>
                @empty
                    <p class="col-sm-12 mb-4">No book yet</p>
                @endforelse

            </div>
            <!-- << Items container  -->

            <div class="page-navigation">
                {{ $books->links() }}
            </div>


        </div>
    </div>
</div>
@endsection
