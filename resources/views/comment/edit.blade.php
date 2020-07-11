@extends('layouts.app')


@section('content')
<form action="{{route('comm.update',$data->id)}}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
  <textarea class="form-control" name="textarea" id="textarea" rows="3">{{$data->body}}</textarea>
    </div>
      <div class="form-group">
          <input type="hidden" class="form-control" name="id" id="id" value={{$data->id}}>
      </div>
    <a href="{{ route('question.show',$data->question_id)}}" class="btn btn-sm btn-info">Back</a>
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