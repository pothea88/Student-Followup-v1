@extends('layouts.body')
@push('headers')
<link rel="stylesheet" href="{{ url('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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
                        <h3 class="text-center text-primary">Comment</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    $role_id = DB::table('role_user')->where('user_id', Auth::user()->id)->first();
                    $role_name = DB::table('roles')->where('id', $role_id->role_id)->first();
                    ?>

                    <div class="card-body">
                        <!-- <div class="clearfix">   
                            <a href="#"><button type="button" class="btn btn-primary mb-3">Add Comment</button></a>
                        </div> -->
                        <table id="users" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student</th>
                                    <th>Tutor</th>
                                    <th>Message</th> 
                                    @can('isAdmin', Auth::user())
                                    <th>Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comment as $comments)
                                <tr>
                                    <td>{{$comments->id}}</td>
                                    <td>{{$comments->student->firstName}} {{$comments->student->lastName}}</td>
                                    <td>{{$comments->user->name}}</td>
                                    <td>{{$comments->message}}</td>
                                    @can('isAdmin', Auth::user())
                                    <td>
                                        <!-- @if($comments->user->name == Auth::user()->name) -->
                                        <a href="{{route('editComment',$comments->id)}}"><span class="material-icons">edit</span></a>
                                        <a href="{{route('deleteComment',$comments->id)}}"><span class="material-icons text-danger">delete</span></a>  
                                        <!-- @endif -->
                                    </td>
                                    @endcan
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