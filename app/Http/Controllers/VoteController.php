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
                    where('answer_id','=',$request->answer_id)->get();
        }
        else if($request->answer_id == null){
            $data = Vote::where('question_id','=',$id)->
                    where('user_id','=',Auth::id())->get();
        }

        if($data->isEmpty()){
            $save = [
                        'vote' => $request->get('vote'),
                        'question_id' => $id,
                        'answer_id' => $request->get('answer_id'),
                        'user_id' => Auth::id()
        
                    ];
            $save = Vote::create($save);    
            return redirect()->route('question.show',$id);   
        }
        else {
            return redirect()->route('question.show',$id);
        }

        // dd($data);
    }
}
