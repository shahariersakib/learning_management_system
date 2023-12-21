@extends('layouts.admin')
@section('admin_content')
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
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('exams.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title">Add New Exam</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="examtitle">Exam Title <span class="text-danger">*</span> </label>
                                            <input type="text" name="examtitle" class="form-control" placeholder="Exam Title">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="examcode">Exam Code <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" name="examcode" placeholder="Exam Code">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="examdate">Exam date <span class="text-danger">*</span> </label>
                                            <input type="date" class="form-control" name="examdate" placeholder="Exam Date">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="examtime">Exam Time <span class="text-danger">*</span> </label>
                                            <input type="time" class="form-control" name="examtime" placeholder="Exam Time">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="marks">Exam Marks <span class="text-danger">*</span> </label>
                                            <input type="number" class="form-control" name="marks" placeholder="Exam Marks">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="totaltime">Total Time in Minutes <span class="text-danger">*</span> </label>
                                            <input type="number" class="form-control" name="totaltime" placeholder="Total Time in Minutes">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <button class="btn btn-sm btn-success" style="margin-left: 10px; margin-right: 5px; margin-bottom: 10px;" type="submit">Submit</button>
                        <a class="btn btn-sm btn-success" style="margin-bottom: 10px" href="{{ route('exams.index') }}"> Back</a>
                        <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
