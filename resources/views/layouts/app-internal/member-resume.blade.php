@extends('layouts.app')


@section('content')
@if($users)
@foreach($users as $user)
<div style="background: url('/assets/img/back-member4.jpg') no-repeat center center fixed; height:100%;margin-top: -20px; ">

<div class="row">
    <div class="col-md-10 col-md-offset-1" style="text-align:center;">
        <img src="/assets/avatars/{{$user->avatar}}" style="width:150px; height:150px;  border-radius: 50%; margin-top: 30px;  ">
        <h3>{{$user->name}}</h3><hr style="height:2px; width:200px;background-color:#000;"><p>{{$user->email}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12" style="text-align:center;background-color:#000; height:auto;opacity:.6;">
@endforeach
@endif
      
@if($cvs)
  @foreach($cvs as $cv)
      <div class="row">
        <div class="col-md-5 " style="text-align: right; "><h3 class="pull-right" style=" display: block;color: #000; background-color: #ffffff;width:300px;padding-right:50px; text-transform: uppercase;">{{$cv->title}}</h3>



        </div>
        <div class="col-md-6" style=" margin-right: 20px;border-left: 2px solid #ffffff; height:auto;">

          <div class="text" style="text-align: justify; color: #ffffff; ">{!!html_entity_decode(nl2br($cv->details))!!}</div><br><hr>
        </div>
      </div>
  @endforeach
@endif
      
</div></div></div>

<!-- add info -->


 
<!-- end add info -->
@endsection


