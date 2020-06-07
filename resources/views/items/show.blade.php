<!DOCTYPE html>
<html>

@include('partials.head')

<d class="product-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('partials.nav')

    <div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true"
                 style="background-image: url('https://image.tmdb.org/t/p/original{{$item['backdrop']}}'); transform: translate3d(0px, 0px, 0px);">
            </div>
        </div>
        <div class="section bg-dark">
            <div class="container ">
                <div class="row">
                    <div class="col-md-5">
                        <div class="carousel slide">
                            <img class="d-block img-raised" src="https://image.tmdb.org/t/p/w300{{$item['poster']}}"
                                 alt="First slide">
                        </div>
                        <div><p></p></div>

                        <div class="col-md-5 ml-5">

                            <form action="{{route('items.store', $item)}}" method="post" style="display: inline;">
                                @csrf

                                <button class="btn {{isset($watched) ? 'btn-facebook' : 'btn-linkedin'}} btn-round ml-3"
                                        type="submit">
                                    <i class="now-ui-icons media-2_sound-wave"> </i> {{isset($watched) ? 'Watched' : 'Watch'}}
                                </button>
                            </form>

                            <button class="btn btn-linkedin btn-round" type="button" onclick="myFunction2()"
                                    style="display: inline;">
                                <i class="now-ui-icons objects_spaceship"
                                   href="https://www.themoviedb.org/{{$item['media_type']}}/{{$item['tmdb_id']}}"></i>
                                See on Tmdb
                            </button>
                        </div>

                    </div>
                    <div class="col-md-7 ml-auto mr-auto">
                        <h2 class="title text-white"> {{$item['title']}} </h2>
                        <hr style="background-color: white">
                        <div class="container">
                            <p class="text-white "> {{$item['overview']}} </p>
                        </div>
                        <hr style="background-color: white">
                        <div class="ml-auto mr-auto">

                            <div class="btn btn-linkedin ml-5">
                                <i class="now-ui-icons media-2_sound-wave"></i> Tmdb Rating: {{$item['tmdb_rating']}}
                            </div>

                            <button class="btn btn-linkedin ml-5" onclick="myFunction()">
                                <i class="now-ui-icons users_single-02"></i> Full Cast

                            </button>
                            <form action="{{route('item.watchlist', $item)}}" method="post" style="display: inline;">
                                @csrf
                                <button class="btn {{isset($watchlist) ? 'btn-facebook' : 'btn-linkedin'}} ml-5">
                                    <i class="now-ui-icons education_agenda-bookmark"></i> {{isset($watchlist) ? 'Quit Watch List' : 'Watch List'}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @if(isset($episodes))
                    @inject('episodeiswatched', 'App\Episode')
                    <hr style="background-color: white">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($episodes as $season)
                                    <div id="accordion" role="tablist" aria-multiselectable="true"
                                         class="card-collapse">
                                        <div class="card card-plain">
                                            <div class="card-header" role="tab" id="heading{{$season->season_number}}">
                                                <a data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapse{{$season->season_number}}" aria-expanded="false"
                                                   aria-controls="collapse{{$season->season_number}}" class="collapsed">
                                                    <div class="text-white"><h2 class="text_bold text-center">
                                                            Season {{$season->season_number}}</h2></div>
                                                </a>
                                            </div>

                                            <div id="collapse{{$season->season_number}}" class="collapse"
                                                 role="tabpanel" aria-labelledby="headingOne" style="">
                                                <br>
                                                <div class="row">
                                                    @foreach($season->episodes as $episode)
                                                        <div class="col-lg-3 col-md-3">

                                                            <div class="card card-blog">
                                                                <div class="card-image">

                                                                        @if(!empty($episode->still_path))

                                                                        <img class="img rounded"
                                                                             src="https://image.tmdb.org/t/p/w500{{$episode->still_path}}">
                                                                        </a>
                                                                        @else

                                                                        <img class="img rounded"
                                                                             src="/assets/img/default_episode_image.jpg">
                                                                        </a>

                                                                        @endif


                                                                </div>
                                                                <div class="card-body">
                                                                    <h6 class="category text-primary text-center">
                                                                          Season {{$episode->season_number}} Episode {{$episode->episode_number}}</h6>
                                                                    <h5 class="card-title p-2">
                                                                        {{$episode->name}}
                                                                    </h5>
                                                                    @if(!empty($episode->overview))
                                                                    <p class="card-description p-2">
                                                                        {{substr($episode->overview,0,100)}}...
                                                                    </p>
                                                                    @else

                                                                        <p class="card-description p-2">
                                                                            Coming Soon...
                                                                        </p>

                                                                        @endif
                                                                    <div class="card-footer">
                                                                        <form action="{{route('episodes.store', ['tmdb_id'=>$episode->show_id, 'episode_tmdb_id'=>$episode->id, 'item'=>$item])}}"
                                                                              method="post" style="display: inline;">
                                                                            @csrf

                                                                            @if($episodeiswatched->EpisodeExist(\Illuminate\Support\Facades\Auth::id(),$episode->id))

                                                                                <button class="btn btn-facebook btn-round ml-5"
                                                                                        type="submit">
                                                                                    <i class="now-ui-icons media-2_sound-wave"> </i> Watched
                                                                                </button>

                                                                            @else

                                                                                <button class="btn btn-linkedin btn-round ml-5"
                                                                                        type="submit">
                                                                                    <i class="now-ui-icons media-2_sound-wave"> </i> Watch
                                                                                </button>

                                                                            @endif
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

@include('partials.helpmodal')
                @auth
                    <br><br><br><br>
                    <div class="col-md-12 mr-auto">
                        <h2 class="text-white font-weight-bold" data-toggle="modal" data-target="#helpModal">Comments <small>(Click me)</small></h2>
                    </div>
                    @include('partials.messages')
                    <form action="{{route('comments.create')}}" method="post">
                        @csrf @method('put')

                        <div class="media media-post">
                        <a class="pull-left author" href="#pablo">
                            <div class="avatar">
                                <img class="media-object img-raised" alt="64x64" src="/storage/avatars/{{\Illuminate\Support\Facades\Auth::user()->avatar}}">
                            </div>
                        </a>
                        <div class="media-body">
                            <input type="hidden" name="tmdb_id" id="tmdb_id" value="{{$item['tmdb_id']}}" />
                            <input type="hidden" name="item_title" id="item_title" value="{{$item['title']}}" />
                            <input type="hidden" name="media_type" id="media_type" value="{{$item['media_type']}}" />


                            <textarea class="form-control" name="body" placeholder="What do you think about?" rows="6"></textarea>
                            <div class="media-footer">
                                <button class="btn btn-info btn-wd pull-right">
                                   Post Comment
                                </button>
                            </div>
                        </div>
                        </div>
                    </form>
                @forelse($comments as $comment)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="media">
                                <a class="pull-left" href="#pablo">
                                    <div class="avatar">
                                        <img class="media-object img-raised" alt="64x64" src="/storage/avatars/{{\App\User::find($comment->user_id)->avatar}}">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading text-white">{{\App\User::find($comment->user_id)->name}}
                                    </h5>
                                    <p class="text-white font-weight-bold">{!! $comment->body  !!}</p>
                                </div>
                            </div>
                                <div class="col-md-8 ml-auto mr-auto">
                                    <hr style="background-color: white">
                                </div>
                        </div>
                    </div>
                    @empty
                    <div class="row ">
                        <div class="col-md-12 mr-auto">
                            <h6 class="text-white">No comments yet, be the first!</h6>
                        </div>
                    </div>
                    @endforelse
                @endauth


            </div>
        </div>
    </div>
</d>

<footer class="footer" data-background-color="black">
    <div class="container">
        <a class="footer-brand" href="/">Showtrakt</a>
        <p class="pull-center small">This product uses the TMDb API but is not endorsed or certified by TMDb</p>
        <ul class="social-buttons pull-right">
            <li>
                <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-icon btn-link btn-neutral">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/CreativeTim" target="_blank"
                   class="btn btn-icon btn-neutral btn-link">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank"
                   class="btn btn-icon btn-neutral btn-link">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

<script>
    function myFunction() {
        location.href = "https://www.themoviedb.org/{{$item['media_type']}}/{{$item['tmdb_id']}}/cast";
    }

    function myFunction2() {
        location.href = "https://www.themoviedb.org/{{$item['media_type']}}/{{$item['tmdb_id']}}";
    }
</script>

<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="/assets/js/plugins/moment.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="/assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="/assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/now-ui-kit.js?v=1.2.2" type="text/javascript"></script>
</body>

</html>