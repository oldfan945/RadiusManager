@extends('layouts.template')

@section('title',"Profile")

@section('head')
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('dist/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/app-assets/vendors/css/extensions/sweetalert.css')}}">

@stop

<!-- content-body -->
@section('content-body')

    <!-- Main -->
    <section id="main">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">
                            {!! Form::model($user,['url'=>'profile/'.$user->id,'method'=>'patch', 'class'=>'form form-horizontal']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> Profile</h4>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="Name">Name</label>
                                    <div class="col-md-10">
                                        {!! Form::text('name',null,['class'=>'form-control','disabled']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="Name">Username</label>
                                    <div class="col-md-10">
                                        {!! Form::text('username',null,['class'=>'form-control','disabled']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 label-control" for="password">Password</label>
                                    <div class="col-md-10">
                                        {!! Form::text('password',null,['class'=>'form-control','required'=>'true','data-minlenght' => 6]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Javascript sourced data -->

@stop

@section('js_script')

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('dist/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}" type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/js/scripts/forms/validation/jquery.validate.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script>


        $(document).ready(function (e) {

            /* EDIT Record using AJAX Requres */
            var editaddformValidator = $("form").validate({
                ignore: ":hidden",
                errorElement: "span",
                errorClass: "text-danger",
                validClass: "text-success",
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass(errorClass);
                    $(element.form).find("span[id=" + element.id + "-error]").addClass(errorClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass(errorClass);
                    $(element.form).find("span[id=" + element.id + "-error]").removeClass(errorClass);
                },
                submitHandler: function (form) {
                    $.ajax({
                        type: "POST",
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: $(form).serialize(),
                        success: function (data) {
                            swal("Good job!", "Your Record Updated Successfully", "success");
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            var response = JSON.parse(XMLHttpRequest.responseText);
                            editaddformValidator.showErrors(response.errors);
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                }
            });
        });
    </script>

@stop