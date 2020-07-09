@extends('layouts.app')

@section('content')
<div class="row">
    @foreach ($questions as $item)
        <div class="col-3 mt-2">
            <div class="card border: none">
                <div class="card head border-bottom-0 border-0">
                    <a href="{{route('question.show', $item->id)}}">{{$item->title}}</a>
                </div>
                <div class="card body border-0">
                    {!! substr($item->body,0 , 100) !!}
                </div>
                <div class="card footer border-top-0 border-0">
                    <div>@foreach ($item->tag as $key => $value)
                    <a class="tagI" rel="tag">{{$value}}</a>
                    @endforeach
                    </div>
                    <div class="date"><i class="fa fa-clock"></i>{{$item->created_at}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3">{{$questions->links()}}</div>
@endsection