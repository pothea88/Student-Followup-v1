<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Student;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'user_id','stu_id'
    ];
    public function user(){
        return $this->belongsTo (User::class);
    }
    public function student(){
        return $this->belongsTo (Student::class,'stu_id');
    }
}
