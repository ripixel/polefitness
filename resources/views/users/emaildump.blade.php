@extends('admin')

@section('title')
	Confirmed Emails | UoS PFS Admin
@endsection

@section('content')
	<h1>User Manager</h1>
	<h2>Showing Confirmed Emails</h2>
	
	@include('users.actions')
	
	<div style="margin-top: 8px;"></div>
	@foreach($emails as $email)
		{{ $email }}<br/>
	@endforeach
@endsection