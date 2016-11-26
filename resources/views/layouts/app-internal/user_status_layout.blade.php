<div class="panel panel-default">
            <div class="panel-heading" style="background-color:#09689a; color: #ffffff;">
                <div class="panel-title pull-left" >
                {{ $user -> name}}  | {{ $status -> created_at -> diffForHumans()}}</div>                 
                <div class="panel-title pull-right ">
                <a class="glyphicon glyphicon-triangle-right" href="{{Route('postView.show',['id' => $status->id])}}"></a>
                
                </div>
                <div class="clearfix"></div>
            </div>

         
                <div class="panel-body">
               
                <p>
{{ $status -> title}}
                </p>


                </div>
                <div class="row">
                <div class="col-md-12">
                    <hr>
                    <ul class="list-inline list-unstyled">
                        <li class="list-inline-item">
                        <button type="button" data-toggle="collapse" data-target="#view-comments-{{ $status->id }}" aria-expanded="false" aria-controls="view-comments" class="btn btn-xs btn-info"><i class="fa fa-comments-o"></i>  Comments</button>
                        </li>
                        <li class="list-inline-item">
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

           
<div class="collapse" id="view-comments-{{$status->id}}"><br>
    @if($comments)
        

        @foreach($comments as $comment)
        <div class="row">
        <div class="col-md-1"><img src="http://uploads.webflow.com/53763c8d8ea4ee673c303a8e/540f3d3ed5ae42fe222d2ffc_user-icon-male.png" height="50" width="50">
        <br>
        {{ $comment -> created_at -> diffForHumans()}}
         </div>
        <div class="col-md-8">
        <blockquote class="blockquote">
            <a href="#"> {{$comment->c_name}}</a> {{ $comment->comment_text }}
            </blockquote>
            </div>
            <br>

        </div> 
        <hr>
        @endforeach

    @endif
</div>
 </div> 
            </div>
            <div>
</div>