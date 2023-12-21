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
                {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Add New Role</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Role Name <span class="text-danger">*</span> </label>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputPassword1">Permission <span class="text-danger">*</span> </label><br>
                                        @foreach ($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                                {{ $value->name }}</label>
                                            <br />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <button class="btn button-38" style="margin-left: 10px; margin-right: 5px; margin-bottom: 80px;" type="submit">Submit</button>
                    <a class="btn button-38" style="margin-bottom: 80px;" href="{{ route('roles.index') }}"> Back</a>
                    <!-- /.card -->
                    {!! Form::close() !!}
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
