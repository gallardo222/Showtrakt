@extends('layouts.layout')

@section('content')

    <div class="container">
        <h4 class="text-center text-white">Popular Movies</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($movies as $movie)
                        @if($movie['media_type'] == 'movie')
                            <div class="col-lg-3 col-md-6" >
                                <div class="card card-product card-plain">
                                    <div class="card-image">
                                        <a href="#">
                                            <img src="https://image.tmdb.org/t/p/w400{{$movie['poster']}}" alt="poster" >
                                        </a>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
