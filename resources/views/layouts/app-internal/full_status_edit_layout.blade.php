@extends('layouts.app')

@section('content')

<div class="container" id="show">
@include('flash::message')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                {!! Form::open(array('route'=>['postView.update',$status->id],'method'=>'PUT')) !!}
                <div class="panel-body">
                <input type="text" name="title" placeholder="Enter Post Title" required value="{{$status->title}}"  style="width:100%;" class="form-control"><br>
                    <textarea id="status-text" class="form-control" name="status-text" >{!!$status->status_text!!}</textarea>
                </div>
                
                    <button class="btn btn-info pull-right btn-sm" style="margin-right:25px;background-color:#09689a;color: #ffffff; "><i class="fa fa-plus"></i> Update Status</button>
                <br><br>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>

<script type="text/javascript" src='{{ url('assets/js/tinymce1/tinymce.min.js')}}'></script>
    <script type="text/javascript" src='{{ url('assets/js/prism.js')}}'></script>
  <script type="text/javascript">
  tinymce.init({
    selector: '#status-text',
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

<!-- <div id="show"></div>
<script type="text/javascript"  src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function () {
                

                $('#show').load('/home')
            }, 10000);
        });
    </script> -->
<!-- <script type="text/javascript">
    function funcName() {
    alert("test");
}

var run = setInterval(funcName, 10000)
</script>
 -->
@endsection


