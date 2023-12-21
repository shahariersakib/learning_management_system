@extends('layouts.admin')
@section('admin_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css') }}/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </section>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title">Add New Course</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="course_name">Course Name <span class="text-danger">*</span> </label>
                                            <input type="text" name="course_name" class="form-control" placeholder="Course Name">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="course_code">Course Code <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="course_code" placeholder="Course Code">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="course_intro_link">Course Intro Link <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="course_intro_link" placeholder="Course Intro Link">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="course_link">Course Link <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="course_link" placeholder="Course Link">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="course_desc">Course Description <span class="text-danger">*</span> </label>
                                            <textarea class="form-control" name="course_desc" placeholder="Course Description" cols="40" rows="5"></textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="learning_objectives">Learning Objectives <span class="text-danger">*</span> </label>
                                            <textarea class="form-control" name="learning_objectives" placeholder="Learning Objectives" cols="40" rows="5"></textarea>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="course_price">Course Price <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="course_price" placeholder="Course Price">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="course_duration">Course Duration <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="course_duration" placeholder="Course Duration">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <h6>Status</h6>
                                            <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <button class="btn btn-sm btn-success" style="margin-left: 10px; margin-right: 5px; margin-bottom: 70px;" type="submit">Submit</button>
                        <a class="btn btn-sm btn-success" style="margin-bottom: 70px" href="{{ route('courses.index') }}"> Back</a>
                        <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="{{ asset('public/backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

    <script type="text/javascript">
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>

@endsection
