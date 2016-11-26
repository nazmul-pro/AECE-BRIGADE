@extends('layouts.app')
<div class="body" style="background: url(assets/img/back-files.jpg) no-repeat center center fixed;background-size: 100% 100%; height:100%;">
@section('content')

<div class="container">
@include('flash::message')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
			<div class="uploadDoc">
			<?php 
			echo Form::open(array('url' => '/files', 'method' => 'post','files' => 'true'));
			// echo 'Select file';	
			echo Form::text('title','',array('required' => 'required','placeholder'=>'Title_For_This_Doccument..','class'=>'form-control'));echo '<br>';			
			echo Form::file('image',array('class'=>'btn btn primary'));echo '<br>';	
			echo Form::submit('Upload',array('class'=>'btn btn primary')); 	
			echo Form::close();
			 ?>
			 </div>
			 <div class="showDoc">
			 <table class="table table-hover">
			  <thead>
			    <tr>
			      
			      <th style="padding-left:50px;" class="danger">File Title</th>
			      <th class="danger">Uploader</th>
			      
			    </tr>
			  </thead>
			  <tbody>
			  @foreach($docs as $doc)
			  <tr class="info" >
			  	<td style="padding-left:50px;"><a href="{{ url('assets/uFiles/')}}/{{$doc -> r_name }}"><p style="color:;"> {{$doc -> title }}</p></a></td>
			  	
			  	<td>{{$doc -> username }} | {{$doc->created_at-> diffForHumans()}}</td>
			  </tr>
			  @endforeach	    
			  </tbody>
			</table>
 	

 </div>
 </div>
 </div>
  </div>
 </div>


@endsection 
 