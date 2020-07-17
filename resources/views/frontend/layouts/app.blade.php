<!doctype html>
<html class="fixed sidebar-left-sm">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Accounts 313</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('public/assets/frontend/css/simple-sidebar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/style.css') }}">
    <script src="{{ asset('public/assets/frontend/vendor/fontawesome/fontawesome7a97927ccc.js') }}" type="application/javascript"></script>
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/vendor/fonts/lato/stylesheet.css') }}">

    <script src="{{ asset('public/assets/frontend/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('public/assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('style')
</head>
<body>
<div class="d-flex" id="wrapper">
    @include('frontend.includes.sidebar')
    <div id="page-content-wrapper" class="a-page">
        @include('frontend.includes.header')
        @yield('content')
        @include('frontend.includes.footer')
    </div>
</div>
@stack('js')
@yield('script')
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>
