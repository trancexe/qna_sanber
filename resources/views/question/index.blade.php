@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @foreach ($questions as $item)
        <div class="col-3 mt-4 d-flex">
            <div class="card flex-fill">
                <div class="card head border-bottom-0 border-0 pl-3 pr-3 pb-2 text-left">
                    <b><a href="{{route('question.show', $item->id)}}">{!! substr($item->title,0 , 50) !!}</a></b>
                </div>
                <div class="card body border-0 pl-3 pr-3 text-left">
                    {!! substr($item->body,0 , 100) !!}
                </div>
                <div class="card footer border-top-0 border-0 pl-3 pr-3 text-muted mt-auto">
                    <div>@foreach ($item->tag as $key => $value)
                    <a class="tagI" rel="tag">{{$value}}</a>
                    @endforeach
                    </div>
                    <div class="date"><i class="fa fa-clock"></i> {{$item->created_at}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    <div class="mt-3">{{$questions->links()}}</div>
@endsection