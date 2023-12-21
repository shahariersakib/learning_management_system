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
                                <h3 class="card-title">User Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="exampleInputEmail1">Name: </label><br>
                                        {{ $user->name }}
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="exampleInputEmail1">Email: </label><br>
                                        {{ $user->email }}
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="exampleInputPassword1">Role: </label><br>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-success" style="margin-left:10px;" href="{{ route('users.index') }}"> Back</a>
                </div>
        </section>
    </div>

@endsection
