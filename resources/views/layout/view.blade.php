<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phone Hospital</title>
    <link rel="shortcut icon" href="{{asset('Saasio')}}/assets/img/fv.png" type="image/x-icon">
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Css Fils -->
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/flaticon-31.css">
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/fontawesome-all.css">
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/typer.css">
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/slick-theme.css">
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/slick.css">
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('Saasio')}}/assets/css/style-31.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body class="apihu-port-body">

<div class="apihu-port-body-overlay"></div>

<!-- Preloader-->
<div class="loading-preloader">
    <div id="loading-preloader">
        <div class="line_shape"></div>
        <div class="line_shape"></div>
        <div class="line_shape"></div>
        <div class="line_shape"></div>
        <div class="line_shape"></div>
        <div class="line_shape"></div>
        <div class="line_shape"></div>
        <div class="line_shape"></div>
        <div class="line_shape"></div>
        <div class="line_shape"></div>
    </div>
</div>
<!-- Preloader End -->

<!-- ScrollTop Button -->
<a href="#" class="apihu-port-scroll-top"><i class="fas fa-chevron-up"></i></a>

@include('layout.header')
<!-- Mobile Menu -->
<div class="apihu-port-mobile-menu">
    <a href="#" class="apihu-port-menu-close"><i class="fas fa-times"></i></a>
    <a href="#" class="apihu-port-logo-wrapper"><img src="{{asset('Saasio')}}/assets/img/logo.png" alt=""></a>
    <ul>
        <li><a href="#apihu-port-hero">Anasayfa</a></li>
        <li><a href="#apihu-port-resume">Kurumsal</a></li>
        <li><a href="#apihu-port-feature">iRepair</a></li>
        <li><a href="#apihu-port-clients">İletişim</a></li>
        <li><a href="#apihu-port-blog">Blog</a></li>
    </ul>
</div>
<!-- Mobile Menu End -->

@yield('content')
<!-- Blog End -->

@include('layout.footer')
<!-- For Js Library -->
<script src="{{asset('Saasio')}}/assets/js/jquery.js"></script>
<script src="{{asset('Saasio')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('Saasio')}}/assets/js/owl.js"></script>
<script src="{{asset('Saasio')}}/assets/js/slick.js"></script>
<script src="{{asset('Saasio')}}/assets/js/waypoints.min.js"></script>
<script src="{{asset('Saasio')}}/assets/js/wow.min.js"></script>
<script src="{{asset('Saasio')}}/assets/js/isotope.pkgd.js"></script>
<script src="{{asset('Saasio')}}/assets/js/typer-new.js"></script>
<script src="{{asset('Saasio')}}/assets/js/appear.js"></script>
<script src="{{asset('Saasio')}}/assets/js/progress-bar.js"></script>
<script src="{{asset('Saasio')}}/assets/js/scripts-31.js"></script>

<link rel="stylesheet" href="{{asset('Saasio')}}/assets/alert/css/as-alert-message.min.css">

<script src="{{asset('Saasio')}}/assets/alert/js/as-alert-message.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var as_alert_default,as_alert_error,
        as_alert_warning,as_alert_success,
        btn_as_alert_default,btn_as_alert_error,
        btn_as_alert_warning,btn_as_alert_success;

    as_alert_default = document.getElementById('default');
    as_alert_error = document.getElementById('error');
    as_alert_warning = document.getElementById('warning');
    as_alert_success = document.getElementById('success');
    // ----------------------------------------------------------
    btn_as_alert_default = document.getElementById('btn-default');
    btn_as_alert_error = document.getElementById('btn-error');
    btn_as_alert_warning = document.getElementById('btn-warning');
    btn_as_alert_success = document.getElementById('btn-success');
</script>
<script>
    function checkStatus() {
       var as_alert_default = document.getElementById('default');

        var imei = $("#ImeiForm").find('input.imei').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '{{route('checkStatus')}}?imei='+imei+'',
            type: 'POST',
            success: function (gelenveri) {
                console.log(gelenveri);
                Swal.fire({
                    title: 'Sonuç!',
                    text: gelenveri.message,
                    icon: 'success',
                    confirmButtonText: 'KAPAT'
                })
            },
            error: function (hata) {

            }
        });
    }
</script>

</body>
</html>
