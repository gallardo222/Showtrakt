@extends('admin.layouts.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="now-ui-icons tech_tv"></i>
                                    </div>
                                    <h3 class="info-title">{{$item['showswatched']}}</h3>
                                    <h6 class="stats-title">Watched TV Shows</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="now-ui-icons media-2_sound-wave"></i>
                                    </div>
                                    <h3 class="info-title">{{$item['moviesswatched']}}</h3>
                                    <h6 class="stats-title">Watched Movies</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-info">
                                        <i class="now-ui-icons users_single-02"></i>
                                    </div>
                                    <h3 class="info-title">{{$user}}</h3>
                                    <h6 class="stats-title">Total Users</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="statistics">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="now-ui-icons ui-2_chat-round"></i>
                                    </div>
                                    <h3 class="info-title">{{$totalcomments}}</h3>
                                    <h6 class="stats-title">Total Comments</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Most Active Users</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($topusers as $topuser)
                            <div class="col-md-2 ml-auto mr-auto">
                                <hr>
                                <h6 class="text-center">{{\App\User::find($topuser->user_id)->name}}</h6>
                                <hr>
                                <div class="img-raised">
                                    <a href="/admin/users/{{$topuser->user_id}}">
                                        <img src="/storage/avatars/{{\App\User::find($topuser->user_id)->avatar}}" alt="poster">
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-3">
                                <p class="text-center">No Users yet!</p>
                            </div>
                        @endforelse
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">
                        Top Movies
                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($topmovies as $topmovie)
                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                    <div class="card-image">
                                        <a target="_blank" href="/item/{{$topmovie->tmdb_id}}/movie">
                                            <img src="https://image.tmdb.org/t/p/w500{{$topmovie->poster}}" alt="poster">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-4">
                                <p>No Movies yet!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">
                        Top TV Shows
                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($toptvshows as $toptvshow)
                            <div class="col-md-4">
                                <div class="card card-product card-plain">
                                <div class="card-image">
                                    <a target="_blank" href="/item/{{$toptvshow->tmdb_id}}/tv">
                                        <img src="https://image.tmdb.org/t/p/w500{{$toptvshow->poster}}" alt="poster">
                                    </a>
                                </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-md-12">
                                <p class="text-center">No TV Shows yet!</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center"> Latest Comments</h4>
                </div>
                <div class="card-body">
                    <hr>
                    @forelse($comments as $comment)
                        <p>{{$comment->body}}</p>
                        <hr>
                    @empty
                        <p>No comments yet!</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>


@endsection