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
                            <img class="avatar border-gray" src="/storage/avatars/{{\App\User::find($comment->user_id)->avatar}}" alt="...">
                            <h5 class="title text-info">{{\App\User::find($comment->user_id)->name}}</h5>

                    </div>
                    <br>
                    <hr>
                    <br>
                    <p class="description text-center">
                        {{$phrase[0]}}
                    </p>
                    <br>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title text-center">Comment</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-center font-italic" style="solid-color: #3f9ae5">"{{ $comment->body}}"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
