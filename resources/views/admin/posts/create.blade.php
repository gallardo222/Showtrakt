@extends('admin.layouts.layout')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h6>Create new Post</h6>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('admin.posts.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" required="required" value="{{ old('title') }}" class="form-control" id="titlepost" name="title" aria-describedby="emailHelp" placeholder="Enter title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Url</label>
                            <input type="text" required="required" value="{{ old('image_url') }}" class="form-control" id="image_url" name="image_url" aria-describedby="emailHelp" placeholder="Enter image Url">
                        </div>
                        <div class="form-group" >
                            <label for="exampleInputEmail1">Body</label>
                            <textarea name='body'class="form-control">{{ old('body') }}</textarea>

                        </div>
                        <button type="submit" class="btn btn-info">Create Post</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

