@extends('layouts.app')

@section('content')
<div  style="background-color: #E9EBEE;height: 1000px; margin-top: -20px; ">
<div class="container"  ">
@include('flash::message')
    <div class="row">
        <div class="col-md-5 col-md-offset-1" style="width: 30%; ">
        <h2>Member</h2>
        @foreach($result2 as $res2)
        <div style="background-color: #ffffff;border-radius: 5px;padding-bottom: 10px; ">
        <img src="/assets/avatars/{{$res2->avatar}}" style="width:110px; height:110px; float:left; border-radius: 50%; margin-right: 5px;margin-top: 10px;  "></span> &nbsp;&nbsp;&nbsp;
                                <a href="{{ url('/member') }}/{{$res2->id}}"><h4>{{$res2->name}} </h4></a>{{$res2->email}} <br> Joined: {{$res2->created_at->diffForHumans()}} 
         </div>                   
        <br>
        @endforeach
        
        </div>
        <div class="col-md-5">
        <h2>Post</h2>

        @foreach($result1 as $res1)
        <div style="background-color: #ffffff;border-radius: 5px;padding: 20px 20px;margin-top: 10px; ">
        <h4>{{$res1->p_name}} | {{$res1->created_at->diffForHumans()}}</h4><br>
        <a href="{{ url('/postView') }}/{{$res1->id}}">{{$res1->title}}</a><br>
        </div>
        @endforeach
        
        </div>
    </div>
</div>
</div>
@endsection
