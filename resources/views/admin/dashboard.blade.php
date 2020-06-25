@extends('layouts.body')
@push('headers')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <!-- <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css"> -->
@endpush
@section('content')
<!-- Main content -->
<section class="content">
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        .header-image {
            /* background-image: url('https://www.passerellesnumeriques.org/misc/logo-en.png'); */
            height: 70vh;
            background-size: cover;
            background-position: center 25%;
        }

        .cover {
            height: 70vh;
        }

        .box {
            margin-left: 100px;
        }

        .box h3 {
            color: blue;
            font-family: sans-serif;
            font-size: 50px;
        }
        .card:hover{
            -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
            -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
            box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        }
    </style>
    <div class="header-image">
        <div class="cover">
            <!-- <h3 class="text-primary text-center" style="font-weight: 50px;">The Total Result</h3>
            <hr> -->
            <div class="row">
                @can('isAdmin', Auth::user())
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 mt-4">
                    <a href="{{route('view')}}">
                        <div class="card" style="width: 20rem;margin-left:30px;background-color:blue;">
                            <div class="card-body">
                                <span class="material-icons text-white float-right" style="font-size:80px;filter:blur(2px);">people</span> 
                                <h5 class="ml-2 text-white">The total of users</h5>
                            </div>
                            <h3 class="text-white ml-4">{{count($total_user)}} users</h3>
                            <div class="text-center text-white" style="background-color:rgba(0, 0, 0, 0.3)">More info <i class='far'>&#xf35a;</i></div>
                        </div>
                    </a>
                </div>
                @endcan
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 mt-4">
                    <a href="{{route('viewTotalStudentFollowup')}}">
                        <div class="card" style="width: 20rem;margin-left:30px;background-color:red;">
                            <div class="card-body">
                                <span class="material-icons float-right text-white" style="font-size:80px;filter:blur(2px);">people</span> 
                                <h5 class="ml-2 text-white">The total of Student Follow up</h5>
                            </div>
                            <h3 class="text-white ml-4">{{$studentFollowup}} People</h3>
                            <div class="text-center text-white" style="background-color:rgba(0, 0, 0, 0.3)">More info <i class='far'>&#xf35a;</i></div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 mt-4">
                    <a href="{{route('viewStudentOutOfFollowup')}}">
                        <div class="card" style="width: 20rem;margin-left:30px;background:orange;">
                            <div class="card-body">
                                <span class="material-icons float-right text-white" style="font-size:80px;filter:blur(2px);">people</span> 
                                <h5 class="ml-2 text-white">The total of Student Out Of Follow up</h5>
                            </div>
                            <h3 class="text-white ml-4">{{$studentOutOfFollowup}} People</h3>
                            <div class="text-center text-white" style="background-color:rgba(0, 0, 0, 0.3);">More info <i class='far'>&#xf35a;</i></div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 mt-4">
                    <a href="{{route('viewNormalStudent')}}">
                        <div class="card" style="width: 20rem;margin-left:30px;background:green;">
                            <div class="card-body">
                                <span class="material-icons text-white float-right" style="font-size:80px;filter:blur(2px);">people</span> 
                                <h5 class="ml-2 text-white">The total of normal students</h5>
                            </div>
                            <h3 class="text-white ml-4">{{$NormalStudent}} People</h3>
                            <div class="text-center text-white" style="background-color:rgba(0, 0, 0, 0.3);">More info <i class='far'>&#xf35a;</i></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
