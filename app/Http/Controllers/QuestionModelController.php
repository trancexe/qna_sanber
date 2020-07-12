<?php

namespace App\Http\Controllers;

use App\QuestionModel;
use App\Comment;
use Illuminate\Http\Request;
use Auth;
use App\Vote;

class QuestionModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions  = QuestionModel::paginate(8);
        // $questions->tag = explode(',' , $questions->tag);
        foreach ($questions as $key => $value)
        {
            $questions[$key]['tag'] = explode(',', $value['tag']);
        }
        return view('question.index', compact('questions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        unset($request['_token']);
        $data = [
            'title' => $request->get('title'),
            'body' => $request->get('textarea'),
            'tag' => $request->get('tag'),
            'user_id' => Auth::id()
        ];
        QuestionModel::create($data);
        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question  = QuestionModel::findOrFail($id);
        $question->tag = explode(',' , $question->tag);
        $answer = $question->answer;
        $comment = $question->comment;
        $sumQuestion = Vote::sumQuestion($question);
        $sumAnswer = Vote::sumAnswer($question);
        $scoreById = Vote::scoreUserById(Auth::id());
        $baCheck = Vote::baCheck($id);
        return view('question.show', compact('question','answer','comment','sumQuestion','sumAnswer','scoreById','baCheck'));
        // return dd($baCheck);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = QuestionModel::findOrFail($id);
        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $question = \App\QuestionModel::findOrFail($id);
        $question->title = $request->get('title');
        $question->body = $request->get('textarea');
        $question->tag = $request->get('tag');
        $question->save();
        return redirect()->route('question.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $deleted = QuestionModel::findOrFail($id);
        $deleted = QuestionModel::destroy($id);
        return redirect()->route('question.index');
    }
}
