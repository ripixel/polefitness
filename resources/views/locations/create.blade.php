@extends('admin')

@section('content')
	<h1>Create Location</h1>
	{!! Form::model($location = new \App\Location, ['method' => 'POST', 'url' => action('LocationController@store'), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('locations.form', ['submit_text' => 'Create Location'])
	
	{!! Form::close() !!}
@endsection