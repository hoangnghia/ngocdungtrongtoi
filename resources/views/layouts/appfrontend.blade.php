<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Required meta tags always come first  -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ngọc Dung Trong Tôi</title>
    <!--  Font Awesome  -->
    <link rel="stylesheet" href="{{ asset('assets/mdbnd/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/mdbnd/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('assets/mdbnd/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/mdbnd/css/initcarousel.css') }}">
    <!-- Custom styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick/slick-theme.css')}}">
    @yield('styles')
</head>
<body>
<!-- Main Navigation -->
<header id="main-header">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top nd-color-main scrolling-navbar">

        <div class="container smooth-scroll">

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse justify-content-center font-weight-bold" id="ngocdungNavbarCentered">
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item align-items-center d-flex">
                        <a class="nav-link" href="/van-hoa-ngoc-dung" data-offset="60">Văn hóa ngọc dung</a>
                    </li>
                    <li class="nav-item align-items-center d-flex">
                        <a class="nav-link" href="/albums" data-offset="60">Hình ảnh hoạt động</a>
                    </li>
                    <li class="nav-item align-items-center d-flex">
                        <a class="nav-link" href="/videos" data-offset="60">Video hoạt động</a>
                    </li>
                </ul>
                <!-- Links -->
                <!-- Navbar brand -->
                <a class="navbar-brand px-lg-4 mr-0" href="/">
                    <img src="assets/img/logo.png" height="70" alt="">
                </a>
                <!-- Links -->
                <ul class="navbar-nav">
                    <li class="nav-item align-items-center d-flex">
                        <a class="nav-link" href="#team" data-offset="60">Cảm nhận nhân viên</a>
                    </li>
                    <li class="nav-item align-items-center d-flex">
                        <a class="nav-link" href="/bai-viet" data-offset="60">Bản tin nội bộ</a>
                    </li>
                    {{--<li class="nav-item align-items-center d-flex">--}}
                        {{--<a class="nav-link" href="#contact" data-offset="60">Liên hệ</a>--}}
                    {{--</li>--}}
                </ul>
                <!-- Links -->
            </div>
        </div>
    </nav>
    <!--/.Navbar-->
    <!--/main-head-->
@yield('mainhead')
<!--main-head-->
</header>
<!-- Main Navigation -->

<!-- Main Layout -->
<main id="main-head-content">
    @yield('content')
</main>
<!-- Main Layout -->

<!--section-footer-->
<script type="text/javascript" src="https://tools.ngocdung.net/frontend/js/footer.js"></script>
<!--/section-footer-->
<!--  SCRIPTS  -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('assets/mdbnd/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('assets/mdbnd/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('assets/mdbnd/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('assets/mdbnd/js/mdb.min.js')}}"></script>
<!-- Theme JavaScript -->
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

<script type='text/javascript' src='https://amazingcarousel.com/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>
{{--<script type='text/javascript' src='{{ asset('assets/mdb/js/jquery-migrate.min.js') }}/'></script>--}}
<script type='text/javascript' src='{{ asset('assets/mdbnd/js/amazingcarousel.js') }}'></script>
{{--<script type='text/javascript' src='{{ asset('assets/mdb/js/wonderpluginlightbox.js') }}'></script>--}}
{{--<script src="{{ asset('assets/mdb/js/initcarousel.js') }}"></script>--}}
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="{{ asset('assets/slick/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
@yield('extra_scripts')
<script>
    new WOW().init();
    $(document).on('ready', function() {
        $("#panel_hinhanhhoatdong .slick-action, #panel_videohoatdong .slick-action").slick({
            dots: true,
            centerMode: true,
            slidesToShow: 3,
            slidesToScroll: 1
        });
    });
</script>
</body>
</html>