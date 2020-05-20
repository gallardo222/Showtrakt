<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Now UI Dashboard PRO by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/dashboard-pro/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/dashboard-pro/assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
    @stack('styles')

    <style>
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        ::-webkit-scrollbar-button {
            width: 13px;
            height: 13px;
        }
        ::-webkit-scrollbar-thumb {
            background: #0395b2;
            border: 2px none #ffffff;
            border-radius: 93px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #1d2ac7;
        }
        ::-webkit-scrollbar-thumb:active {
            background: #3f60df;
        }
        ::-webkit-scrollbar-track {
            background: #666666;
            border: 3px none #ffffff;
            border-radius: 77px;
        }
        ::-webkit-scrollbar-track:hover {
            background: #666666;
        }
        ::-webkit-scrollbar-track:active {
            background: #333333;
        }
        ::-webkit-scrollbar-corner {
            background: transparent;
        }
    </style>
</head>

<body class=" sidebar-mini  ">
<div class="wrapper  ">
@include('admin.partials.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
        @include('admin.partials.navbar')
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm">
            <canvas id="bigDashboardChart"></canvas>
        </div>
        <div class="content">
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
</div>
<!--   Core JS Files   -->
<script src="/dashboard-pro/assets/js/core/jquery.min.js"></script>
<script src="/dashboard-pro/assets/js/core/popper.min.js"></script>
<script src="/dashboard-pro/assets/js/core/bootstrap.min.js"></script>
<script src="/dashboard-pro/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="/dashboard-pro/assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/dashboard-pro/assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="/dashboard-pro/assets/js/plugins/sweetalert2.min.js"></script>
<!-- Forms Validations Plugin -->
<script src="/dashboard-pro/assets/js/plugins/jquery.validate.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="/dashboard-pro/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="/dashboard-pro/assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="/dashboard-pro/assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="/dashboard-pro/assets/js/plugins/jquery.dataTables.min.js"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="/dashboard-pro/assets/js/plugins/bootstrap-tagsinput.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/dashboard-pro/assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="/dashboard-pro/assets/js/plugins/fullcalendar.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="/dashboard-pro/assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/dashboard-pro/assets/js/plugins/nouislider.min.js"></script>
<!-- Chart JS -->
<script src="/dashboard-pro/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/dashboard-pro/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/dashboard-pro/assets/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>

@stack('scripts')
</body>

</html>