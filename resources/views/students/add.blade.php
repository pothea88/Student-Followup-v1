@extends('layouts.body')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Student</h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="addStudent" enctype="multipart/form-data" role="form" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>firstName</label>
                                        <input type="text" class="form-control" name="firstName" placeholder="Enter ...">
                                        @error('firstName')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>lastName</label>
                                        <input type="text" class="form-control" name="lastName" placeholder="Enter ...">
                                        @error('lastName')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Gender</label><br>
                                        <input type="radio" value="Female" name="gender">Female <br>
                                        <input type="radio" value="Male" name="gender">Male
                                        @error('gender')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Generation</label>
                                        <input type="number" class="form-control" name="year" placeholder="Enter ...">
                                        @error('year')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select class="form-control" name="class" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="WEP-A">WEP-A</option>
                                            <option value="WEP-B">WEP-B</option>
                                            <option value="SNA">SNA</option>
                                            <option value="2021-A">20201-A</option>
                                            <option value="2021-B">20201-B</option>
                                            <option value="2021-C">20201-C</option>
                                        </select>
                                        @error('class')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student_id</label>
                                        <input type="number" class="form-control" name="stu_id" placeholder="Enter...">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <input type="text" name="province" class="form-control" placeholder="Enter...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option>----Select----</option>
                                            <option value="0">Normal</option>
                                            <option value="1">Follow up</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tutor Name</label>
                                        <select name="tutor" class="form-control">
                                            <option>----Select----</option>
                                            @foreach($users as $user)
                                            <?php if ($user->name != 'Administrator') { ?>
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            <?php } ?>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile</label><br>
                                        <input type="file" name="profile">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer ">
                            <a href="{{url('students/show')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection