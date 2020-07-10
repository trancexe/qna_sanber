@extends('layouts.app')


@section('content')
<form action="{{route('answer.update',$answer->id)}}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
  <textarea class="form-control" name="textarea" id="textarea" rows="3">{{$answer->body}}</textarea>
    </div>
    <a href="{{ route('question.show',$answer->question_id)}}" class="btn btn-sm btn-primary">Back</a>
    <button type="submit" class="btn btn-sm btn-success">Submit</button>
</form>
@endsection


@push('script')
<script src="https://cdn.tiny.cloud/1/l7rzbfk0iqkj9pwjc3spihhkp0uniclzootgf6wkbuloilj2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#textarea'
    });
  </script>
@endpush