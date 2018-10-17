<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin">
    <meta name="keywords" content="admin template">
    <meta name="author" content="PG">
    <title>@yield('title')</title>

    <!-- include.head -->
    @yield('head')
    @include('include.head')

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- fixed-top-->
@include('include.fixed_top_header')

<!-- //////////// Top Menu //////////////////-->
@include('include.top_menu')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            @yield('content-body')

        </div>
    </div>
</div>

<!-- /////// Footer ///////////////-->
@include('include.footer')

<!-- JavaScript -->
@include('include.script')
@yield('js_script')

</body>
</html>