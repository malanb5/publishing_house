@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Books list</h1>
            <p>Here you can see the most famous books</p>
            <hr>

            <div class="">
                <div class="row">

                    @foreach($books as $book)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight">
                                <img src="{{ $book->image }}" class="img-fluid" alt="photo">
                                <a href="#!">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <!--Title-->
                                <h4 class="card-title">{{ $book->name }}</h4>
                                <!--Text-->
                                <p class="card-text">{{ $book->description }}</p>
                                <a href="#" class="btn btn-deep-orange btn-md waves-effect waves-light">Read more</a>
                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>


        </div>
    </div>
</div>
@endsection
