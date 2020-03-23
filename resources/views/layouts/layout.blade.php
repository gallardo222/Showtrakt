<!DOCTYPE html>
<html>

@include('partials.head')

<body class="landing-page bg-dark">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
@include('partials.nav')
<div class="wrapper ">
    <div class="page-header @if(url()->current() == "http://showtrakt.local") page-header-medium @else page-header-small @endif">
        <div class="page-header-image" data-parallax="true" style="background-image: url('/assets/img/mandalorian.jpg');">
        </div>
        <div class="content-center">
            @if(url()->current() == "http://showtrakt.local")
            <div class="container">
                <h1 class="title">Showtrakt</h1>
                <div class="text-center">
                    {{--<a href="#pablo" class="btn btn-primary btn-icon btn-round">--}}
                        {{--<i class="fab fa-facebook-square"></i>--}}
                    {{--</a>--}}
                    {{--<a href="#pablo" class="btn btn-primary btn-icon btn-round">--}}
                        {{--<i class="fab fa-twitter"></i>--}}
                    {{--</a>--}}
                    {{--<a href="#pablo" class="btn btn-primary btn-icon btn-round">--}}
                        {{--<i class="fab fa-google-plus"></i>--}}
                    {{--</a>--}}
                    <img src="/assets/img/showtrakt-logo-sm.png" alt="">
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

    @yield('content')

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
