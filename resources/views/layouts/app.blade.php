<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="{{ URL::asset('css/custom-bs.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/custom-bs.css') }}" />

{{--    <link rel="stylesheet" href="css/jquery.fancybox.min.css">--}}
{{--    <link rel="stylesheet" href="css/bootstrap-select.min.css">--}}
{{--    <link rel="stylesheet" href="fonts/icomoon/style.css">--}}
{{--    <link rel="stylesheet" href="fonts/line-icons/style.css">--}}
{{--    <link rel="stylesheet" href="css/owl.carousel.min.css">--}}
{{--    <link rel="stylesheet" href="css/animate.min.css">--}}
{{--    <link rel="stylesheet" href="css/style.css">--}}
<!-- Fonts -->

</head>
<section class="home-section section-hero overlay bg-image" style="background-image: url('https://lastfm.freetls.fastly.net/i/u/arO/d334177b00684d059926c7dc901498a5');" id="home-section">
<body id="top">


<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6"><a href="{{ url('/') }}">IITU Careers</a></div>

                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                        <li><a href="job-listings.html" class="active">Job Listings</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>

                    </ul>
                </nav>

                <div class="ml-auto">
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <ul>
                                @if(Auth::user()->isAdmin())
                                    <li><a href="{{ route('admin.users.index') }}">Admin</a></li>
                                @endif
                                <li><a href="{{ route('user.jobs.index') }}">My jobs</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
<!-- {{--                <div class="right-cta-menu text-right d-flex aligin-items-center col-6">--}}
{{--                    <div class="ml-auto">--}}
{{--                        --}}
{{--                        @else--}}
{{--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
{{--                                {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu" role="menu">--}}
{{--                                @if(Auth::user()->isAdmin())--}}
{{--                                    <li><a href="{{ route('admin.users.index') }}">Admin</a></li>--}}
{{--                                @endif--}}
{{--                                <li><a href="{{ route('user.jobs.index') }}">My jobs</a></li>--}}
{{--                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>--}}
{{--                            </ul>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span--}}
{{--                                class="icon-menu h3 m-0 p-0 mt-2"></span></a>--}}
{{--                </div>--}} -->

            </div>
        </div>
    </header>
    <div>
        @yield('content')
    </div>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</div>
</body>
</section>
</html>