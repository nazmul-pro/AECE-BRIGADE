@extends('layouts.app')

@section('content')

<div class="container">
@include('flash::message')
    <div class="row">
        <div class="col-md-10 col-md-offset-2" style="font-size: 16px; ">
            

            

            {!!
            
            view('layouts.app-internal.user_noti_layout', [
            $user = Auth::user()->user,
            'notifications' => \App\Eloquent\PostNotifications::orderBy('created_at', 'DESC')->get(),
            'follower'   => \App\Eloquent\Followers::select('status_id')->where('follower', Auth::user()->name)->get()
            ])

            !!}

            
        </div>
    </div>
</div>
@endsection
