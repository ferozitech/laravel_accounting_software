<!doctype html>
<html class="fixed sidebar-left-sm">
<head>
    <meta charset="utf-8" />
    <title>Accounts313</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta content="Arctern Digital Agency." name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('public/assets/backend/images/favicon.ico') }}" />
    <link href="{{ asset('public/assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('public/assets/backend/js/jquery.min.js') }}"></script>
    @yield('style')
</head>
<body class="@if(Route::currentRouteName() =='dashboard') mm-active active mm-show enlarge-menu @endif">
@include('backend.includes.navigation')
@include('backend.includes.header')
<div class="page-wrapper">
    <div class="page-content-tab">
        @yield('content')
        @include('backend.includes.footer')
    </div>
</div>
<script src="{{ asset('public/assets/backend/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/metismenu.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/waves.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/feather.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/pages/jquery.crm_dashboard.init.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/app.js') }}"></script>
@stack('js')
@yield('script')
</body>
</html>
