@extends('layouts.layout')

@section('content')
    <br>
    <br>
    <h2 class="text-white text-center font-weight-bold">Blog</h2>
    <div class="container">
        <hr style="background-color: white">
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card card-blog">
                    <div class="card-image">
                        <a href="/blog/{{$post->slug}}">
                            <img class="img rounded" src="{{$post->image_url}}">
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="category text-primary">Movies</h6>
                        <h5 class="card-title">
                            {{$post->title}}
                        </h5>
                        <p class="card-description">
                            {{substr($post->body,0,100)}}...
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection