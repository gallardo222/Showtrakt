@extends('admin.layouts.layout')

@push('styles')
    <style>
        .scrolling-wrapper-flexbox {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;

        .card {
            flex: 0 0 auto;
        }
        }
    </style>
@endpush

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="/storage/background-profile.jpg" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                            <img class="avatar border-gray" src="/storage/avatars/{{$user->avatar}}" alt="...">
                            <h5 class="title text-info">{{$user->name}}</h5>

                    </div>
                    <br>
                    <hr>
                    <br>
                    <br>
                    <p class="description text-center">
                        {{$phrase[0]}}
                    </p>
                    <br>
                    <hr>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="category-social text-center ">
                                 TV Shows: <strong style="display: inline;"><i>{{$userItemsWatched['showswatched']}}</i></strong>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="category-social text-center">
                                Movies: <strong style="display: inline;"><i>{{$userItemsWatched['moviesswatched']}}</i></strong>
                            </h5>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="title text-center">Last Comments</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <p class="description text-center">Jojo Rabbit sucks</p>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <p class="description text-center">Ash FTW</p>
                            <hr>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="description text-center">It could be better</p>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="description text-center">That plot twist</p>
                            <hr>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="description text-center">Such great finale</p>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="description text-center">Such disappointment</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title text-center">Progress</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>TV Shows watchlist</label>
                        </div>
                    </div>
                        <div class="scrolling-wrapper-flexbox">
                            @foreach($items as $item)


                                @if($item->media_type == 'tv' && $item->watchlist == 1)
                                    <div class="col-md-2" >
                                        <div class="card card-product card-plain">
                                            <div class="card-image">
                                                <a href="/item/{{$item->tmdb_id}}/{{$item->media_type}}">
                                                    <img src="https://image.tmdb.org/t/p/w500{{$item->poster}}" alt="poster" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>TV Shows watched</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="scrolling-wrapper-flexbox">
                            @foreach($items as $item)


                                @if($item->media_type == 'tv' && $item->watched == 1)
                                    <div class="col-md-2" >
                                        <div class="card card-product card-plain">
                                            <div class="card-image">
                                                <a href="/item/{{$item->tmdb_id}}/{{$item->media_type}}">
                                                    <img src="https://image.tmdb.org/t/p/w500{{$item->poster}}" alt="poster" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Movies Watchlist</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="scrolling-wrapper-flexbox">
                            @foreach($items as $item)


                                @if($item->media_type == 'movie' && $item->watchlist == 1)
                                    <div class="col-md-2" >
                                        <div class="card card-product card-plain">
                                            <div class="card-image">
                                                <a href="/item/{{$item->tmdb_id}}/{{$item->media_type}}">
                                                    <img src="https://image.tmdb.org/t/p/w500{{$item->poster}}" alt="poster" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Movies watched</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="scrolling-wrapper-flexbox">
                            @foreach($items as $item)


                                @if($item->media_type == 'movie' && $item->watched == 1)
                                    <div class="col-md-2" >
                                        <div class="card card-product card-plain">
                                            <div class="card-image">
                                                <a href="/item/{{$item->tmdb_id}}/{{$item->media_type}}">
                                                    <img src="https://image.tmdb.org/t/p/w500{{$item->poster}}" alt="poster" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
