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
                        <h3 class="text-center text-primary">User Management</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="clearfix">
                            <a href="{{url('users/add')}}"><button type="button" class="btn btn-primary mb-3">Add User</button></a>
                        </div>
                        <table id="users" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Name</th>
                                    <th>Email</th>
                                    <th>Role Type</th>
                                    <th>Position</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    @foreach($item->roles as $role)
                                        <td>{{$role->name}}</td>
                                    @endforeach
                                    <td>{{$item->position}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <div class="dropdown">
                                                <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Active</a>                            
                                                <ul class="dropdown-menu">
                                                    <a href="{{route('inactive',$item->id)}}">Inactive</a>
                                                </ul>  
                                            </div>
                                        @endif
                                        @if($item->status == 0)
                                            <div class="dropdown">
                                                <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Inactive</a>                            
                                                <ul class="dropdown-menu">
                                                    <a href="{{route('active',$item->id)}}">Active</a>
                                                </ul>  
                                            </div>
                                       @endif
                                    </td>
                                    <td>
                                        <a href="{{url('users/edit/'.$item->id)}}"><span class="material-icons">edit</span></a>
                                        <a href="{{route('tutorComments',$item->id)}}"><span class="material-icons">message</span></a>
                                        <?php if($role->name != 'admin'){?>
                                            <a href="{{route('mentor',$item->id)}}"><span class="material-icons">people</span></a>
                                        <?php } ?>
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
    $(function () {
        $(document).ready(function() {
            $('#users').DataTable();
        } );
    });
</script>
@endpush