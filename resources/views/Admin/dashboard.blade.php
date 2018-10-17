@extends('layouts.template')

@section('title',"Dashboard")

@section('head')
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="dist/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="dist/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="dist/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="dist/app-assets/vendors/css/charts/morris.css">
    <link rel="stylesheet" type="text/css" href="dist/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="dist/app-assets/css/core/colors/palette-gradient.css">

@stop



<!-- content-body -->
@section('content-body')
    <!-- Revenue, Hit Rate & Deals -->
    <div class="row">
        <div class="col-lg-3 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h6 class="text-muted">Total users </h6>
                                <h3>{{ \App\User::all()->count() }}</h3>
                            </div>
                            <div class="align-self-center">
                                <i class="icon-user success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js_script')

    <script src="dist/app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <script src="dist/app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
    <script src="dist/app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
    <script src="dist/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"
            type="text/javascript"></script>
    <script src="dist/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"
            type="text/javascript"></script>
    <script src="dist/app-assets/data/jvector/visitor-data.js" type="text/javascript"></script>

    <!-- BEGIN PAGE LEVEL JS-->
    <script type="text/javascript" src="dist/app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
    <script src="dist/app-assets/js/scripts/pages/dashboard-sales.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

@stop