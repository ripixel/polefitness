@extends('admin')

@section('title')
	Create Location | Uos Pole Fitness Society Admin
@endsection

@section('content')
	<h1>Location Manager</h1>
	<h2>Create Location</h2>
	
	{!! Form::model($location = new \App\Location, ['method' => 'POST', 'url' => action('LocationController@store'), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('locations.form', ['submit_text' => 'Create Location'])
	
	{!! Form::close() !!}
@endsection