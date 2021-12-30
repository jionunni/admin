<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset('vendors')}}/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('vendors')}}/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('vendors')}}/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('vendors')}}/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('vendors')}}/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{asset('vendors')}}/jqvmap/dist/jqvmap.min.css">

@stack('header')
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{asset('images')}}/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{asset('images')}}/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                @if(Auth::user()->role_id==1)
                <li class="active">
                    <a href="{{route('user')}}"> <i class="menu-icon fa fa-dashboard"></i>User </a>
                </li>
                <li class="active">
                    <a href="{{route('category')}}"> <i class="menu-icon fa fa-file-text"></i>Category </a>
                </li>
                <li class="active">
                    <a href="{{route('post')}}"> <i class="menu-icon fa fa-file-text"></i>Posts </a>
                </li>
                <li class="active">
                    <a href="{{route('maincomment')}}"> <i class="menu-icon fa fa-file-text"></i>Commets </a>
                </li>
                @else
                    <li class="active">
                        <a href="{{route('maincomment')}}"> <i class="menu-icon fa fa-file-text"></i>Commets </a>
                    </li>
                @endif
                <li class="active">
                    <a href="{{route('mainpage')}}"> <i class="menu-icon fa fa-file-text"></i>Go to Home </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
            </div>

            <div class="col-sm-5">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{asset('storage/user/'.Auth::user()->image)}}" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{route('profile')}}"><i class="fa fa-user"></i> My Profile</a>

                        <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>

                <div class="language-select dropdown" id="language-select">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="language">
                        <div class="dropdown-item">
                            <span class="flag-icon flag-icon-fr"></span>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-es"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-us"></i>
                        </div>
                        <div class="dropdown-item">
                            <i class="flag-icon flag-icon-it"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    @yield('content')
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="{{asset('vendors')}}/jquery/dist/jquery.min.js"></script>
<script src="{{asset('vendors')}}/popper.js/dist/umd/popper.min.js"></script>
<script src="{{asset('vendors')}}/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/js/main.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<script src="{{asset('vendors')}}/chart.js/dist/Chart.bundle.min.js"></script>
<script src="{{asset('assets')}}/js/dashboard.js"></script>
<script src="{{asset('assets')}}/js/widgets.js"></script>
<script src="{{asset('vendors')}}/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="{{asset('vendors')}}/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="{{asset('vendors')}}/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);

</script>
@stack('footer')

</body>

</html>
