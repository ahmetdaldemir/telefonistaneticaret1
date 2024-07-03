<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="multikart">
    <meta name="keywords" content="multikart">
    <meta name="author" content="multikart">
    <link rel="icon" href="{{asset('ecommerce/images/favicon/20.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('ecommerce/images/favicon/20.png')}}" type="image/x-icon">
    <title>Multikart - Multi-purpose E-commerce Html Template</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/vendors/font-awesome.css')}}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/vendors/slick-theme.css')}}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/vendors/animate.css')}}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/vendors/themify-icons.css')}}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/vendors/bootstrap.css')}}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('ecommerce/css/style.css')}}">


</head>

<body class="theme-color-23">


@include('layout.ecommerce.header')
@yield('content')
@include('layout.ecommerce.footer')


<!-- latest jquery-->
<script src="{{asset('ecommerce/js/jquery-3.3.1.min.js')}}"></script>

<!-- slick js-->
<script src="{{asset('ecommerce/js/slick.js')}}"></script>
<script src="{{asset('ecommerce/js/slick-animation.min.js')}}"></script>

<!-- menu js-->
<script src="{{asset('ecommerce/js/menu.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('ecommerce/js/lazysizes.min.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('ecommerce/js/feather.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('ecommerce/js/bootstrap.bundle.min.js')}}"></script>

<!-- Bootstrap Notification js-->
<script src="{{asset('ecommerce/js/bootstrap-notify.min.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('ecommerce/js/theme-setting.js')}}"></script>
<script src="{{asset('ecommerce/js/script.js')}}"></script>
<script src="{{asset('ecommerce/js/custom-slick-animated.js')}}"></script>
@yield('customJS')


<script>
    $(window).on('load', function () {
        setTimeout(function () {
            $('#exampleModal').modal('show');
        }, 2500);
    });
    feather.replace();

    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }

    $(document).ready(function(){
        $('#orderTrackingForm').submit(function(e){
            e.preventDefault(); // Formun normal submit işlemini engelle
            var formData = $(this).serialize(); // Form verilerini al
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var form = $(this); // Form elementini bir değişkende sakla

            $.ajax({
                type: 'POST',
                url: form.attr('action'), // Formun action özelliğine göre URL'ye istek yap
                data: formData, // Form verilerini isteğe ekle
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // İstek başarılı olduğunda burası çalışır
                    $('.content').html('<div class="alert__wrapper"><div class="alert alert-danger alert-dismissible fade show" role="alert">'+response+'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div></div>');
                },
                error: function(xhr, status, error) {
                    // İstek başarısız olduğunda burası çalışır
                    console.error('İstek hatası:', status, error);
                }
            });
        });
    });

</script>

</body>

</html>
