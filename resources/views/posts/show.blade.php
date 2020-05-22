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
                 style="background-image: url('/assets/img/mandalorian.jpg'); transform: translate3d(0px, 0px, 0px);">
            </div>
        </div>
        <div class="section bg-dark" >
            <div class="container" style="margin-top: -7%">
                <div class="row">
                    <div class="card bg-info">
                        <div class="col-md-6 mr-auto ml-auto">
                            <div class="card-header ">
                                <br>
                                <img class="rounded img-raised"  src="{{$post->image_url}}" alt="">
                                <br>
                            </div>
                        </div>

                        <div class="card-body">
                            <br>
                            <h2 class="text-white text-center">{{$post->title}}</h2>
                            <hr style="background-color: white">
                            <p class="text-white"><strong>{!! $post->body !!}</strong></p>
                            <hr style="background-color: white">
                        </div>
                        <div class="card-footer col-md-2 ml-auto">

                                <h6 class="text-white">{{$post->created_at}}</h6>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</d>

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