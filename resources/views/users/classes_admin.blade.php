@extends('admin')

@section('title')
	Classes for {{ $user->fullname() }} | Uos Pole Fitness Society Admin
@endsection('')

@section('content')
	<h1>User Manager</h1>
	<h2>Classes for {{ $user->fullname() }}</h2>
	
	<a href="{{ action('UserController@adminEdit', $user->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit User</a> 
	@include('users.transaction_button')
	
	<table class="admin-table pure-table pure-table-striped pure-table-horizontal">
		<thead>
			<tr>
				<th></th>
				<th>Status</th>
				<th>Title</th>
				<th>Owner</th>
				<th>Location</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user->classes_attending as $class)
				<tr>
					<td>
						<a href="{{ action('ClassesController@editAttendees', $class->id) }}" class="button button-with-icon"><i class="fa fa-calendar"></i> Jump to Class</a>
					</td>
					@if($class->pivot->rejected)
						<td class="bad">Rejected</td>
					@else
						<td class="good">Accepted</td>
					@endif
					<td>{{ $class->title }}</td>
					<td>{{ $class->owner->fullname() }}</td>
					<td>{{ $class->location->name }}</td>
					<td>{{ $class->date }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	
@endsection