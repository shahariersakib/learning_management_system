@extends('layouts.admin')
@section('admin_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css') }}/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" integrity="sha512-3uVpgbpX33N/XhyD3eWlOgFVAraGn3AfpxywfOTEQeBDByJ/J7HkLvl4mJE1fvArGh4ye1EiPfSBnJo2fgfZmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css') }}/app.css">
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Edit Syllabus</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('syllabus.update', $syllabus->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="course_id">Course</label>
                                        <select name="course_id" id="course_id" class="form-control">
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}" {{ $syllabus->course_id == $course->id ? 'selected' : '' }}>{{ $course->course_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="day">Day</label>
                                        <input type="text" name="day" id="day" class="form-control" value="{{ $syllabus->day }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="start_time">Start Time</label>
                                        <input type="text" name="start_time" id="start_time" class="form-control" value="{{ $syllabus->start_time }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="end_time">End Time</label>
                                        <input type="text" name="end_time" id="end_time" class="form-control" value="{{ $syllabus->end_time }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="syllabus_file">Syllabus File</label>
                                        <input type="file" name="syllabus_file" id="syllabus_file" class="form-control">
                                        @if ($syllabus->syllabus_file)
                                            <a href="{{ asset('storage/syllabus/' . $syllabus->syllabus_file) }}" target="_blank">{{ $syllabus->syllabus_file }}</a>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
