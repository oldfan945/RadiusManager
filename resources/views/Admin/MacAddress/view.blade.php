@extends('layouts.template')

@section('title',"View MacAddress")

@section('head')
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dist/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/app-assets/vendors/css/extensions/sweetalert.css')}}">
@stop

<!-- content-body -->
@section('content-body')

    <!-- Main -->
    <section id="main">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mac Address</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements" style="width: 200px;">
                            <button type="button" data-token="{{ csrf_token() }}" class="reset btn btn-danger block btn-lg pull-left" style="width: 90px">
                                Reset
                            </button>
                            <button type="button" class="btn btn-outline-warning block btn-lg pull-right" style="width: 90px" data-toggle="modal"
                                    data-target="#addmodel">
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">

                            <table class="table table-striped table-bordered dynamic-table" width="100%">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Mac Address</th>
                                    <th width="50px">Permanent</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Javascript sourced data -->

    <!-- Modal -->
    <div class="modal fade text-left" id="addmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> Add MacAddress</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url'=>'adminmacaddress','method'=>'post', 'id'=>'addform', 'class'=>'form form-horizontal']) !!}
                    @csrf
                    <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                            <label for="title">User</label>
                            {!!Form::select('user_id', $users, null, ['id'=>'user_id', 'class' => 'form-control', 'required'=>'true'])!!}
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="adminmacaddress">Mac Address</label>
                            <input type="text" class="form-control" id="macaddress" name="macaddress"
                                   placeholder="Enter Mac Address">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="perminent">Permanent</label>
                            {!!Form::checkbox('is_permanent', true, null, ['id'=>'is_permanent'])!!}
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="Add">
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('js_script')

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset('dist/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/js/scripts/ui/breadcrumbs-with-stats.js')}}" type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/js/scripts/forms/validation/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('dist/app-assets/js/scripts/inputmask/jquery.inputmask.bundle.js')}}"></script>

    <!-- END PAGE LEVEL JS-->

    <script>

        var mytable;

        /* DELETE Record using AJAX Requres */
        $(document).on('click', '.reset', function () {

            var token = $(this).data("token");

            swal({
                title: "Are you sure?",
                text: "It will Delete all Non-Permanent Mac Addresses!",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "No, cancel it!",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Yes, delete it!",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            })
                .then((isConfirm) => {
                    if (isConfirm) {
                        $.ajax(
                            {
                                url: "adminmacaddress/reset",
                                type: 'POST',
                                data: {
                                    "_token": token
                                },
                                success: function (result) {
                                    swal("Deleted!", "Your Record is deleted.", "success");
                                    mytable.draw();
                                },
                                error: function (request, status, error) {
                                    var val = request.responseText;
                                    alert("error" + val);
                                }
                            });
                    } else {
                        swal("Cancelled", "Your record is safe", "error");
                    }
                });
        });

         $(document).ready(function (e) {

             /* DELETE Record using AJAX Requres */
             $(document).on('click', '.delete', function () {

                 var id = $(this).data("delete-id");
                 var token = $(this).data("token");

                 swal({
                     title: "Are you sure?",
                     text: "It will Delete this Mac Address!",
                     icon: "warning",
                     buttons: {
                         cancel: {
                             text: "No, cancel it!",
                             value: null,
                             visible: true,
                             className: "",
                             closeModal: false,
                         },
                         confirm: {
                             text: "Yes, delete it!",
                             value: true,
                             visible: true,
                             className: "",
                             closeModal: false
                         }
                     }
                 })
                     .then((isConfirm) => {
                         if (isConfirm) {
                             $.ajax(
                                 {
                                     url: "adminmacaddress/" + id,
                                     type: 'POST',
                                     data: {
                                         "id": id,
                                         "_method": 'DELETE',
                                         "_token": token
                                     },
                                     success: function (result) {
                                         swal("Deleted!", "Your Record is deleted.", "success");
                                         mytable.draw();
                                     },
                                     error: function (request, status, error) {
                                         var val = request.responseText;
                                         alert("error" + val);
                                     }
                                 });
                         } else {
                             swal("Cancelled", "Your record is safe", "error");
                         }
                     });
             });


             $("#macaddress").inputmask("##-##-##-##-##-##");

            mytable = $('.dynamic-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('adminmacaddress/getDataTable') }}",

                columns: [
                    {data: "user.name"},
                    {data: "macaddress"},
                    {data: "is_permanent"},
                    {data: "delete"}
                ]
            });

            /* ADD Record using AJAX Requres */
            var addformValidator = $("#addform").validate({
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
                            $('#addmodel').modal('hide');
                            swal("Good job!", "Your Record Inserted Successfully", "success");
                            $(form).trigger('reset');
                            mytable.draw();
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            var response = JSON.parse(XMLHttpRequest.responseText);
                            addformValidator.showErrors(response.errors);
                        }
                    });
                    return false; // required to block normal submit since you used ajax
                }
            });


        });
    </script>

@stop