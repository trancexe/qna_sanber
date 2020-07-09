@extends('layouts.app')

@section('content')
    <div class="header">
       <h4> {{$question->title}}</h4>
    </div>
    <div class="body">
        <p>{!! $question->body !!}</p>
    </div>
    <div class="tag">
        @foreach ($question->tag as $key => $value)
        <a class="tag" rel="tag">{{$value}}</a>
        @endforeach
    </div>
    <div class="answer pt-4">
        <div class="ansT">
            Jawaban
        </div>
        <div class="AnsQ ">
            <div>
            Ini adalah jawaban dari pertanaan diatas
            </div>
        </div>
    </div>
@endsection