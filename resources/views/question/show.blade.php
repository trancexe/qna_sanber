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
<div>
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
    {{-- <a class="" href="{{ route('article.index', $article['id'])}}"> --}}
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

</div>
<div class="mt-2">
  <a class='aCom' href="">add a comment</a>
</div>
<div class="answer pt-4">
  <div class="ansT">
    <h4>Answer</h4>
  </div>
  <hr width="80%" size="8" align="left">
  @foreach($answer as $key)
  <div style="word-break: break-all">{!!$key->body!!}
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
<button type="sumbit" class="btn float-right shadow-none" value="edit">
  <a class="" href="{{route('answer.edit', $key->id)}}">
    <i class="fas fa-edit"></i>
  </a>
</button>


<a class='aCom' href="">add a comment</a>
<hr width="80%" size="8" align="left">
</div>
@endforeach
{{-- <hr width="80%" size="8" align="left"> --}}
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
@endsection


@push('script')
<script src="https://cdn.tiny.cloud/1/l7rzbfk0iqkj9pwjc3spihhkp0uniclzootgf6wkbuloilj2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: '#textarea'
  });
</script>

@endpush