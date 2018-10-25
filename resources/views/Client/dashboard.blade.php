@extends('layouts.template')

@section('title',"Dashboard")

@section('head')
    <!-- BEGIN Page Level CSS-->


@stop



<!-- content-body -->
@section('content-body')



@stop

@section('js_script')



    <!-- BEGIN PAGE LEVEL JS-->
    <script type="text/javascript" src="{{asset('dist/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}"></script>
    <script src="{{asset('dist/app-assets/js/scripts/pages/dashboard-sales.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

@stop