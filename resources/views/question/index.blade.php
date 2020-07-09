@extends('layouts.app')

@section('content')
<div class="row">
    @foreach ($questions as $item)
        <div class="col-3 mt-2">
            <div class="card">
                <div class="card head border-bottom-0">
                    {{$item->title}}
                </div>
                <div class="card body">
                    {!! substr($item->body,0 , 100) !!}
                </div>
                <div class="card footer border-top-0">
                    {{$item->tag}}<br>
                    <div class="date"><i class="fa fa-clock"></i>{{$item->created_at}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3">{{$questions->links()}}</div>
@endsection