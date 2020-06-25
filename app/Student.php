<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;
use Illuminate\Notifications\Notifiable;
use App\User;
use App\Comment;

class Student extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'firstName', 'lastName', 'gender','class','year','student_id','province','status','user_id','avatar'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class,'stu_id');
    }
}
