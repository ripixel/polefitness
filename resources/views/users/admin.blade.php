@extends('admin')

@section('title')
	User Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>User Manager</h1>
	<h2>{{ $subtitle }}</h2>
	
	@include('users.actions')
	
	<table class="pure-table pure-table-striped admin-table pure-table-horizontal">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Email</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>
						<a href="{{ action('UserController@adminEdit', $user->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit</a> 
						<a href="{{ action('UserController@adminClasses', $user->id) }}" class="button button-with-icon"><i class="fa fa-calendar"></i> Classes</a>
						@include('users.transaction_button')
					</td>
					<td>{{ $user->fullname() }}</td>
					<td>{{ $user->email }}</td>
					<td class="{{ $user->goodBadStatus() }}">{{ $user->status() }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection