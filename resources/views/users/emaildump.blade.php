@extends('admin')

@section('title')
	User Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>User Manager</h1>
	<h2>Showing Confirmed Emails</h2>
	
	@include('users.actions')
	@foreach($emails as $email)
		{{ $email }}<br/>
	@endforeach
@endsection