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
                <form action="{{ route('qustion.update', $qustions->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header d-flex justify-content-between">
                                    <h3 class="card-title">Edit qustion</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="course_name">Qustion <span class="text-danger">*</span> </label>
                                            <input type="text" name="qustion" class="form-control" value="{{ $qustions->qustion }}" placeholder="Qustion">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="a">A Option <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="a" value="{{ $qustions->a }}" placeholder="A Option">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="b">B Option <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="b" value="{{ $qustions->b }}" placeholder="B Option">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="c">C Option <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="c" value="{{ $qustions->c }}" placeholder="C Option">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="d">D Option <span class="text-danger">*</span> </label>
                                            <input class="form-control" name="d" value="{{ $qustions->d }}" placeholder="D Option">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="answer">Answer <span class="text-danger">*</span> </label>
                                            <select name="answer" class="form-control" value="{{ $qustions->answer }}">
                                                <option value="null">--select--</option>
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <button class="btn button-38" style="margin-left: 10px; margin-right: 5px; margin-bottom: 10px;" type="submit">Update</button>
                            <a class="btn button-38" style="margin-bottom: 10px" href="{{ route('qustion.index') }}"> Back</a>
                            <!-- /.card -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
