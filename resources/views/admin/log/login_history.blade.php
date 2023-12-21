@extends('layouts.admin')
@section('admin_content')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@stop
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Login History</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Date & Time</th>
                                        <th>IP Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loginHistory as $history)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $history->user->name }}</td>
                                            <td>{{ $history->login_at }}</td>
                                            <td>{{ $history->ip_address }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
