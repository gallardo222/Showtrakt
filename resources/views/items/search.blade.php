@extends('layouts.layout')

@section('content')

    <div class="row">
        <div class="col-sm-6 col-lg-8 ml-auto mr-auto">
            <form action="{{route('item.search')}}" method="GET" style="display: inline;">
                @csrf
                <div class="input-group" style="margin-top: -2%">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" id="search" name="search" class="form-control text-center"
                           placeholder="Search...." style="background-color: white">

                </div>

            </form>
        </div>
    </div>
    <br>
    <div class="container">
        @if(isset($items))
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion" role="tablist" aria-multiselectable="true"
                         class="card-collapse">
                        <div class="card card-plain">
                            <div class="card-header" role="tab" id="headingmovies">
                                <a data-toggle="collapse" data-parent="#accordion"
                                   href="#collapsemovies" aria-expanded="false"
                                   aria-controls="collapsemovies" class="collapsed">
                                    <div class="text-white"><h2 class="text_bold text-center">
                                            Movies</h2></div>
                                </a>
                            </div>

                            <div id="collapsemovies" class="collapse"
                                 role="tabpanel" aria-labelledby="headingOne" style="">
                                <div class="row">
                                    @foreach($items as $item)

                                        @if($item['media_type'] == 'movie' && !empty($item['poster']))
                                            <div class="col-lg-2 col-md-6">
                                                <div class="card card-product card-plain">
                                                    <div class="card-image">
                                                        <a href="/item/{{$item['tmdb_id']}}/{{$item['media_type']}}">
                                                            <img src="https://image.tmdb.org/t/p/w500{{$item['poster']}}"
                                                                 alt="poster" class="rounded img-raised">
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
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion" role="tablist" aria-multiselectable="true"
                         class="card-collapse">
                        <div class="card card-plain">
                            <div class="card-header" role="tab" id="headingshows">
                                <a data-toggle="collapse" data-parent="#accordion"
                                   href="#collapseshows" aria-expanded="false"
                                   aria-controls="collapseshows" class="collapsed">
                                    <div class="text-white"><h2 class="text_bold text-center">
                                            TV Shows</h2></div>
                                </a>
                            </div>

                            <div id="collapseshows" class="collapse"
                                 role="tabpanel" aria-labelledby="headingOne" style="">
                                <div class="row">
                                    @foreach($items as $item)

                                        @if($item['media_type'] == 'tv' && !empty($item['poster']))
                                            <div class="col-lg-2 col-md-6">
                                                <div class="card card-product card-plain">
                                                    <div class="card-image">
                                                        <a href="/item/{{$item['tmdb_id']}}/{{$item['media_type']}}">
                                                            <img src="https://image.tmdb.org/t/p/w500{{$item['poster']}}"
                                                                 alt="poster" class="rounded img-raised">
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

        @else

            <div class="container" style="align-items: center; !important">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <img src="assets/img/showtrakt-logo-bg.png" alt="Rounded Image" class="rounded"
                             style="opacity: 20%;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-8">
                        <p class="text-white">I'm Sorry Barry, we didn't find your mother's killer </p>
                    </div>

                </div>
            </div>
        @endif
            <br>
    </div>





@endsection
