@extends('admin')

@section('title')
	Home | UoS PFS Admin
@endsection

@section('content')
	<h1>Admin Home</h1>
	<h2>News</h2>
	@include('news.actions')
	
	<h2>Classes</h2>
	@include('classes.actions')
	
	<h2>Users</h2>
	<p>TODO</p>
	
	<h2>Transactions</h2>
	@include('transactions.actions')
	
	<h2>Memberships</h2>
	@include('memberships.actions')
	
	<h2>Locations</h2>
	@include('locations.actions') <a href="{{ action('AdminController@locations')}}" class="button">Show All</a>
@endsection