@extends('layouts.app')

@section('content')
<div class="body" style="background: url(assets/img/back-home.jpg) no-repeat center center fixed;background-size: 100% 100%; height:100%;margin-top: -50px; ">
<div class="container" id="show">

    <div class="row"><br><br>
    @include('flash::message')
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                

                {!! Form::open() !!}
                <div class="panel-body">
                <input type="text" name="title" placeholder="Enter Post Title" required  style="width:100%;" class="form-control"><br>
                    <textarea id="status-text" class="form-control" name="status-text" ></textarea>
                </div>
                
                    <button class="btn btn-info pull-right btn-sm" style="margin-right:25px;background-color:#09689a;color: #ffffff; "><i class="fa fa-plus"></i> Add Status</button>
                <br><br>
            </div>
            {!! Form::close() !!}

            @foreach($top_15_posts as $status)

            {!!
            view('layouts.app-internal.user_status_layout', [
            'status' => $status,
            'user'   => \App\Eloquent\User::find($status->users_id),

            'followers'   => \App\Eloquent\Followers::select('status_id')->where('follower',Auth::user()->name)->get(),
            'status_id'   => \App\Eloquent\Status::select('id')->get(),
            'comments' => \App\Eloquent\StatusComments::where('status_id', $status->id)->get()


            ])

            !!}

            @endforeach
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
 </div><div class="row">@include('layouts.footer')</div> 
@endsection




