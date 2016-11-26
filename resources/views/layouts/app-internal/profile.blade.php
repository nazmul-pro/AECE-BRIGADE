@extends('layouts.app')

@section('content')

<div class="container" id="show">
@include('flash::message')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>{{$user->name}}'s Profile</h2><img src="/assets/avatars/{{$user->avatar}}" style="width:200px; height:200px; float:left; border-radius: 50%; margin-left: 25px;  "></div>
                <div class="col-md-5 col-md-offset-3 form-group">
                <h4>Change Yourself</h4>
                    {!!  Form::open(array('files' => 'true')) !!}
                    {!! Form::hidden('user_id', $user->id) !!}
            
                    {!! Form::file('avatar',array('class'=>'btn btn primary')) !!}<br>

                    {!! Form::submit('Change Avatar',array('class'=>'btn btn primary')) !!}
                    {!! Form::close() !!}
                    </div>
                </div>


        </div>
    </div>
</div><div class="row" style="position: absolute; bottom: 0px; width: 100%; left: 25px; "> @include('layouts.footer')</div>

@endsection


