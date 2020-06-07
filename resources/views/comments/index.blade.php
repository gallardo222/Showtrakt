@extends('layouts.layout')

@section('content')
    <br>
    <br>
    <h2 class="text-white text-center font-weight-bold">Your Comments</h2>
    <div class="container">
        <hr style="background-color: white">

        <div class="row">
            @forelse($comments as $comment)
            <div class="col-md-12" onclick="myFunction2()">
                <div class="card card-blog" style="background-color: #3b5998">
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
            @empty
                    <div class="col-md-12">
                        <br><br><br>
                        <h6 class="text-white text-center">Sorry but you don't have any comment yet.</h6>
                        <br><br><br>
                    </div>
                </div>

            @endforelse
        </div>
        <div class="container">
            <div class="row" style="background-color: #3b5998;">
                <div class="col-md-4"></div>
                <div class="col-md-6 ml-auto mr-auto text-white" style="margin-top: 1.5%" >
                    {{$comments->links()}}
                </div>
            </div>
        </div>




    </div>

@endsection
@if(! empty($comments) && isset($comment))

@push('scripts')
    <script>
        function myFunction2() {
            location.href = "/item/{{$comment->item_id}}/{{$comment->media_type}}";
        }
    </script>
@endpush
@endif