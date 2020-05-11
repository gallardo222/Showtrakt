<!DOCTYPE html>
<html>

@include('partials.head')

<div class="product-page">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
@include('partials.nav')

<div class="wrapper">
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('https://image.tmdb.org/t/p/original{{$item['backdrop']}}'); transform: translate3d(0px, 0px, 0px);">
        </div>
    </div>
    <div class="section bg-dark">
        <div class="container ">
            <div class="row">
                <div class="col-md-5">
                    <div class="carousel slide">
                        <img class="d-block img-raised" src="https://image.tmdb.org/t/p/w300{{$item['poster']}}" alt="First slide">
                    </div>
                    <div> <p> </p></div>

                    <div class="col-md-5 ml-5">

                        <form action="{{route('items.store', $item)}}" method="post" style="display: inline;">
                            @csrf

                            <button class="btn {{isset($watched) ? 'btn-facebook' : 'btn-linkedin'}} btn-round ml-3" type="submit">
                                <i class="now-ui-icons media-2_sound-wave"> </i> {{isset($watched) ? 'Watched' : 'Watch'}}
                            </button>
                        </form>

                        <button class="btn btn-linkedin btn-round" type="button" onclick="myFunction2()" style="display: inline;">
                            <i class="now-ui-icons objects_spaceship" href="https://www.themoviedb.org/{{$item['media_type']}}/{{$item['tmdb_id']}}"></i> See on Tmdb
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

                        <button class="btn btn-linkedin ml-5">
                            <i class="now-ui-icons media-2_sound-wave"></i> Tmdb Rating: {{$item['tmdb_rating']}}
                        </button>
                        <button class="btn btn-linkedin ml-5" onclick="myFunction()">
                            <i class="now-ui-icons users_single-02"></i> Full Cast

                        </button>
                    <form action="{{route('item.watchlist', $item)}}" method="post" style="display: inline;">
                        @csrf
                        <button class="btn {{isset($watchlist) ? 'btn-facebook' : 'btn-linkedin'}} ml-5">
                            <i class="now-ui-icons education_agenda-bookmark"></i> Watch List
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
                        <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                            <div class="card card-plain">
                                <div class="card-header" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        Collapsible Group Item #1
                                        <i class="now-ui-icons arrows-1_minimal-down"></i>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                                    <div class="card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                            @foreach($episodes as $season)
                            <div class="col-md-12">
                                <div class="text-white"><h2 class="text_bold text-center">Season {{$season->season_number}}</h2></div>

                                <div class="row">
                                        @foreach($season->episodes as $episode)
                                        <div class="col-lg-3 col-md-3" >

                                        <div class="card card-blog">
                                                <div class="card-image">
                                                    <img class="img rounded" src="https://image.tmdb.org/t/p/w500{{$episode->still_path}}">
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <h6 class="category text-primary">Season {{$episode->season_number}}</h6>
                                                    <h5 class="card-title">
                                                        {{$episode->name}}
                                                    </h5>
                                                    <p class="card-description">
                                                        {{substr($episode->overview,0,100)}}...
                                                    </p>
                                                    <div class="card-footer">
                                                        <form action="{{route('episodes.store', ['tmdb_id'=>$episode->show_id, 'episode_tmdb_id'=>$episode->id])}}" method="post" style="display: inline;">
                                                            @csrf

                                                            <button class="btn {{$episodeiswatched->EpisodeExist(\Illuminate\Support\Facades\Auth::id(),$episode->id) ? 'btn-facebook' : 'btn-linkedin'}} btn-round ml-5" type="submit">
                                                                <i class="now-ui-icons media-2_sound-wave"> </i> {{$episodeiswatched->EpisodeExist(\Illuminate\Support\Facades\Auth::id(),$episode->id) ? 'Watched' : 'Watch'}}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <hr style="background-color: white">
                                @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div></div></div>

<footer class="footer" data-background-color="black">
    <div class="container">
        <a class="footer-brand" href="#pablo">Showtrakt</a>
        <p class="pull-center small">This product uses the TMDb API but is not endorsed or certified by TMDb</p>
        <ul class="social-buttons pull-right">
            <li>
                <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-icon btn-link btn-neutral">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-icon btn-neutral btn-link">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-icon btn-neutral btn-link">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
        </ul>
    </div>
</footer>

<script>
    function myFunction() {
location.href="https://www.themoviedb.org/{{$item['media_type']}}/{{$item['tmdb_id']}}/cast";
    }
    function myFunction2() {
        location.href="https://www.themoviedb.org/{{$item['media_type']}}/{{$item['tmdb_id']}}";
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
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/now-ui-kit.js?v=1.2.2" type="text/javascript"></script>
</body>

</html>