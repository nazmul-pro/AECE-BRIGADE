
@extends('layouts.app')

@section('content')
<div class="add-cv row">
  <div class="col-md-10 col-md-offset-2">

{!! Form::open(array('route'=>['resume.update',$cvs->id],'method'=>'PUT')) !!}
<h2>Add Cataegory And Information...</h2>
<h4>Category Title::</h4>  <input type="text" name="title" value="{{$cvs->title}}" style="width:900px;" class="form-control">
</div>
</div>
<div class="add-cv row">
  <div class="col-md-10 col-md-offset-2">

<h4> Information::</h4><textarea name="details" id="add-cv" style="width:900px;">{{$cvs->details}}</textarea><br>
<button class="btn btn-info pull-left btn-sm" style="margin-right:25px;"><i class="fa fa-plus"></i> Updat Category</button>
</div>
</div>
{!! Form::close() !!}

<script type="text/javascript" src='{{ url('assets/js/tinymce1/tinymce.min.js')}}'></script>
<script type="text/javascript">
  tinymce.init({
    selector: '#add-cv',
    menubar: false,
    theme: 'modern',
    width: 910,
    height: 100,
    plugins: [
      "codesample",
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    content_css: 'css/content.css',
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons | codesample',
    code_dialog_height: 200
  });
  </script>

<!-- end add info -->


@endsection
