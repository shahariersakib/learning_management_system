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
                                <a class="btn btn-sm btn-success" href="{{ route('lessons.create') }}">Add New Lesson</a>
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
                                        <h3 class="card-title">Lessons</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped table-sm table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>Lesson Name</th>
                                                    <th>Course</th>
                                                    <th>Lesson Link</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($lessons as $lesson)
                                                    <tr>
                                                        <td>{{ $lesson->lesson_name }}</td>
                                                        <td>{{ $lesson->course->course_name }}</td>
                                                        <td>{{ $lesson->lesson_link }}</td>
                                                        <td>
                                                            <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-info btn-sm">View</a>
                                                            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display: inline-block">
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
