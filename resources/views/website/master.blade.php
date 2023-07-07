<!DOCTYPE html>
<html lang="zxx">



<head>
    <meta charset="utf-8">
    <title>Online Course Management- @yield('title')</title>


    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/bootstrap/bootstrap.min.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/magnific-popup/magnific-popup.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/slick/slick-theme.css">
    <!-- themify icon -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/themify-icons/themify-icons.css">
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/animate/animate.css">
    <!-- Aos -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/aos/aos.css">
    <!-- swiper -->
    <link rel="stylesheet" href="{{asset('/')}}website/plugins/swiper/swiper.min.css">
    <!-- Stylesheets -->
    <link href="{{asset('/')}}website/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/')}}fontawesome-free-6.4.0-web/css/all.min.css">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('/')}}website/images/logo3.png" type="image/x-icon">
    <link rel="icon" href="{{asset('/')}}website/images/logo3.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />

    <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>

<body>


<!-- preloader start -->
<div class="preloader">
    <img src="{{asset('/')}}website/images/preloader.gif" alt="preloader">
</div>
<!-- preloader end -->

<!-- navigation -->
<header>
    <!-- top header -->
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="list-inline text-lg-right text-center">
                        <li class="list-inline-item">
                            <a href="mailto:info@companyname.com">info@coursemanagement.com</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="callto:1234565523">Call Us Now:
                                <span class="ml-2"> 123 456 5523</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" id="searchOpen">
                                <i class="ti-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- nav bar -->
    <div class="navigation">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('/')}}website/images/logo2.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item ">
                            <a class="nav-link "  href="{{route('home')}}" role="button"  aria-haspopup="true">
                                Home
                            </a>

                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{route('about')}}" role="button"  aria-haspopup="true">
                                About Us
                            </a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                               Course Category
                            </a>
                            <div class="dropdown-menu" >
                                @foreach($categories as $category)
                                <a class="dropdown-item" href="{{route('training-category',['id'=>$category->id])}}">{{$category->name}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link " href="{{route('all-training')}}" role="button"  aria-haspopup="true">
                                All Course
                            </a>

                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact')}}">Contact</a>
                        </li>
                        @if(session('student_id'))
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            {{session('student_name')}}
                        </a>
                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="{{route('my-dashboard')}}">Dashboard</a>
                            <a class="dropdown-item" href="{{route('student-logout')}}">Logout</a>
                        </div>
                        </li>
                        @else
                        <li class="nav-item ">
                            <a class="nav-link " href="{{route('login-registration')}}" role="button"  aria-haspopup="true">
                                Login/Registration
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Search Form -->
<div class="search-form">
    <a href="#" class="close" id="searchClose">
        <i class="ti-close"></i>
    </a>
    <div class="container">
        <form action="#" class="row">
            <div class="col-lg-10 mx-auto">
                <h3>Search Here</h3>
                <div class="input-wrapper">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Enter Keywords..." required>
                    <button>
                        <i class="ti-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- /navigation -->

@yield('body')
<!-- footer -->
<footer class="bg-secondary">
    <!-- copyright -->
    <div class="pt-4 pb-3 position-relative">
        <div class="container">
            <div class="row">


                <div class="col">
                    <p class="text-white text-center text-md-left">
                        <span class="text-primary">TM</span> &copy; 2023 All Right Reserved</p>
                </div>
                {{-- <div class="col">
                    <div class="mb-5 mb-md-0 text-center text-md-left">
                        <img class="" src="{{asset('/')}}website/images/logo3.png" alt="logo">
                        <span class="text-white ml-2">Online Course Management system</span>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- back to top -->
        <button class="back-to-top">
            <i class="ti-angle-up"></i>
        </button>
    </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="{{asset('/')}}website/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{asset('/')}}website/plugins/bootstrap/bootstrap.min.js"></script>
<!-- magnific popup -->
<script src="{{asset('/')}}website/plugins/magnific-popup/jquery.magnific.popup.min.js"></script>
<!-- slick slider -->
<script src="{{asset('/')}}website/plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="{{asset('/')}}website/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script  src="{{asset('/')}}website/plugins/google-map/gmap.js"></script>
<!-- Syo Timer -->
<script src="{{asset('/')}}website/plugins/syotimer/jquery.syotimer.js"></script>
<!-- aos -->
<script src="{{asset('/')}}website/plugins/aos/aos.js"></script>
<!-- swiper -->
<script src="{{asset('/')}}website/plugins/swiper/swiper.min.js"></script>
<!-- Main Script -->
<script src="{{asset('/')}}website/js/script.js"></script>
<script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@if(Session::has('message'))
    <script>
        toastr.success("{{Session::get('message') }}");
    </script>
@endif

@if(Session::has('error'))
    <script>
        toastr.error("{{Session::get('error') }}");
    </script>
@endif
</body>

<!-- Mirrored from demo.themefisher.com/biztrox/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 22 Mar 2022 08:06:55 GMT -->
</html>
