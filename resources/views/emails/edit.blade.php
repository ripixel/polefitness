@extends('admin')

@section('title')
	Edit Email Template | Uos Pole Fitness Society Admin
@endsection

@section('content')
	<h1>Email Template Manager</h1>
	<h2>Edit Email Template</h2>

	{!! Form::model($email, ['method' => 'PATCH', 'url' => action('EmailsController@update', $email->id), 'class' => 'pure-form pure-form-stacked'] ) !!}

		@include('emails.form', ['submit_text' => 'Update Email Template'])

	{!! Form::close() !!}


@endsection