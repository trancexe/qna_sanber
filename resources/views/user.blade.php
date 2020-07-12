@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
    @foreach ($user as $item)
        <div class="col-3 mt-4 d-flex">
            <div class="card flex-fill">
                <div class="card head border-bottom-0 border-0 pl-3 pr-3 pb-2 text-left">
                <b><a>{{$item->name}}</a></b>
                </div>
                <div class="card body border-0 pl-3 pr-3 text-left">
                    @if($item->id == $score['user_id'])
                        Reputation {{$score['score']}}
                    @else
                    Reputation 0
                    @endif
                </div>
                <div class="card footer border-top-0 border-0 pl-3 pr-3 text-muted mt-auto">
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3">{{$user->links()}}</div>
</div>
    <div class="mt-3"></div>
@endsection