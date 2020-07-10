<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // dd ($request->question_id, $request);
        $data = [
            'body' => $request->get('textarea'),
            'vote' => 0,
            'question_id' => $request->id,
            'user_id' => Auth::id()
        ];
        Answer::create($data);
        return redirect()->route('question.show',$request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        // dd($answer);
        return view('answer.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $data = \App\Answer::findOrFail($answer->id);
        $data->body = $request->get('textarea');
        $data->save();
        return redirect()->route('question.show',$answer->question_id);
        // dd($request,$answer, $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Answer::destroy($id);
        // return dd($id);
        return redirect()->back();
    }
}
