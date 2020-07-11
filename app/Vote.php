<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vote extends Model
{
    protected $fillable = ['vote','question_id','answer_id','user_id'];

    public static function sumQuestion($request){
        $sum = DB::select('select question_id, sum(vote) as vote 
        from votes
        where question_id = '.$request->id.' and answer_id is null
        group by question_id
        ');
        return ($sum);
    }

    public static function sumAnswer($request){
        $sum = DB::select('select question_id,answer_id, sum(vote) as vote 
        from votes
        where question_id = '.$request->id.' and answer_id is not null
        group by question_id,answer_id
        ');
        return ($sum);
    }

    public static function userRepQ(){
        
        $score = DB::select('
            select * from votes A inner join questions B
            on A.question_id = B.id and A.user_id = B.user_id
            where a.answer_id is null
        ');
        return $score;
    }

    public static function userRepA(){
        $score = DB::select('

        ');
    }

}
