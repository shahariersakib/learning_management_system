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
                                <a class="btn btn-sm btn-success" href="{{ route('syllabus.create') }}">Add New Syllabus</a>
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
                                        <h3 class="card-title">Syllabus</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped table-sm table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>File</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($syllabuses as $syllabus)
                                                    <tr>
                                                        <td>{{ $syllabus->title }}</td>
                                                        <td><a href="{{ asset('storage/syllabus/' . $syllabus->syllabus_file) }}" target="_blank">View Syllabus</a></td>
                                                        <td>
                                                            <a href="{{ route('syllabus.show', $syllabus->id) }}" class="btn btn-info btn-sm">View</a>
                                                            <a href="{{ route('syllabus.edit', $syllabus->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                            <form action="{{ route('syllabus.destroy', $syllabus->id) }}" method="POST" style="display: inline-block">
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
