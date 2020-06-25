<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_user = User::all();
        $studentFollowup = Student::where('status',1)->count();
        $studentOutOfFollowup = Student::where('status',2)->count();
        $NormalStudent = Student::where('status',0)->count();
        return view('admin.dashboard',compact('total_user','studentFollowup','studentOutOfFollowup','NormalStudent'));
    }
}
