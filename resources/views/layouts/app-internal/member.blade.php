@extends('layouts.app')
@include('flash::message')
<div class="body" style="background: url(assets/img/back-member4.jpg) no-repeat center center fixed;">
@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-1" style="text-align:center;">
        <img src="/assets/avatars/{{Auth::user()->avatar}}" style="width:150px; height:150px;  border-radius: 50%;   ">
        <h3>{{Auth::user()->name}}</h3><hr style="height:2px; width:200px;background-color:#000;"><p>{{Auth::user()->email}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="text-align:center;background-color:#000; height:auto;opacity:.6;">

      
@if($cvs)
  @foreach($cvs as $cv)
      <div class="row">
        <div class="col-md-5 " style="text-align: right; "><h3 class="pull-right" style=" display: block;color: #000; background-color: #ffffff;width:300px;padding-right:50px; text-transform: uppercase;">{{$cv->title}}</h3><br><br><br>
        <acronym title="Edit"><a href="{{Route('resume.edit',$cv->id)}}"><button class="glyphicon glyphicon-edit"></button></a></acronym><br>
        
        {!! Form::open(array('route'=>['resume.destroy',$cv->id],'method'=>'DELETE')) !!}
        {!! Form::hidden('id',$cv->id)!!}
       <acronym title="Delete"> <button type="submit" class="glyphicon glyphicon-remove"></button></acronym>
        {!! Form::close() !!}
<!--         <form action="{{ url('members/'.$cv->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" id="delete-task-{{ $cv->id }}" class="btn btn-danger">
                <i class="fa fa-btn fa-trash"></i>Delete
            </button>
        </form><br> -->


        </div>
        <div class="col-md-6" style=" margin-right: 20px;border-left: 2px solid #ffffff; height:auto;">

          <div class="text" style="text-align: justify; color: #ffffff; ">{!!html_entity_decode(nl2br($cv->details))!!}</div><br><hr>
        </div>
      </div>
  @endforeach
@endif
      


   





    </div>
</div>
</div>
<!-- add info -->


<div class="add-cv row">
  <div class="col-md-10 col-md-offset-2">

{!! Form::open(array('route'=>'resume.store')) !!}
<h2>Add Cataegory And Information...</h2>
<h4>Category Title::</h4>  <input type="text" name="title" style="width:900px;" class="form-control">
</div>
</div>
<div class="add-cv row">
  <div class="col-md-10 col-md-offset-2">

<h4> Information::</h4><textarea name="details" id="add-cv" style="width:900px;"></textarea><br>
<button class="btn btn-info pull-left btn-sm" style="margin-right:25px;"><i class="fa fa-plus"></i> Add Category</button>
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


