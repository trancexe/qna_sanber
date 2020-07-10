<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ["body" , "question_id", "answer_id", "user_id"];

    public function question(){
        return $this->belongsTo('App\QuestionModel','question_id','id');
    }
}
