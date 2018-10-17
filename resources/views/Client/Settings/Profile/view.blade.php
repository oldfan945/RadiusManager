@extends('layouts.template')

@section('title',"User Profile")

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
                    {{--<div class="card-header">
                        <h4 class="card-title">Profile</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <button type="button" class="btn btn-outline-warning block btn-lg" data-toggle="modal"
                                    data-target="#editmodel">
                                Edit
                            </button>
                        </div>
                    </div>--}}
                    <div class="card-content collpase show">
                        <div class="card-body card-dashboard">
                            {!! Form::model($user,['url'=>'userProfile/'.$user->id,'method'=>'patch', 'class'=>'form form-horizontal']) !!}
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="Name">Name</label>
                                    <div class="col-md-9">
                                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="Username">Username</label>
                                    <div class="col-md-9">
                                        {!! Form::text('username',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="email">E-mail</label>
                                    <div class="col-md-9">
                                        {!! Form::text('email',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                {{--<div class="form-group row">
                                    <label class="col-md-3 label-control">Select File</label>
                                    <div class="col-md-9">
                                        <label id="projectinput8" class="file center-block">
                                            <input type="file" id="file">
                                            {!! Form::file('picture',null,['class'=>'form-control']) !!}
                                            <span class="file-custom"></span>
                                        </label>
                                    </div>
                                </div>--}}
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Javascript sourced data -->

    {{--  <!-- Modal -->
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
                  <form method="post" action="" id="editform">
                      @csrf
                      <input type="hidden" name="_method" value="PATCH">
                      <div class="modal-body">
                          <fieldset class="form-group floating-label-form-group">
                              <label for="title">Name</label>
                              <input type="text" class="form-control" required="true" id="name" name="name"
                                     placeholder="Enter Name">
                          </fieldset>
                          <fieldset class="form-group floating-label-form-group">
                              <label for="description">Username</label>
                              <input type="text" class="form-control" required="true" id="username" name="username"
                                     placeholder="Enter UserName">
                          </fieldset>
                          <fieldset class="form-group floating-label-form-group">
                              <label for="duration">Email</label>
                              <input type="email" class="form-control" required="true"
                                     id="email" name="email" placeholder="Enter Email">
                          </fieldset>
                          <fieldset class="form-group floating-label-form-group">
                              <label for="Picture">Picture</label><br>
                              <input type="file" id="file">
                          </fieldset>
                      </div>
                      <div class="modal-footer">
                          <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="Close">
                          <input type="submit" class="btn btn-outline-primary btn-lg" value="Update">
                      </div>
                  </form>
              </div>
          </div>
      </div>--}}
@stop

@section('js_script')

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="dist/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="dist/app-assets/js/scripts/ui/breadcrumbs-with-stats.js"></script>
    <script src="dist/app-assets/js/scripts/modal/components-modal.js" type="text/javascript"></script>
    <script src="dist/app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="dist/app-assets/js/scripts/forms/validation/jquery.validate.min.js" type="text/javascript"></script>
    <script src="dist/app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>


    <!-- END PAGE LEVEL JS-->

    <script>

        /* RETRIVE DATA For Editing Purpose */
        $(document).on('click', '.edit', function () {

            var id = $(this).data("id");
            var name = $(this).data("name");
            var username = $(this).data("username");
            var email = $(this).data("email");

            $('#editform #name').val(name);
            $('#editform #username').val(username);
            $('#editform #email').val(email);
            $('#editform').attr('action', 'users/' + id);
            $('#editmodel').modal('show');
        });

        $(document).ready(function (e) {

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