@extends('layouts.admin')
@section('admin_content')
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css') }}/app.css">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @can('course-create')
                                <a class="btn btn-sm btn-success" href="{{ route('routines.create') }}">Add New routines</a>
                            @endcan
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between">
                                        <h3 class="card-title">Routine</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped table-sm table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Day</th>
                                                    <th>Time</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($routines as $routine)
                                                    <tr>
                                                        <td>{{ $routine->course->title }}</td>
                                                        <td>{{ $routine->day }}</td>
                                                        <td>{{ $routine->start_time }} - {{ $routine->end_time }}</td>
                                                        <td>
                                                            <a href="{{ route('routines.show', $routine->id) }}" class="btn btn-info btn-sm">View</a>
                                                            <a href="{{ route('routines.edit', $routine->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                            <form action="{{ route('routines.destroy', $routine->id) }}" method="POST" style="display: inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
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
                </div>
            </div>
        </section>
    </div>

    {{-- {!! $courses->links() !!} --}}
@endsection
