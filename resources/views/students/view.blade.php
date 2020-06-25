@extends('layouts.body')
@push('headers')
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<link rel="stylesheet" href="../css/app.css">
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
                        <h3 class="text-center text-primary">Student Management</h3>
                    </div>
                    <!-- <!-- /.card-header -->
                    <?php
                    $role_id = DB::table('role_user')->where('user_id', Auth::user()->id)->first();
                    $role_name = DB::table('roles')->where('id', $role_id->role_id)->first();
                    ?>

                    <div class="card-body">
                        <div class="clearfix">
                            <?php if ($role_name->name == 'admin') { ?>
                                <a href="add"><button type="button" class="btn btn-primary mb-3">Add Student</button></a>
                            <?php } ?>
                            <?php if($role_name->name == 'normal_user'){ ?>
                            <a href="{{route('mentor',$role_id->id)}}"><button type="button" class="mb-3 btn btn-primary">Student Mentor</button></a>
                            <?php } ?>
                        </div>
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
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{$student->id}}</td>
                                    <td>{{$student->firstName}} {{$student->lastName}}</td>
                                    <td>{{$student->gender}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>{{$student->year}}</td>
                                    @can('isAdmin', Auth::user())
                                    <td>
                                       @if($student->status == 0)
                                        <div class="dropdown">
                                            <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Normal Student</a>                            
                                            <ul class="dropdown-menu">
                                                <a href="{{route('followup',$student->id)}}">follow up</a>
                                            </ul>  
                                        </div>
                                       @endif
                                       @if($student->status == 1)
                                        <div class="dropdown">
                                            <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">followUp</a>                            
                                            <ul class="dropdown-menu">
                                            <a href="{{route('outOfFollowup',$student->id)}}">Out of followup</a>
                                            </ul>  
                                        </div>
                                       @endif
                                       @if($student->status == 2)
                                        <div class="dropdown">
                                            <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Out Of Followup</a>                            
                                            <ul class="dropdown-menu">
                                            <a href="{{route('followup',$student->id)}}">Followup</a>
                                            </ul>  
                                        </div>
                                       @endif
                                    </td>
                                    @endcan
                                    @can('isTutor', Auth::user())
                                        <td>
                                            <?php
                                                if($student->status == 0){
                                                    echo "Normal";
                                                }else if($student->status == 1){
                                                    echo "Follow up";
                                                }else{
                                                    echo "Out Of Follow up";
                                                }
                                            ?>
                                        </td>
                                    @endcan
                                    <td>{{$student->user->name}}</td>
                                    <td>
                                        <?php if ($role_name->name == 'admin') { ?>
                                            <a href="{{route('showEdit',$student->id)}}"><span class="material-icons">edit</span></a>
                                            <a href="{{route('deleteStudent',$student->id)}}"><span class="material-icons text-danger">delete</span></a>
                                        <?php } ?>
                                        <a href="{{route('detail',$student->id)}}"><span class="material-icons">visibility</span></a>  
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