@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/skins/skin-blue.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('admin_content')
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
                            <a class="btn btn-sm btn-success" href="{{ route('courses.create') }}">Add New Course</a>
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
                            <h3 class="card-title">Course List</h3>
                            <input type="text" class="form-control" id="search" placeholder="Search..." style="width: 50%;">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="search">Search:</label>

                                    </div>
                                </div>
                            </div>
                            <table id="example1" class="table table-bordered table-striped table-sm table-responsive">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Course Name</th>
                                    <th>Course Code</th>
                                    <th>Course Intro Link</th>
                                    {{-- <th>Course Description</th> --}}
                                    <th width="300px">Course Link</th>
                                    <th>Course Duration</th>
                                    {{-- <th>Learning Objectives</th> --}}
                                    <th>Course Price</th>
                                    <th>Status</th>
                                    <th width="240px">Action</th>
                                </tr>
                                @foreach ($courses as $key => $course)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $course->course_name }}</td>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->course_intro_link }}</td>
                                        {{-- <td>{{ $course->course_desc }}</td> --}}
                                        <td>{{ $course->course_link }}</td>
                                        <td>{{ $course->course_duration }}</td>
                                        {{-- <td>{{ $course->learning_objectives }}</td> --}}
                                        <td>{{ $course->course_price }}</td>
                                        <td class="badge badge-success">
                                            <?php
                                            if ($course->status == 1) {
                                                echo 'Active';
                                            } else {
                                                echo 'Deactive';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                                <a class="btn btn-sm btn-secondary" href="{{ route('courses.show', $course->id) }}">Show</a>
                                                @can('course-edit')
                                                    <a class="btn btn-sm btn-info" href="{{ route('courses.edit', $course->id) }}">Edit</a>
                                                @endcan

                                                @csrf
                                                @method('DELETE')
                                                @can('course-delete')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                @endcan
                                            </form>
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

{!! $courses->links() !!}
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example1').DataTable({
                "paging": true,
                "ordering": true,
                "info": true,
                "searching": true
            });
        });
    </script>
@endsection
