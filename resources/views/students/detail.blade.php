<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/app.css">
</head>
<ul class="breadcrumb">
  <li><a href="{{route('viewTotalStudentFollowup')}}">Follow Up</a></li>
  <li><a href="{{route('viewStudentOutOfFollowup')}}">Out of followUp</a></li>
</ul>
<body>
  <div class="container">
    <a href="{{url('students/show')}}"><button type="button" class="btn btn-primary">Back To Student List</button></a>
    <h1 class="text-center mt-5">Student Information</h1>
    <hr>
    <div class="row">
      <div class="col-5"></div>
      <div class="col-3">
        <div class="card img">
          <div class="card-body">
            <img class="mx-auto d-block" src="{{asset('uploads/students/'.$detail->avatar)}}" style="width:100%;" alt="image">
          </div>
        </div>
      </div>
      <div class="col-4"></div>
    </div>
    <div class="row mt-5">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
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
          <tr>
            <td>{{$detail->id}}</td>
            <td>{{$detail->firstName}} {{$detail->lastName}}</td>
            <td>{{$detail->gender}}</td>
            <td>{{$detail->class}}</td>
            <td>{{$detail->year}}</td>
            <td>{{$detail->student_id}}</td>
            <td>{{$detail->province}}</td>
            <td>
              <?php if($detail->status == 0){
                echo "Student normal";
              }elseif($detail->status == 1){
                echo "Student Followup";
              }else{
                echo "Out of followup";
              } ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>