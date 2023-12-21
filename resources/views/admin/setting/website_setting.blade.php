@extends('layouts.admin')
@section('admin_content')
    <style type="text/css">
        .file-input {
            line-height: 1.3;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css') }}/app.css">
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Website Setting</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('website.setting.update', $setting->id) }}" method="Post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Phone</label>
                                            <input type="text" class="form-control" name="phone" value="{{ $setting->phone }}" required="">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Main Email</label>
                                            <input type="email" class="form-control" name="main_email" value="{{ $setting->main_email }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Support Email</label>
                                            <input type="email" class="form-control" name="support_email" value="{{ $setting->support_email }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ $setting->address }}">
                                        </div>
                                    </div>
                                    <strong class="text-info">Social Link</strong>
                                    <div class="row">

                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" value="{{ $setting->facebook }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" value="{{ $setting->twitter }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" value="{{ $setting->instagram }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Youtube</label>
                                            <input type="text" class="form-control" name="youtube" value="{{ $setting->youtube }}">
                                        </div>
                                    </div>
                                    <strong class="text-info">Logo & Favicon</strong>
                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Main Logo</label>
                                            <input type="file" class="form-control file-input" name="logo">
                                            <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="exampleInputEmail1">Favicon</label>
                                            <input type="file" class="form-control file-input" name="favicon">
                                            <input type="hidden" name="old_favicon" value="{{ $setting->favicon }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn button-38">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
