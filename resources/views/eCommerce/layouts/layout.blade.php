<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Ecommerce Online Shopping</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="E-commerce Fashion shopping" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- //for-mobile-apps -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fasthover.css') }}">

    <!-- js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- //js -->

    <!-- cart -->
    <script src="{{ asset('js/simpleCart.min.js') }}"></script>
    <!-- cart -->

    <!-- for bootstrap working -->
    <script src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
    <!-- //for bootstrap working -->

    <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <!-- start-smooth-scrolling -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
<!-- //end-smooth-scrolling -->
</head>
	
<body>
<!-- header -->
    @yield('women-fashion-header')
<!-- //header -->
<!-- banner -->
    @yield('women-fashion-banner')
<!-- //banner -->

<!-- breadcrumbs -->
    @yield('breadcrumbs')
<!-- //breadcrumbs -->

<!-- content -->
    @yield('content')
<!-- //content -->

<!-- javascript -->
    @yield('javascript')
<!-- //javascript -->

<!-- footer -->
    @yield('footer')
<!-- //footer -->
</body>
</html>
