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
                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="name">Name <span class="text-danger">*</span> </label>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="email">Email <span class="text-danger">*</span> </label>
                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="password">Password <span class="text-danger">*</span> </label>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="confirm-password">Confirm Password <span class="text-danger">*</span> </label>
                                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="roles">Role <span class="text-danger">*</span> </label>
                                        {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <button class="btn btn-sm btn-success" style="margin-left: 10px; margin-right: 5px;" type="submit">update</button>
                    <a class="btn btn-sm btn-success" href="{{ route('users.index') }}"> Back</a>
                    <!-- /.card -->
                    {!! Form::close() !!}
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
