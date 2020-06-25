@extends('layouts.body')
@push('headers')
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="../../css/app.css">
@endpush
@section('content')
<ul class="breadcrumb">
  <li><a href="{{route('viewTotalStudentFollowup')}}">Follow Up</a></li>
  <li><a href="{{route('viewStudentOutOfFollowup')}}">Out of followUp</a></li>
</ul>
<!-- Main content -->
<section class="content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-primary">Students Under Mentor</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="users" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Profile</th>
                                    <th>FullName</th>
                                    <th>Gender</th>
                                    <th>Class</th>
                                    <th>Year</th>
                                    <th>Stuent_id</th>
                                    <th>Province</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>
                                        <img src="{{ asset('uploads/students/' . $student->avatar) }}" style="width: 70px;" alt="image">
                                    </td>
                                    <td>{{$student->firstName}} {{$student->lastName}}</td>
                                    <td>{{$student->gender}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>{{$student->year}}</td>
                                    <td>{{$student->student_id}}</td>
                                    <td>{{$student->province}}</td>
                                    <td>
                                        <?php if ($student->status == 0) {
                                            echo "Student normal";
                                        } elseif ($student->status == 1) {
                                            echo "Student Followup";
                                        } else {
                                            echo "Out of followup";
                                        } ?>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>
@endsection
@push('scripts')
<script src="{{ url('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ url('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function() {
        $(document).ready(function() {
            $('#users').DataTable();
        } );
    });
</script>
@endpush