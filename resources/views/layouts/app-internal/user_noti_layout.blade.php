
<h2>Notifications</h2>
<div>
@foreach($notifications as $noti)
@if($noti->what == 'Posted')
                <div>
                <b>{{ $noti -> created_at -> diffForHumans()}} </b> || <a href="postView/{{$noti->status_id}}"> {{ $noti->n_name}} Posted an Update </a>
                </div><br>
@else
    @foreach($follower as $follow)
        
            @if($noti->status_id == $follow->status_id)
                <div>
               <b>{{ $noti -> created_at -> diffForHumans()}} </b> || <a href="postView/{{$noti->status_id}}"> {{ $noti->n_name}} Commented On {{ $noti->p_name}}'s Post </a></div>



                 <br>
                
            @endif
        
    @endforeach
@endif
@endforeach
</div>