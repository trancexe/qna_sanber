<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use Auth;

class VoteController extends Controller
{
    public function vote(Request $request,$id)
    {
        if($request->answer_id){
            $data = Vote::where('question_id','=',$id)->
                    where('user_id','=',Auth::id())->
                    where('answer_id','=',$request->answer_id)->
                    where('kd_rep','=','1')->
                    get();
        }
        else if($request->answer_id == null){
            $data = Vote::where('question_id','=',$id)->
                    where('user_id','=',Auth::id())->
                    where('answer_id','=',null)->
                    where('kd_rep','=','1')->
                    get();
        }

        

        if($data->isEmpty()){
            $save = [
                        'vote' => $request->get('vote'),
                        'question_id' => $id,
                        'answer_id' => $request->get('answer_id'),
                        'user_id' => Auth::id(),
                        'kd_rep' => 1
        
                    ];
            $save = Vote::create($save);    
            return redirect()->route('question.show',$id);   
        }
        else {
            return redirect()->route('question.show',$id);
            $save = [];
        }

        // dd($data->isEmpty());
    }


    public function banswer(Request $request,$id){
        $banswer = Vote::bAnswer($request,$id);

        return redirect()->route('question.show',$id);

    }
}
