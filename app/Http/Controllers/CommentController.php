<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Student;
use App\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showComment($id)
    {
        $students = Student::find($id);
        return view('comments.view',compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $students = Student::find($id);
        return view('comments.add',compact('students'));
    }

    /**
     * Store a newly created resource in storage and send an email
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $student = Student::find($id);
        $user = User::find(Auth::id());
        $user_email = User::all();
        $comment = new Comment();
            $to_email = $user_email->pluck("email")->toArray();
            $data = array("application_email"=>"potheachorn@gmail.com","from"=>$user->email,"body"=>$request->comment,
            "email"=>$to_email,"subject"=>"Comment");
            Mail::send("email.email",compact('data'),function($message) use($data){
                $message->from($data['from'])
                ->to($data['email'])
                ->subject($data['subject']);
            }); 
        $comment->message = $request->comment;
        $comment->user_id = $user->id;
        $comment->stu_id = $student->id;
        $comment->save();
        return redirect()->route('viewComment',$student->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments = Comment::find($id);
        return view('comments.edit',compact('comments'));
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
        $user = User::find(Auth::id());
        $comments = Comment::find($id);
        $comments->message = $request->comment;
        $comments->user_id = $user->id;
        $comments->stu_id = $comments->student->id;
        $comments->save();
        return redirect()->route('viewComment',$comments->student->id);
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('viewComment',$comment->student->id);
    }
}
