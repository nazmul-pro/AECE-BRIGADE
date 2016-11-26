@extends('layouts.app')

@section('content')

<div class="container">
@include('flash::message')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
            <div class="panel-heading ">
                <div class="row">
                <div class="panel-title pull-left col-md-7">
                {{$status->p_name}} | {{ $status -> created_at -> diffForHumans()}}</div>                 
                <div class=" col-md-3 " style="text-align: right; ">

                Posted: {{ $status -> created_at }}


                </div>
                @if($status->users_id == Auth::user()->id)
                <div class="col-md-1">

                <a href="{{Route('postView.edit',$status->id)}}"><button type="submit" class="glyphicon glyphicon-edit" style="left: 25px;color: #ffab00; "></button></a>


                </div>

                        {!! Form::open(array('route'=>['postView.destroy',$status->id],'method'=>'DELETE')) !!}
                        {!! Form::hidden('id',$status->id)!!}                
                <div class="col-md-1 ">
                <button type="submit" class="glyphicon glyphicon-remove" style="left: -10px;color: #b71c1c; "></button>


                </div>
                {!! Form::close() !!}
            @endif
        
<!--                 <acronym title="Edit This Post"><a href="{{Route('postView.edit',$status->id)}}"><span class="glyphicon glyphicon-edit" style="margin-left: 10px; "></span></a></acronym>



                           

                <acronym title="Delete This Post"> <span class="glyphicon glyphicon-remove" style="margin-left: 10px;position: fixed; "></span></acronym> -->

<!-- <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Post Action
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div> -->

                </div>
                <div class="clearfix"></div>
            </div>

         
                <div class="panel-body">
                <script type="text/javascript" src='{{ url('assets/js/prism.js')}}'></script>
              <p><h4>Title: </h4>{{ $status -> title }}</p>
               
                <p><h4>Detail:</h4>{!!$status->status_text!!}</p>


                </div>
                <div class="row">
                <div class="col-md-12">
                    <hr>
                    <ul class="list-inline list-unstyled">
                        <li>
                        <button type="button" data-toggle="collapse" data-target="#view-comments-{{ $status->id }}" aria-expanded="false" aria-controls="view-comments" class="btn btn-xs btn-info"><i class="fa fa-comments-o"></i>  Comments</button>
                        </li><li>
                        {!!  Form::open() !!}
                        {!! Form::hidden('follow_status', $status->id) !!}
                        
                        
                        <button type="submit" class="btn btn-xs btn-info"><i class="fa fa-thumbs-up"></i>

                                @foreach($followers as $follower)

                                    @if($follower->status_id == $status->id)
                                    Un
                                    @endif
                                @endforeach
                                Follow


                        </button>
                        
                        {!! Form::close() !!}

                        </li>
                    </ul>
                </div>
                </div>
           


  <div class="panel-footer clearfix">         
<div class="collapse in" id="view-comments-{{$status->id}}">
<br>
    @if($comments)
        

        @foreach($comments as $comment)
        <div class="row">
        <div class="col-md-1"><img src="/assets/avatars/{{$comment->avatar}}" style="width:50px; height:50px; float:left; border-radius: 50%; margin-left: 5px;  ">
        <div style="font-size:12px; margin-left:10px;">{{ $comment -> created_at -> diffForHumans()}}</div>
        
         </div>
        <div class="col-md-10" >
        <blockquote class="blockquote">
            <a href="#"> {{$comment->c_name}}</a> <p style="font-size: 14px; ">{{ $comment->comment_text }}</p> 
            </blockquote>
            </div>
            <br>

        </div> 
        <hr>
        @endforeach

    @endif
</div>
            
                       {!!  Form::open() !!}
                        {!! Form::hidden('post_comment', $status->id ) !!}
                        {!! Form::hidden('poster_name' , $status->p_name ) !!}
                        
<div class="row">
  <div class="col-lg-12">

    <div class="input-group">
      <input type="text" class="form-control" name="comment_text" placeholder="Write a comment">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Add Comment</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div>

                        {!! Form::close() !!}
 </div> 

            </div>

            <div>


</div>

@endsection