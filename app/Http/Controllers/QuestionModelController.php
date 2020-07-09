<?php

namespace App\Http\Controllers;

use App\QuestionModel;
use Illuminate\Http\Request;
use Auth;

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
        return url('/');;
        // {"title":"satu dua tiga","textarea":"<p><strong>satu dua tiga<\/strong><\/p>","tag":"satu, dua, tiga, empat"}
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

        return view('question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionModel $questionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionModel $questionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuestionModel  $questionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionModel $questionModel)
    {
        //
    }
}
