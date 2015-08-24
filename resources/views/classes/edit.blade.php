@extends('admin')

@section('content')
	<h1>Edit Class</h1>
	<a href="{{ action('ClassesController@editAttendees', $class->id) }}" class="button button-with-icon"><i class="fa fa-users"></i> Edit Attendees</a>
	
	{!! Form::model($class, ['method' => 'PATCH', 'url' => action('ClassesController@update', $class->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('classes.form', ['submit_text' => 'Update Class'])
	
	{!! Form::close() !!}
	
	{!! Form::model($class, ['method' => 'DELETE', 'url' => action('ClassesController@destroy', $class->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
		
		{!! Form::submit('Delete Class', ['class' => 'button button-red confirmAction', 'data-confirmmessage' => 'Are you sure you want to delete this class?']) !!}
	
	{!! Form::close() !!}
	
	
@endsection