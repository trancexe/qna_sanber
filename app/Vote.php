<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Vote extends Model
{
    protected $fillable = ['vote','question_id','answer_id','user_id','kd_rep'];

    public static function sumQuestion($request){
        $db = DB::select('select question_id, sum(vote) as vote 
        from votes
        where question_id = '.$request->id.' and answer_id is null
        group by question_id
        ');
        
        if($db==null){
            $sumQuestion['question_id'] = 0;
            $sumQuestion['vote'] = 0;
        }
        else{
            $sumQuestion['question_id'] = $db[0]->question_id;
            $sumQuestion['vote'] = $db[0]->vote;
        }
        return ($sumQuestion);
    }

    public static function sumAnswer($request){
        $sum = DB::select('select question_id,answer_id, sum(vote) as vote 
        from votes
        where question_id = '.$request->id.' and answer_id is not null
        group by question_id,answer_id
        ');
        return ($sum);
    }

    public static function scoreUserById($user_id){
        $score = [];
        $db = [];
        if($user_id == null){
            $score['user_id'] = 0;
            $score['score'] = 0;
            
        } else {
        //     $db = DB::select('
        //     select A.user_id, sum(A.vote)  as score from (
        //     select B.user_id , sum(vote) as vote from votes A inner join questions B
        //     on A.question_id = B.id
        //     where a.answer_id is null
        //     Group by B.user_id

        //     union all

        //     select B.user_id , sum(A.vote) as vote from votes A inner join answers B
        //     on A.question_id = B.question_id and A.answer_id = B.id
        //     Group by B.user_id

        //     ) A
        //     WHERE A.user_id = '.$user_id.' 
        //     Group By A.user_id
        // ');

            $db = DB::select('
                select user_id, sum(vote) as score from votes
                where user_id = '.$user_id.'
                group by user_id
            ');
        }

        if($db==null){
            $score['user_id'] = 0;
            $score['score'] = 0;
        }
        else{
        $score['user_id'] = $db[0]->user_id;
        $score['score'] = $db[0]->score;
        }
        return $score;
    }

    public static function scoreAll(){
        $db = DB::select('
        select user_id, sum(vote) as score from votes
        group by user_id
        ');


        if($db==null){
            $score['user_id'] = 0;
            $score['score'] = 0;
        }
        else{
            $score['user_id'] = $db[0]->user_id;
            $score['score'] = $db[0]->score;
        }
        
        return $score;
    }


    public static function bAnswer($request,$id){
        $db = DB::select('
            select * from votes 
            where question_id = '.$id.'
            AND kd_rep  = 2
        ');

        if($db==null){
            $banswer = [
                'vote' => $request->get('vote'),
                'question_id' => $id,
                'answer_id' => $request->get('answer_id'),
                'user_id' => Auth::id(),
                'kd_rep' => 2
            ];
            $banswer = Vote::create($banswer);    
        }
        else{
               
        }
    }

    public static function baCheck($id){
        $db = DB::select('
            select * from votes 
            where question_id = '.$id.'
            AND kd_rep  = 2
        ');

        if($db==null){
            $data['id'] = 0;
            $data['answer_id'] = 0;
        }
        else{
            $data['id'] = $db[0]->id;
            $data['answer_id'] = $db[0]->answer_id;
        }

        return $data;
    }

}
