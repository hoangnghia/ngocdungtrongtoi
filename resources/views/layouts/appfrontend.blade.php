<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Required meta tags always come first  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ngọc Dung Trong Tôi</title>
    <!--  Font Awesome  -->
    <link rel="stylesheet" href="{{ asset('vendor/mdb/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/mdb/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('vendor/mdb/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('vendor/mdb/css/initcarousel.css') }}">
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
                        <a class="nav-link" href="" data-offset="60">Văn hóa ngọc dung</a>
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
                    <li class="nav-item align-items-center d-flex">
                        <a class="nav-link" href="#contact" data-offset="60">Liên hệ</a>
                    </li>
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
<main>
    @yield('content')
</main>
<!-- Main Layout -->

<!--section-footer-->
<script type="text/javascript" src="https://tools.ngocdung.net/frontend/js/footer.js"></script>
<!--/section-footer-->
<!--  SCRIPTS  -->
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('vendor/mdb/js/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{ asset('vendor/mdb/js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{ asset('vendor/mdb/js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('vendor/mdb/js/mdb.min.js')}}"></script>
<!-- Theme JavaScript -->
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

{{--<script type='text/javascript' src='https://amazingcarousel.com/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>--}}
<script type='text/javascript' src='{{ asset('vendor/mdb/js/jquery-migrate.min.js') }}/'></script>
<script type='text/javascript' src='{{ asset('vendor/mdb/js/amazingcarousel.js') }}'></script>
<script type='text/javascript' src='{{ asset('vendor/mdb/js/wonderpluginlightbox.js') }}'></script>
<script src="{{ asset('vendor/mdb/js/initcarousel.js') }}"></script>
@yield('extra_scripts')
<script>
    new WOW().init();
</script>
</body>
</html>