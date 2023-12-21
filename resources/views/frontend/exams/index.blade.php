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
                            @can('exam-create')
                                <a class="btn btn-sm btn-success" href="{{ route('exams.create') }}">Add New Exam</a>
                            @endcan
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">Exam List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <tr>
                                        <th>No</th>
                                        <th>Exam Title</th>
                                        <th>Exam Code</th>
                                        <th>Exam Date</th>
                                        <th>Exam Time</th>
                                        <th>Marks</th>
                                        <th>Total Time in Minutes</th>
                                        <th width="240px">Action</th>
                                    </tr>
                                    @foreach ($exams as $key => $exam)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $exam->examtitle }}</td>
                                            <td>{{ $exam->examcode }}</td>
                                            <td>{{ $exam->examdate }}</td>
                                            <td>{{ $exam->examtime }}</td>
                                            <td>{{ $exam->marks }}</td>
                                            <td>{{ $exam->totaltime }}</td>
                                            <td>
                                                <form action="{{ route('exams.destroy', $exam->id) }}" method="POST">
                                                    <a class="btn button-38" href="{{ route('exams.show', $exam->id) }}">Show</a>
                                                    @can('exam-edit')
                                                        <a class="btn button-38" href="{{ route('exams.edit', $exam->id) }}">Edit</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('exam-delete')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {!! $exams->links() !!}
@endsection
