@extends('admin')

@section('content')
	<h1>Edit Location</h1>
	{!! Form::model($location, ['method' => 'PATCH', 'url' => action('LocationController@update', $location->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('locations.form', ['submit_text' => 'Update Location'])
	
	{!! Form::close() !!}
	
@endsection