@extends('layouts.app')


@section('content')
<form action="{{route('question.update',$question->id)}}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId" value= "{{$question->title}}"">
  </div>  
  <div class="form-group">
  <textarea class="form-control" name="textarea" id="textarea" rows="3">{{$question->body}}</textarea>
    </div>
    <div class="form-group">
      <label for=""></label>
      <input value="{{$question->tag}}" type="text" name="tag" id="tag" class="form-control" placeholder="tag separated by comma. ex: one, two, tree " aria-describedby="helpId">
    </div>
    <a href="{{ route('question.show',$question->id)}}" class="btn btn-sm btn-primary">Back</a>
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
{{-- <script>
    var editor_config = {
      path_absolute : "/",
      selector: '#textarea',
      height: 500,
      theme: 'modern',
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
      image_advtab: true,
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ],
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }
      
          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
      }
    };
    tinymce.init(editor_config);
</script> --}}
@endpush