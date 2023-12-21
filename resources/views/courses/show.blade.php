@extends('layouts.admin')
@section('admin_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css') }}/app.css">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            </div>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Course Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Course Name: </label><br>
                                        {{ $course->course_name }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Course Code: </label><br>
                                        {{ $course->course_code }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Course Link: </label><br>
                                        {{ $course->course_link }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Course Description: </label><br>
                                        {{ $course->course_desc }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Course Duration: </label><br>
                                        {{ $course->course_duration }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Learning Objectives: </label><br>
                                        {{ $course->learning_objectives }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Course Slug: </label><br>
                                        {{ $course->course_slug }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Status: </label><br>
                                        <?php
                                        if ($course->status == 1) {
                                            echo 'Active';
                                        } else {
                                            echo 'Deactive';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-success" style="margin-left:10px;" href="{{ route('courses.index') }}"> Back</a>
                </div>
        </section>
    </div>

@endsection
