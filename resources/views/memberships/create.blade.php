@extends('admin')

@section('title')
	Create Membership | Uos Pole Fitness Society Admin
@endsection

@section('content')
	<h1>Membership Manager</h1>
	<h2>Create Membership</h2>
	
	{!! Form::model($membership = new \App\Membership, ['method' => 'POST', 'url' => action('MembershipsController@store'), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('memberships.form', ['submit_text' => 'Create Membership'])
	
	{!! Form::close() !!}
@endsection