@extends('admin')

@section('content')
	<h1>Create Class</h1>
	
	{!! Form::model($class = new \App\Classe, ['method' => 'POST', 'url' => action('ClassesController@store'), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('classes.form', ['submit_text' => 'Create Class'])
	
	{!! Form::close() !!}
@endsection