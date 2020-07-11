@extends('layouts.app')

@section('content')
{{-- Question --}}
<div class="header">
  <h4> {{$question->title}}</h4>
</div>
<div class="body" style="word-break: break-all;">
  <p>{!! $question->body !!}</p>
</div>
{{-- Question END --}}

{{-- button Quesion--}}
<div class="row float-right">
  <form method="post" action="{{ route('votes',$question->id) }}">
  @method("PUT")
  @csrf
  <input type="hidden" name="vote" value=10>
  <input type="hidden" name="answer_id" value={{null}}>
  <p class='float-right'>
    <button type="submit" class="btn float-right shadow-none"
    data-toggle="tooltip" data-placement="top" title="Vote Up">
      <a class="">
        <i class="fas fa-caret-up"></i>
      </a>
    </button>
  </p>
  </form>
  <p class='float-right mb-0'>
    <button type="submit" class="btn disabled" value="down"
    data-toggle="tooltip" data-placement="top" title="Score">
      <a class="" >
        {{$sumQuestion[0]->vote}}
      </a>
    </button>
  </p>
  <p class='float-right'>
    <button type="submit" class="btn float-right shadow-none" value=-1
    data-toggle="tooltip" data-placement="top" title="Vote Down">
      <a class="" href="{{ route('question.edit',$question->id)}}">
        <i class="fas fa-caret-down"></i>
      </a>
    </button>
  </p>  
  <form
  method="POST"
  class="d-inline"
  onsubmit="return confirm('Are you sure?')"
  action="{{route('question.destroy',$question->id)}}"
  >@csrf
  <input
  type="hidden"
  value="DELETE"
  name="_method">
  <button type="submit" class="btn float-right shadow-none" value="Trash"
  data-toggle="tooltip" data-placement="top" title="Delete">
    <i class="fas fa-trash"></i>
  </a>
</button>
</form>
<p class='float-right'>
  <button type="submit" class="btn float-right shadow-none" value="edit"
  data-toggle="tooltip" data-placement="top" title="Edit">
    <a class="" href="{{ route('question.edit',$question->id)}}">
      <i class="fas fa-edit"></i>
    </a>
  </button>
</p>
</div>
{{-- button question end--}}

{{-- tag --}}
<div class="tag">
  @foreach ($question->tag as $key => $value)
  <a class="tag" rel="tag">{{$value}}</a>
  @endforeach
</div>
{{-- tag end --}}

{{--  Comment Question --}}
<div class="mt-4">
<hr width="80%" size="8" align="left">
  @foreach ($comment as $key)
      <div class="row col-12">
        @if ($key->question_id == $question->id && $key->answer_id == null)
        <div class="col-2"></div>
        <div class="col-10" style="word-break: break-all;"><p >
      {!!$key->body!!}
      {{-- comment button --}}
        <form
        method="POST"
        class="d-inline"
        onsubmit="return confirm('Are you sure?')"
        action="{{route('comm.destroy',$key->id)}}"
        >@csrf
        <input
        type="hidden"
        value="DELETE"
        name="_method">
        <button type="submit" class="btn float-right shadow-none" value="Trash"
        data-toggle="tooltip" data-placement="top" title="Delete">
          <i class="fas fa-trash"></i>
        </a>
      </button>
      </form>
      <p class='float-right'>
        <button type="submit" class="btn float-right shadow-none" value="edit" data-toggle="tooltip" data-placement="top" title="Edit">
          <a class="" href="{{ route('comm.edit',$key->id)}}">
            <i class="fas fa-edit"></i>
          </a>
        </button>
      </p>
      {{-- comment button end --}}
      <hr width="80%" size="8" align="left">
    </p>
  </div>
      @endif
  </div>
  @endforeach  
</div>
{{-- Comment Question END --}}
  <a class='aCom' href="{{route ('comm.create', ['q_id'=>$question->id, 'a_id'=> 0])}}">add a comment</a>


{{-- Answer --}}

<div class="ansT row mt-4">
  <h4>Answer</h4>
</div>
<hr width="80%" size="8" align="left">
@foreach($answer as $key)
<div class="row col-12" style="word-break: break-all;">
  <div style="word-break: break-all">{!!$key->body!!}
  </div>
</div>

