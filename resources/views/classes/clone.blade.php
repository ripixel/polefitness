@extends('admin')

@section('content')
	<h1>Class Manager</h1>
	<h2>Create Class</h2>
	
	{!! Form::model($class, ['method' => 'POST', 'url' => action('ClassesController@store'), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('classes.form', ['submit_text' => 'Create Class'])
	
	{!! Form::close() !!}
@endsection