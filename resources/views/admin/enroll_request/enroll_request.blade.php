@extends('layouts.admin')
@section('admin_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css') }}/app.css">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Enroll Request</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-sm table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Course Name</th>
                                            <th>Transaction Amount</th>
                                            <th>Sender Number</th>
                                            <th>TRX Number</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enrollRequests as $request)
                                            <tr>
                                                <td>{{ $request->student->name }}</td>
                                                <td>{{ $request->course->course_name }}</td>
                                                <td>{{ $request->amount }}</td>
                                                <td>{{ $request->sender_mobile_number }}</td>
                                                <td>{{ $request->trx_number }}</td>
                                                <td>{{ $request->pay_method }}</td>
                                                <td>{{ $request->status ? 'Accepted' : 'Pending' }}</td>
                                                <td>
                                                    @if (!$request->status)
                                                        <a href="{{ route('enrollment-request.accept', $request->id) }}" class="btn btn-success btn-sm" id="accept">Accept</a>
                                                        <a href="{{ route('enrollment-request.reject', $request->id) }}" class="btn btn-danger btn-sm" id="reject">Reject</a>
                                                    @endif
                                                </td>
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

    {{-- {!! $courses->links() !!} --}}
@endsection
