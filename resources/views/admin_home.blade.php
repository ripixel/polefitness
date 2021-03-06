@extends('admin')

@section('title')
	Admin Area | UoS Pole Fitness Society Admin
@endsection

@section('content')
	<h2>News</h2>
	@include('news.actions')

	<h2>Classes</h2>
	@include('classes.actions')

	<h2>Users</h2>
	@include('users.actions')

	<h2>Transactions</h2>
	@include('transactions.actions')

	<h2>Memberships</h2>
	@include('memberships.actions')

	<h2>Locations</h2>
	@include('locations.actions') <a href="{{ action('AdminController@locations')}}" class="button">Show All</a>

	<h2>Email Templates</h2>
	@include('emails.actions')
@endsection