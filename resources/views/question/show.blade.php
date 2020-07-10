@extends('layouts.app')

@section('content')
{{-- Question --}}
<div class="header">
  <h4> {{$question->title}}</h4>
</div>
<div class="body">
  <p>{!! $question->body !!}</p>
</div>
{{-- Question END --}}

 {{-- button Quesion--}}
 <div class="row float-right">
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
    <button type="sumbit" class="btn float-right shadow-none" value="Trash">
        <i class="fas fa-trash"></i>
      </a>
    </button>
  </form>
  <p class='float-right'>
    <button type="sumbit" class="btn float-right shadow-none" value="edit">
      <a class="" href="{{ route('question.edit',$question->id)}}">
        <i class="fas fa-edit"></i>
      </a>
    </button>
  </p>
  <p class='float-right'>
    <button type="sumbit" class="btn float-right shadow-none" value="edit">
      <a class="" href="{{ route('question.edit',$question->id)}}">
        <i class="fas fa-caret-up"></i>
      </a>
    </button>
  </p>
  <p class='float-right'>
    <button type="sumbit" class="btn float-right shadow-none" value="edit">
      <a class="" href="{{ route('question.edit',$question->id)}}">
        <i class="fas fa-caret-down"></i>
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

{{-- Question Comment --}}
<div class="mt-4">
  <div class="row col-12">
    <div class="col-2"></div>
    <div class="col-10"><p>
      <hr width="80%" size="8" align="left">
      @foreach ($comment as $key)
      @if ($key->question_id == $question->id && $key->answer_id == null)
      {!!$key->body!!}
      <hr width="80%" size="8" align="left">
      @endif
      @endforeach  
    </p></div>
  </div>
</div>
{{-- Question Comment END --}}

<div class="row col-12">
  <a class='aCom' href="{{route ('comm.create', ['q_id'=>$question->id, 'a_id'=> 0])}}">add a comment</a>
</div>


{{-- Answer --}}

<div class="ansT row mt-4">
  <h4>Answer</h4>
</div>
<hr width="80%" size="8" align="left">
@foreach($answer as $key)
<div class="row col-12">
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
  <button type="sumbit" class="btn float-right shadow-none" value="Trash">
    <i class="fas fa-trash"></i>
  </a>
</button>
</form>
<p class='float-right'>
<button type="sumbit" class="btn float-right shadow-none" value="edit">
<a class="" href="{{route('answer.edit', $key->id)}}">
  <i class="fas fa-edit"></i>
</a>
</button>
</p>
<p class='float-right'>
<button type="sumbit" class="btn float-right shadow-none" value="edit">
  <a class="" href="{{ route('question.edit',$question->id)}}">
    <i class="fas fa-caret-up"></i>
  </a>
</button>
</p>
<p class='float-right'>
<button type="sumbit" class="btn float-right shadow-none" value="edit">
  <a class="" href="{{ route('question.edit',$question->id)}}">
    <i class="fas fa-caret-down"></i>
  </a>
</button>
</p>
</div>
</div>
{{-- Button Answer End --}}

{{-- coomment answer --}}

  <div class="row col-12">
    <div class="col-2"></div>
    <div class="col-10"><p>
      @foreach ($comment as $keycom)
      @if ($keycom->question_id == $question->id && $keycom->answer_id == $key->id)
      {!!$keycom->body!!}
      <hr width="80%" size="8" align="left">
      @endif
      @endforeach 
    </p>
  </div>
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
</script>

@endpush