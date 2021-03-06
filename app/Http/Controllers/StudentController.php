<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\User;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.view',compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('students.add',compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Student();
        $students->firstName=$request->firstName;
        $students->lastName=$request->lastName;
        $students->gender=$request->gender;
        $students->class = $request->class;
        $students->year = $request->year;
        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $extension = $file->getClientOriginalExtension();//getting image extension
            $filename = time() . "." .$extension;
            $file->move('uploads/students/',$filename);
            $students->avatar = $filename;
        }else{
            return $request;
        }
        $students->province= $request->province;
        $students->student_id = $request->stu_id;
        $students->status = $request->status;
        $students->user_id = $request->tutor;
        $students->save();
        return redirect('students/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $student = Student::find($id);
        $users = User::all();
        return view('students.edit',compact('student','users'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->class = $request->class;
        $student->gender = $request->gender;
        $student->year = $request->year;
        $student->student_id = $request->stu_id;
        $student->province = $request->province;
        $student->status = $request->status;
        $student->save();
        return redirect('students/show');
    }
    /**
     * detail information of specific student
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id){
        $detail = Student::find($id);
        return view('students.detail',compact('detail'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('students/show');
    }
    /**
     * View the total of student in follow up
     * @return \Illuminate\Http\Response
     */
    public function viewTotalStudentFollowup(){
        $studentFollowup = Student::all()->where('status',1);
        return view('students.studentInFollowup',compact('studentFollowup'));
    }
    /**
     * View the total of student out of follow up
     * @return \Illuminate\Http\Response
     */
    public function viewStudentOutOfFollowup(){
        $studentOutOfFollowup = Student::all()->where('status',2);
        return view('students.studentOutOfFollowup',compact('studentOutOfFollowup'));
    }
    /**
     * View the total of student that never in follow up
     * @return \Illuminate\Http\Response
     */
    public function viewNormalStudent(){
        $normalStudent = Student::all()->where('status',0);
        return view('students.normalStudent',compact('normalStudent'));
    }
    /**
     * change status to follow up
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function followUp($id){
        $students = Student::find($id);
        $students -> status= 1;
        $students -> save();
        return back();
    }
      /**
    * check status to out of follow up
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function OutOfFollowUp($id){
        $students = Student::find($id);
        $students -> status= 2;
        $students -> save();
        return back();
    }
}
