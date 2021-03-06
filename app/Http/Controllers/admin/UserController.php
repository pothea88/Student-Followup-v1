<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(){
        $users = User::all();
        return view('admin.user.view',compact('users'));
    }
    /**
     * Show the form for creating a new resource and add new student
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$_POST) {
            $data['role'] = Role::get();
            return view('admin.user.add', $data);
        } else {
            $validation = $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'role' => ['required'],
                'position'=>['required','string'],
                'address'=>['required','string'],
                'status'=>['required','integer'],
                'password' => ['required', 'string', 'min:4'],
                'password_confirmation' => 'required|required_with:password|same:password',
            ]);
            if ($validation) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'position'=>$request->position,
                    'address'=>$request->address,
                    'status'=>$request->status
                ]);
                if ($request->role) {
                    $user_id = User::latest('id')->first();
                    DB::table('role_user')->insert([
                        ['user_id' => $user_id->id, 'role_id' => $request->role],
                    ]);
                }
            }
            return redirect("users");
        }
    }
    /**
     * Show the form for editing the specified resource and also edit the user
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if (!$_POST) {
            $data['user'] = User::where('id', $request->id)->first();
            $data['role'] = Role::get();
            $data['user_role'] = DB::table('role_user')->where('user_id', $request->id)->first();
            return view('admin.user.edit', $data);
        } else {
            //Check password change or not
            if (empty($request->password)) {
                $validation = $request->validate([
                    'name' => 'required',
                    'role' => ['required'],
                    'password'=>'required',
                    "email" => 'required|email|unique:users,email,' . $request->id . ',id',
                ]);
                if ($validation) {
                    User::where('id', $request->id)
                        ->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'status' => $request->status,
                            'position'=>$request->position,
                            'address'=>$request->address
                        ]);
                    //Update role Admin
                    if ($request->role) {
                        DB::table('role_user')->where('user_id', $request->id)
                            ->update(
                                ["role_id" => $request->role]
                            );
                    }
                }
            } else {
                $validation = $request->validate([
                    'name' => 'required',
                    "email" => 'required|email|unique:users,email,' . $request->id . ',id',
                    'password' => 'required|min:4',
                    'password_confirmation' => 'required|required_with:password|same:password',
                ]);
                if ($validation) {
                    User::where('id', $request->id)
                        ->update([
                            'name' => $request->name,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'status' => $request->status,
                            'position'=>$request->position
                        ]);
                    if ($request->role) {
                        DB::table('role_user')->where('user_id', $request->id)
                            ->update(
                                ["role_id" => $request->role]
                            );
                    }
                }
            }
            return redirect('users');
        }
    }
    /**
     * Change status to inactive user
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive($id)
    {
        $user = User::find($id);
        $user -> status= 0;
        $user -> save();
        return back();
    }
    /**
     * Change status to active user
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $user = User::find($id);
        $user -> status= 1;
        $user -> save();
        return back();
    }
     /**
     * show all students under mentor
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mentorStudent($id){
        $tutor = User::find($id);
        $students = $tutor->students;
        return view('admin.user.viewStudentMentor',compact('students'));
    }
     /**
     * show all comments related to each user
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comments($id){
        $tutor = User::find($id);
        $comment = $tutor->comments;
        return view('admin.user.viewTutorComment',compact('comment'));
    }

}
