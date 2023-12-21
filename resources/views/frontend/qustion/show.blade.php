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
                                <h3 class="card-title">Qustion Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="qustion">Qustion: </label><br>
                                        {{ $qustions->qustion }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="a">A Option: </label><br>
                                        {{ $qustions->a }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="b">B Option: </label><br>
                                        {{ $qustions->b }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="c">C Option: </label><br>
                                        {{ $qustions->c }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="d">D Option: </label><br>
                                        {{ $qustions->d }}
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="answer">Answer: </label><br>
                                        {{ $qustions->answer }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-success" style="margin-left:10px;" href="{{ route('qustion.index') }}"> Back</a>
                </div>
        </section>
    </div>

@endsection
