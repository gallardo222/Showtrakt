@extends('admin.layouts.layout')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h6>Edit Post</h6>
                </div>
                <div class="card-body">
                    @include('partials.messages')

                    <form action="{{route('admin.posts.update')}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" required="required" value="{{ $post->title }}" class="form-control" id="titlepost" name="title" aria-describedby="emailHelp" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Body</label>
                            <textarea name='body'class="form-control">{{ $post->body }}</textarea>

                        </div>
                        <button type="submit" class="btn btn-info">Update Post</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
