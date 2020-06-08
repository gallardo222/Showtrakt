@extends('layouts.layout')

@section('content')
    <br>
    <br>
    <h2 class="text-white text-center font-weight-bold">Blog</h2>
    <div class="container">
        <hr style="background-color: white">
        <div class="row">

        @forelse($posts->reverse() as $post)

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

        @empty
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5 ml-auto mr-auto">
                        <br><br>
                        <h6 class="text-white">We are sorry, but right now this blog have no Post</h6>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-7">
                    <img src="assets/img/showtrakt-logo-bg.png" alt="Rounded Image" class="rounded"
                         style="opacity: 20%;">
                    <br><br><br>
                </div>
            </div>


            @endforelse
        </div>

    </div>

@endsection