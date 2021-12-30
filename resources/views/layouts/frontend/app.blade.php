<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Author Meta -->
    <meta name="author" content="colorlib" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Blogger</title>

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700"
        rel="stylesheet"
    />
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/linearicons.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/owl.carousel.css" />
    <link rel="stylesheet" href="{{asset('frontend')}}/css/main.css" />
    <style>
        .menu1{
            /* border: 1px solid #333; */
            margin-left: -5rem;

        }

        .c1{
            color: #007bff;
        }
    </style>
</head>
<body>
<!-- Start Header Area -->
<header class="default-header">
   @include('layouts.frontend.partials.header')
</header>
<!-- End Header Area -->
{{--start main content area--}}
@yield('content')
<!-- End main content area -->

<!-- start footer Area -->
@include('layouts.frontend.partials.footer')
<!-- End footer Area -->

<script src="{{asset('frontend')}}/js/vendor/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="{{asset('frontend')}}/js/vendor/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('frontend')}}/js/parallax.min.js"></script>
<script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('frontend')}}/js/jquery.sticky.js"></script>
<script src="{{asset('frontend')}}/js/main.js"></script>
@stack('footer')
</body>
</html>
