<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    protected $table = 'questions';
    protected $fillable = ['title','body','tag','user_id'];
    
    public function answer(){
        return $this->hasMany('App\Answer','question_id','id');
    }

    public function comment(){
        return $this->hasMany('App\Comment','question_id','id');
    }
}