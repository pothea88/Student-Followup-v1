@extends('layouts.body')
@push('headers')
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="../css/app.css">
@endpush
@section('content')
<ul class="breadcrumb">
  <li><a class="btn btn-outline-primary disabled" href="{{route('viewTotalStudentFollowup')}}">Follow Up</a></li>
  <li><a class="btn btn-outline-primary" href="{{route('viewStudentOutOfFollowup')}}">Out of followUp</a></li>
</ul>
<!-- Main content -->
<section class="content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center text-primary">Student In Followup</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="users" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Gender</th>
                                    <th>Class</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Tutor Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentFollowup as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->firstName}} {{$student->lastName}}</td>
                                    <td>{{$student->gender}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>{{$student->year}}</td>
                                    @can('isAdmin',Auth::user())
                                    <td>
                                        @if($student->status == 1)
                                        <div class="dropdown">
                                            <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Follow up</a>                            
                                            <ul class="dropdown-menu">
                                            <a href="{{route('followup',$student->id)}}">Out of Follow up</a>
                                            </ul>  
                                        </div>
                                        @endif
                                    </td>
                                    @endcan
                                    @can('isTutor',Auth::user())
                                        <td>
                                            <?php 
                                                if($student->status == 1){
                                                    echo "Normal";
                                                }
                                            ?>
                                        </td>
                                    @endcan
                                    <td>{{$student->user->name}}</td>
                                    <td>
                                    @can('isAdmin', Auth::user())
                                        <a href="{{route('showEdit',$student->id)}}"><span class="material-icons">edit</span></a>
                                    @endcan
                                        <a href="{{route('detail',$student->id)}}"><span class="material-icons">visibility</span></a>  
                                        <a href="{{route('viewComment',$student->id)}}"><span class="material-icons">message</span></a>
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