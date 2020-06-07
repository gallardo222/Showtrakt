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

    <div class="wrapper">
        @include('partials.avatarmodal')
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true"
                 style="background-image: url('/assets/img/mandalorian.jpg'); transform: translate3d(0px, 0px, 0px);">
            </div>
        </div>
        <div class="section bg-dark">
            <div class="container ">
                <div class="row">
                    <div class="col-md-2" >
                        <div class="carousel slide" >
                            <a class="btn btn-link">
                                <img id="profile-image" data-toggle="modal" data-target="#avatarModal" class="d-block img-raised" src="/storage/avatars/{{$user->avatar}}"
                                     alt="First slide">
                            </a>

                        </div>
                        <div><p></p></div>
                    </div>
                    <div class="col-md-10">
                        <div class="card" data-background-color="blue">
                            <div class="card-body">
                                <h6 class="category-social text-center">
                                    <i class="fa fa-fire"></i> Profile
                                </h6>
                                <hr style="background-color: white">
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="category-social">
                                            <i class="now-ui-icons users_single-02"></i> Username: <strong
                                                    style="display: inline;"><i>{{$user->name}}</i></strong>
                                        </h6>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="category-social">
                                            <i class="now-ui-icons ui-1_email-85"></i> Email: <strong
                                                    style="display: inline;"><i>{{$user->email}}</i></strong>
                                        </h6>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="category-social">
                                            <i class="now-ui-icons users_single-02"></i> Custom Title: <strong
                                                    style="display: inline;"><i>{{isset($user->custom_title) ? $user->custom_title : 'Muggle'}}</i></strong>
                                        </h6>
                                    </div>
                                </div>
                                <hr style="background-color: white">
                                <br>
                                <p class="card-description text-center">
                                    <strong><i>"{{$user->phrase[0]}}"</i></strong>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="card" data-background-color="blue"
                             style="padding-top: -3%; background-color: royalblue">
                            <div class="card-body">
                                <h5 class="category-social text-center">
                                    <i class="now-ui-icons business_chart-bar-32"></i> TV Shows Stats
                                </h5>
                                <hr style="background-color: white">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h4 class="category-social">
                                            <i class="now-ui-icons media-2_sound-wave"></i> Watched: <strong
                                                    style="display: inline;"><i>{{$user->userItemsWatched['showswatched']}}</i></strong>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h4 class="category-social">
                                            <i class="now-ui-icons education_agenda-bookmark"></i> Watchlist: <strong
                                                    style="display: inline;"><i>{{$user->userItemsWatched['showswatchlist']}}</i></strong>
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="card" data-background-color="blue"
                             style="padding-top: -3%; background-color: #0062cc">
                            <div class="card-body">
                                <h5 class="category-social text-center">
                                    <i class="now-ui-icons business_chart-bar-32"></i> Movies Stats
                                </h5>
                                <hr style="background-color: white">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h4 class="category-social">
                                            <i class="now-ui-icons media-2_sound-wave"></i> Watched: <strong
                                                    style="display: inline;"><i>{{$user->userItemsWatched['moviesswatched']}}</i></strong>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h4 class="category-social">
                                            <i class="now-ui-icons education_agenda-bookmark"></i> Watchlist: <strong
                                                    style="display: inline;"><i>{{$user->userItemsWatched['moviesswatchlist']}}</i></strong>
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="card" data-background-color="blue"
                             style="padding-top: -3%; background-color: #3b5998">
                            <div class="card-body">
                                <h5 class="category-social text-center">
                                    <i class="now-ui-icons sport_trophy"></i> Ranking
                                </h5>
                                <hr style="background-color: white">
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h4 class="category-social">
                                            <i class="now-ui-icons media-1_button-play"></i> Movies: <strong
                                                    style="display: inline;"><i>{{isset($user->topusersMovie) ? $user->topusersMovie + 1 : $user->totalusers}} of {{$user->totalusers}}</i>
                                                Users</strong>
                                        </h4>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h4 class="category-social">
                                            <i class="now-ui-icons tech_tv"></i> TV Shows: <strong
                                                    style="display: inline;"><i>{{isset($user->topusersTv) ? $user->topusersTv + 1 : $user->totalusers}} of {{$user->totalusers}}</i>
                                                Users</strong>
                                        </h4>
                                    </div>

                                </div>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <h4 class="category-social">
                                            <i class="now-ui-icons objects_spaceship"></i> General: <strong
                                                    style="display: inline;"><i>{{isset($user->topusers) ? $user->topusers + 1 : $user->totalusers}} of {{$user->totalusers}}</i>
                                                Users</strong>
                                        </h4>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <br>
                <br>
                <hr style="background-color: white">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-white">TV Shows watchlist</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="scrolling-wrapper-flexbox">
                        @forelse($items as $item)


                            @if($item->media_type == 'tv' && $item->watchlist == 1)
                                <div class="col-md-2">
                                    <div class="card card-product card-plain">
                                        <div class="card-image">
                                            <a href="/item/{{$item->tmdb_id}}/{{$item->media_type}}">
                                                <img src="https://image.tmdb.org/t/p/w500{{$item->poster}}"
                                                     alt="poster">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @empty
                                <p class="text-white">
                                    You haven't seen anything yet. Please, start your Journey!</p>
                        @endforelse
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-white">TV Shows watched</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="scrolling-wrapper-flexbox">
                        @forelse($items as $item)


                            @if($item->media_type == 'tv' && $item->watched == 1)
                                <div class="col-md-2">
                                    <div class="card card-product card-plain">
                                        <div class="card-image">
                                            <a href="/item/{{$item->tmdb_id}}/{{$item->media_type}}">
                                                <img src="https://image.tmdb.org/t/p/w500{{$item->poster}}"
                                                     alt="poster">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @empty
                            <p class="text-white">
                                You haven't seen anything yet. Please, start your Journey!</p>
                        @endforelse
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-white">Movies Watchlist</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="scrolling-wrapper-flexbox">
                        @forelse($items as $item)


                            @if($item->media_type == 'movie' && $item->watchlist == 1)
                                <div class="col-md-2">
                                    <div class="card card-product card-plain">
                                        <div class="card-image">
                                            <a href="/item/{{$item->tmdb_id}}/{{$item->media_type}}">
                                                <img src="https://image.tmdb.org/t/p/w500{{$item->poster}}"
                                                     alt="poster">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @empty
                            <p class="text-white">
                                You haven't seen anything yet. Please, start your Journey!</p>
                        @endforelse
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="text-white">Movies watched</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="scrolling-wrapper-flexbox">
                        @forelse($items as $item)


                            @if($item->media_type == 'movie' && $item->watched == 1)
                                <div class="col-md-2">
                                    <div class="card card-product card-plain">
                                        <div class="card-image">
                                            <a href="/item/{{$item->tmdb_id}}/{{$item->media_type}}">
                                                <img src="https://image.tmdb.org/t/p/w500{{$item->poster}}"
                                                     alt="poster">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @empty
                            <p class="text-white">
                                You haven't seen anything yet. Please, start your Journey!</p>
                        @endforelse
                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <a class="btn btn-link" href="/comments/show">
                        <h6 class="text-white">Latest Comments</h6>
                    </a>
                </div>
                <div class="row">
                    @forelse($user->comments as $comment)
                        <div class="col-md-12">
                            <p class="text-white font-italic">{!!$comment->body!!}</p>
                            <hr style="background-color: white">

                        </div>
                    @empty
                    <p class="text-white">
                        You haven't made any comments yet</p>
                    @endforelse
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