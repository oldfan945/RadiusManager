@extends('layouts.template')

@section('title',"View Users")

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
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-outline-warning block btn-lg" data-toggle="modal"
                                    data-target="#addmodel">
                                Add
                            </button>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">

                            <table class="table table-striped table-bordered dynamic-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Apartment</th>
                                    <th width="50px;">Status</th>
                                    <th width="50px;">Action</th>
                                    <th width="50px;">Reset</th>
                                    <th width="50px;">Edit</th>
                                    <th width="50px;">Delete</th>
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
                    <h3 class="modal-title" id="myModalLabel35"> Add User</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['url'=>'users','method'=>'post', 'id'=>'addform', 'class'=>'form form-horizontal']) !!}
                @csrf
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="title">Apartment</label>
                        {!!Form::select('apartment_id', $apartments, null, ['id'=>'apartment_id', 'class' => 'form-control', 'required'=>'true'])!!}
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="title">Name</label>
                        {!! Form::text('name',null,['id'=>'name', 'class'=>'form-control', 'required'=>'true', 'placeholder'=>'Enter Name']) !!}
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="title">Email</label>
                        {!! Form::email('email',null,['id'=>'email', 'class'=>'form-control', 'required'=>'true', 'placeholder'=>'Enter Email']) !!}
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="description">Username</label>
                        {!! Form::text('username',null,['id'=>'username', 'class'=>'form-control', 'required'=>'true', 'placeholder'=>'Enter Username']) !!}
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="poster">Password</label>
                        {!! Form::text('password',null,['id'=>'password', 'class'=>'form-control', 'placeholder'=>'Enter Password']) !!}
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

    <div class="modal fade text-left" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> Edit User</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::model($users,['url'=>'','method'=>'post', 'id'=>'editform']) !!}
                <input type="hidden" name="_method" value="PATCH">
                <div class="modal-body">
                    <fieldset class="form-group floating-label-form-group">
                        <label for="title">Apartment</label>
                        {!!Form::select('apartment_id', $apartments, null, ['id'=>'apartment_id', 'class' => 'form-control', 'required'=>'true'])!!}
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="title">Name</label>
                        {!! Form::text('name',null,['id'=>'name', 'class'=>'form-control', 'required'=>'true', 'placeholder'=>'Enter Name']) !!}
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="title">Email</label>
                        {!! Form::email('email',null,['id'=>'email', 'class'=>'form-control', 'required'=>'true', 'placeholder'=>'Enter Email']) !!}
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="description">Username</label>
                        {!! Form::text('username',null,['id'=>'username', 'class'=>'form-control', 'required'=>'true', 'placeholder'=>'Enter Username','readonly']) !!}
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="poster">Password</label>
                        {!! Form::text('password',null,['id'=>'password', 'class'=>'form-control', 'placeholder'=>'Enter Password']) !!}
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Close">
                    <input type="submit" class="btn btn-outline-primary btn-lg" value="Update">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
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

        var mytable;

        /* DELETE Record using AJAX Requres */
        $(document).on('click', '.delete', function () {

            var id = $(this).data("delete-id");
            var token = $(this).data("token");

            swal({
                title: "Are you sure?",
                text: "It will Delete this user!",
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
                                url: "users/" + id,
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

        /* DELETE Record using AJAX Requres */
        $(document).on('click', '.reset', function () {

            var user_id = $(this).data("user-id");
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
                                url: "users/" + user_id,
                                type: 'POST',
                                data: {
                                    "user_id": user_id,
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

        /* Action Activate/De-Activate Record using AJAX Requres */
        $(document).on('click', '.action', function () {

            var user_id = $(this).data("id");
            var enabled = $(this).data("enabled");
            var token = $(this).data("token");
            var text = '';
            if (enabled) {
                text = 'It will De-Activate this user!';
                enabled = 0;
            } else {
                text = 'It will Activate this user!';
                enabled = 1;
            }

            swal({
                title: "Are you sure?",
                text: text,
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
                        text: "Yes!",
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
                                url: "users/" + user_id,
                                type: 'POST',
                                data: {
                                    "is_enabled": enabled,
                                    "_method": 'PATCH',
                                    "_token": token
                                },
                                success: function (result) {
                                    swal("Updated!", "Your Record is updated.", "success");
                                    mytable.draw();
                                },
                                error: function (request, status, error) {
                                    var val = request.responseText;
                                    alert("error" + val);
                                }
                            });
                    } else {
                        swal("Cancelled", "", "error");
                    }
                });
        });

        /* RETRIVE DATA For Editing Purpose */
        $(document).on('click', '.edit', function () {

            var id = $(this).data("id");
            var apartment_id = $(this).data("apartment-id");
            var name = $(this).data("name");
            var username = $(this).data("username");
            var email = $(this).data("email");


            $('#editform #apartment_id').val(apartment_id);
            $('#editform #name').val(name);
            $('#editform #email').val(email);
            $('#editform #username').val(username);
            $('#editform').attr('action', 'users/' + id);
            $('#editmodel').modal('show');
        });

        $(document).ready(function (e) {

            mytable = $('.dynamic-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('users/getDataTable') }}",

                columns: [
                    {data: "name"},
                    {data: "username"},
                    {data: "email"},
                    {data: "password"},
                    {data: "apartment.name"},
                    {data: "status", searchable: false, sortable: false},
                    {data: "action", searchable: false, sortable: false},
                    {data: "reset", searchable: false, sortable: false},
                    {data: "edit", searchable: false, sortable: false},
                    {data: "delete", searchable: false, sortable: false}
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

            /* EDIT Record using AJAX Requres */
            var editaddformValidator = $("#editform").validate({
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
                            $('#editmodel').modal('hide');
                            swal("Good job!", "Your Record Updated Successfully", "success");
                            $(form).trigger('reset');
                            mytable.draw();
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