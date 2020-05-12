@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-sm-6 col-lg-9">
            <form action="{{route('item.search')}}" method="GET" style="display: inline;">
                @csrf
            <div class="input-group" style="margin-top: -2%">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                </div>
                <input type="text" id="search" name="search" class="form-control text-center" placeholder="Search...." style="background-color: white">
            </div>
            </form>
        </div>
    </div>

    <div class="row">
        @if(isset($item))

        @else

            <div class="container" style="align-items: center">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="assets/img/showtrakt-logo-bg.png" alt="Rounded Image" class="rounded" style="opacity: 40%;">
                    </div>
                </div>
                <div class="row">
                    <p class="text-white">I'm Sorry Barry, we didn't find your mother's killer </p>
                </div>
            </div>



        @endif
    </div>





@endsection
