@extends('admin')

@section('content')
	<h1>Create Membership</h1>
	{!! Form::model($membership = new \App\Membership, ['method' => 'POST', 'url' => action('MembershipsController@store'), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('memberships.form', ['submit_text' => 'Create Membership'])
	
	{!! Form::close() !!}
@endsection