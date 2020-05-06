<!DOCTYPE html>
<html>

@include('partials.head')

<body class="product-page">
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

                    <form action="{{route('items.store', $item)}}" method="post">
                        @csrf

                        <button class="btn btn-linkedin btn-round ml-3" type="submit">
                            <i class="now-ui-icons media-2_sound-wave"> </i> Watched
                        </button>

                    </form>


                    <button class="btn btn-linkedin btn-round ml-2" type="button" onclick="myFunction2()">
                        <i class="now-ui-icons objects_spaceship" href="https://www.themoviedb.org/{{$item['media_type']}}/{{$item['tmdb_id']}}"></i> See on Tmdb
                    </button>
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
                        <button class="btn btn-linkedin ml-5">
                            <i class="now-ui-icons education_agenda-bookmark"></i> Watch List
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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