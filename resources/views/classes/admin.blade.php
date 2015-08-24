@extends('admin')

@section('title')
	Class Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>Class Manager</h1>
	<h2>{{ $subtitle }}</h2>
	<a href="{{ action('ClassesController@create') }}" class="button button-green button-with-icon"><i class="fa fa-plus"></i> Add New Class</a> 
	<a href="{{ action('AdminController@classes') }}" class="button button-with-icon">Show All</a> 
	<a href="{{ action('AdminController@classesUpc') }}" class="button button-with-icon">Show Upcoming Only</a> 
	<a href="{{ action('AdminController@classesMine') }}" class="button button-with-icon">Show Mine</a>
	<table class="pure-table pure-table-striped admin-table pure-table-horizontal">
		<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th>Owner</th>
				<th>Location</th>
				<th>Date</th>
				<th>Posted</th>
				<th>Last Updated</th>
			</tr>
		</thead>
		<tbody>
			@foreach($classes as $class)
				<tr>
					<td>
						<a href="{{ action('ClassesController@copy', $class->id) }}" class="button button-with-icon button-green"><i class="fa fa-plus"></i> Clone</a> 
						<a href="{{ action('ClassesController@edit', $class->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit</a> 
					<a href="{{ action('ClassesController@editAttendees', $class->id) }}" class="button button-with-icon"><i class="fa fa-users"></i> Attendees</a></td>
					<td>{{ $class->title }}</td>
					<td>{{ $class->owner->fullname() }}</td>
					<td>{{ $class->location->name }}</td>
					<td>{{ $class->date }}</td>
					<td>{{ $class->created_at }}</td>
					<td>{{ $class->updated_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection