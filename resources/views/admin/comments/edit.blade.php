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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title text-center">Comment</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.comment.update', $comment)}}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="comment_id" value="{{ $comment->id }}{{ old('comment_id') }}">
                                <div class="form-group">
                                    <textarea name='body'class="form-control">{{ $comment->body }}</textarea>

                                </div>
                                <button type="submit" class="btn btn-info">Update Comment</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
