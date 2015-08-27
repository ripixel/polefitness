@extends('admin')

@section('title')
	Edit Location | Uos Pole Fitness Society Admin
@endsection

@section('content')
	<h1>Location Manager</h1>
	<h2>Edit Location</h2>
	
	{!! Form::model($location, ['method' => 'PATCH', 'url' => action('LocationController@update', $location->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('locations.form', ['submit_text' => 'Update Location'])
	
	{!! Form::close() !!}
	
@endsection