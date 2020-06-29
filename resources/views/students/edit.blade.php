@extends('layouts.body')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Student</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">User Admin</a></li>
                    <li class="breadcrumb-item active">Add User</li>
                </ol>
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
                    <form action="{{route('update',$student->id)}}" role="form" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>firstName</label>
                                        <input type="text" value="{{$student->firstName}}" class="form-control" name="firstName" placeholder="Enter ...">
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
                                        <input type="text" value="{{$student->lastName}}" class="form-control" name="lastName" placeholder="Enter ...">
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
                                        <input type="radio" name="gender" value="Female"
                                            {{ ($student->gender == "Female") ? "checked" : ""  }}
                                        >Female <br>
                                        <input type="radio" name="gender" value="Male" 
                                            {{ ($student->gender == "Male") ? "checked" : "" }}
                                        >Male
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
                                        <input type="number" value="{{$student->year}}" class="form-control" name="year" placeholder="Enter ...">
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
                                            <option value="WEP-A" {{ ($student->class == "WEP-A") ? "selected" : "" }} >WEP-A</option>
                                            <option value="WEP-B" {{ ($student->class == "WEP-B") ? "selected" : "" }}>WEP-B</option>
                                            <option value="SNA"    {{ ($student->class == "SNA") ? "selected" : "" }}>SNA</option>
                                            <option value="2021-A" {{ ($student->class == "2021-A") ? "selected" : "" }}>2021-A</option>
                                            <option value="2021-B" {{ ($student->class == "2021-B") ? "selected" : "" }}>2021-B</option>
                                            <option value="2021-C" {{ ($student->class == "2021-C") ? "selected" : "" }}>2021-C</option>
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
                                        <input type="number" value="{{$student->student_id}}" class="form-control" name="stu_id" placeholder="Enter...">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Province</label>
                                        <input type="text" value="{{$student->province}}" name="province" class="form-control" placeholder="Enter...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option>----Select----</option>
                                            <option value="0" {{ ($student->status == 0) ? "selected" : "" }} >Normal</option>
                                            <option value="1" {{ ($student->status == 1) ? "selected" : "" }}>Follow up</option>
                                            <option value="2" {{ ($student->status == 2) ? "selected" : "" }}>Out Of Followup</option>
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
                                                <option value="{{$student->user->name}}" {{ ($student->user->name == $user->name) ? "selected" : "" }} >{{$user->name}}</option>
                                            <?php } ?>
                                            @endforeach
                                        </select>
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