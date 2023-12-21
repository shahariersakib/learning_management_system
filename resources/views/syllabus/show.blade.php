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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Syllabus Details</h3>
                            </div>
                            <div class="card-body">
                                <h5>Course: {{ $syllabus->course->course_name }}</h5>
                                <p>Day: {{ $syllabus->day }}</p>
                                <p>Start Time: {{ $syllabus->start_time }}</p>
                                <p>End Time: {{ $syllabus->end_time }}</p>
                                @if ($syllabus->syllabus_file)
                                    <p>Syllabus File: <a href="{{ asset('storage/syllabus/' . $syllabus->syllabus_file) }}" target="_blank">{{ $syllabus->syllabus_file }}</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