{{-- Button Answer --}}
<div class="row col-12">
  <div class="col-12">
    <form
    method="POST"
    class="d-inline"
    onsubmit="return confirm('Are you sure?')"
    action="{{route('answer.destroy',$key->id)}}"
    >@csrf
    <input
    type="hidden"
    value="DELETE"
    name="_method">
    <button type="submit" class="btn float-right shadow-none pb-0" value="Trash"
    data-toggle="tooltip" data-placement="top" title="Delete">
      <i class="fas fa-trash"></i>
    </a>
  </button>
</form>
<p class='float-right mb-0'>
  <button type="submit" class="btn float-right shadow-none pb-0" value="edit"
  data-toggle="tooltip" data-placement="top" title="Edit">
    <a class="" href="{{route('answer.edit', $key->id)}}">
      <i class="fas fa-edit"></i>
    </a>
  </button>
</p>

<p class='float-right mb-0'>
  <button type="submit" class="btn float-right shadow-none pb-0" value=-1
  data-toggle="tooltip" data-placement="top" title="Vote Down">
    <a class="" href="{{ route('question.edit',$question->id)}}">
      <i class="fas fa-caret-down"></i>
    </a>
  </button>
</p>

<p class='float-right mb-0'>
  <button type="submit" class="btn disabled" value="down"
  data-toggle="tooltip" data-placement="top" title="Score">
    <a class="" >
      @foreach ($sumAnswer as $sa)
        @if ($sa->answer_id == $key->id)
        {{$sa->vote}}
        @endif
      @endforeach
    </a>
  </button>
</p>

<form method="post" action="{{ route('votes',$question->id) }}">
  @method("PUT")
  @csrf
  <input type="hidden" name="vote" value=10>
  <input type="hidden" name="answer_id" value={{$key->id}}>
  <p class='float-right'>
    <button type="submit" class="btn float-right shadow-none"
    data-toggle="tooltip" data-placement="top" title="Vote Up">
      <a class="">
        <i class="fas fa-caret-up"></i>
      </a>
    </button>
  </p>
  </form>
</div>
</div>
{{-- Button Answer End --}}

{{-- coomment answer --}}
<hr width="80%" size="8" align="left" class="mt-0">
      <div class="mt-4">
          @foreach ($comment as $keycom)
              <div class="row col-12">
                @if ($keycom->question_id == $question->id && $keycom->answer_id ==  $key->id)
                <div class="col-2"></div>
                <div class="col-10" style="word-break: break-all;"><p >
              {!!$keycom->body!!}
              {{-- comment button --}}
                <form
                method="POST"
                class="d-inline"
                onsubmit="return confirm('Are you sure?')"
                action="{{route('comm.destroy',$keycom->id)}}"
                >@csrf
                <input
                type="hidden"
                value="DELETE"
                name="_method">
                <button type="submit" class="btn float-right shadow-none" value="Trash"
                data-toggle="tooltip" data-placement="top" title="Delete">
                  <i class="fas fa-trash"></i>
                </a>
              </button>
              </form>
              <p class='float-right'>
                <button type="submit" class="btn float-right shadow-none" value="edit" data-toggle="tooltip" data-placement="top" title="Edit">
                  <a class="" href="{{ route('comm.edit',$keycom->id)}}">
                    <i class="fas fa-edit"></i>
                  </a>
                </button>
              </p>
              {{-- comment button end --}}
              <hr width="80%" size="8" align="left">
            </p>
          </div>
              @endif
          </div>
          @endforeach  
        </div>

{{-- coomment answer end--}}

<a class='aCom' href="{{route ('comm.create', ['q_id'=>$question->id, 'a_id'=> $key->id])}}">add a comment</a>
<hr width="80%" size="8" align="left">
@endforeach
{{-- Answer END --}}

{{-- Add New Answer --}}
<div>
  <h4>Your Answer</h4>
  <form action="{{route('answer.store',['id' => $question->id])}}" method="POST">
    @csrf
    <div class="form-group">
      <textarea class="form-control" name="textarea" id="textarea" rows="3"></textarea>
    </div>
    <a href="{{ url('/')}}" class="btn btn-sm btn-primary">Back</a>
    <button type="submit" class="btn btn-sm btn-success">Submit</button>
  </form>
</div>
</div>
{{-- Add New Answer END --}}
@endsection


@push('script')
<script src="https://cdn.tiny.cloud/1/l7rzbfk0iqkj9pwjc3spihhkp0uniclzootgf6wkbuloilj2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#textarea'
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

</script>

@endpush