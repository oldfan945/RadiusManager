@extends('layouts.template')

@section('title',"View NAS")

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
                        <h4 class="card-title">NAS</h4>
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

                            <table class="table table-responsive table-striped table-bordered dynamic-table" width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Secret</th>
                                    <th>IPAddress</th>
                                    <th>Description</th>
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
                    <h3 class="modal-title" id="myModalLabel35">Add NAS device</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="nas" method="post" id="addform">
                    @csrf
                    <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" required="true" id="name" name="name"
                                   placeholder="Enter Name">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="secret">Secret</label>
                            <input type="text" class="form-control" required="true" id="secret" name="secret"
                                   placeholder="Enter Secret">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="ipaddress">IP Address</label>
                            <input type="text" class="form-control" required="true" id="ipaddress" name="ipaddress"
                                   placeholder="Enter IP Address">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="description">description</label>
                            <input type="text" class="form-control" required="true" id="description" name="description"
                                   placeholder="Enter Description">
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel35"> Edit Apartment</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="" id="editform">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="modal-body">
                        <fieldset class="form-group floating-label-form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" required="true" id="name" name="name"
                                   placeholder="Enter Name">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="secret">Secret</label>
                            <input type="text" class="form-control" required="true" id="secret" name="secret"
                                   placeholder="Enter Secret">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="ipaddress">IP Address</label>
                            <input type="text" class="form-control" required="true" id="ipaddress" name="ipaddress"
                                   placeholder="Enter IP Address">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="description">description</label>
                            <input type="text" class="form-control" required="true" id="description" name="description"
                                   placeholder="Enter Description">
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-outline-primary btn-lg" value="Update">
                    </div>
                </form>
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
        $(document).on('click', '.delete', function () {

            var id = $(this).data("delete-id");
            var token = $(this).data("token");

            swal({
                title: "Are you sure?",
                text: "It will Delete Perminatly !",
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
                                url: "nas/" + id,
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

        /* RETRIVE DATA For Editing Purpose */
        $(document).on('click', '.edit', function () {

            var id = $(this).data("id");
            var name = $(this).data("name");
            var secret = $(this).data("secret");
            var ipaddress = $(this).data("ipaddress");
            var description = $(this).data("description");

            $('#editform #name').val(name);
            $('#editform #secret').val(secret);
            $('#editform #ipaddress').val(ipaddress);
            $('#editform #description').val(description);
            $('#editform').attr('action', 'nas/' + id);
            $('#editmodel').modal('show');
        });

        $(document).ready(function (e) {

            $("#ipaddress").inputmask("ip");
            $("#editform #ipaddress").inputmask("ip");

            mytable = $('.dynamic-table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ url('nas/getDataTable') }}",

                columns: [
                    {data: "name"},
                    {data: "secret"},
                    {data: "ipaddress"},
                    {data: "description"},
                    {data: "edit"},
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