@extends('layouts.app')


@section('content')
<form action="{{route('comm.store')}}" method="POST">
  @csrf
  <div class="form-group">
  <textarea class="form-control" name="body" id="textarea" rows="3"></textarea>
  </div>
  <div class="form-group">
  <input type="hidden" class="form-control" name="a_id" id="inputName" value="{{$a_id}}">
  </div>
  <div class="form-group">
    <input type="hidden" class="form-control" name="q_id" id="inputName" value="{{$q_id}}">
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
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