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
                                <h3 class="card-title">Exam Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Exam Title: </label><br>
                                        {{ $exams->examtitle }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Exam Code: </label><br>
                                        {{ $exams->examcode }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Exam Date: </label><br>
                                        {{ $exams->examdate }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Exam Time: </label><br>
                                        {{ $exams->examtime }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Exam Marks: </label><br>
                                        {{ $exams->marks }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Total Time in Minutes: </label><br>
                                        {{ $exams->totaltime }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-success" style="margin-left:10px;" href="{{ route('exams.index') }}"> Back</a>
                </div>
        </section>
    </div>

@endsection
