@extends('layouts.layout')

@section('content')
    <br>
    <br>
    <h2 class="text-white text-center font-weight-bold">Blog</h2>
    <div class="container">
        <hr style="background-color: white">
        <div class="row">
            @foreach($comments as $comment)
            <div class="col-md-12" onclick="myFunction2()">
                <div class="card card-blog" style="background-color: #3f9ae5">
                    <div class="card-body">
                        <h6 class="card-title text-center text-white">
                            {{$comment->item_title}}
                            <div class="col-md-6 ml-auto mr-auto">
                                <hr style="background-color: white">

                            </div>
                        </h6>
                        <p class="card-description text-white">
                            {!! substr($comment->body,0,100)!!}...
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
<script>
    function myFunction2() {
        location.href = "/item/{{$comment->item_id}}/{{$comment->media_type}}";
    }
</script>