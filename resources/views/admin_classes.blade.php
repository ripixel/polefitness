@extends('admin')

@section('title')
	Class Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>Class Manager</h1>
	<table class="pure-table pure-table-striped admin-table">
		<thead>
			<tr>
				<th></td>
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
					<td><a href="{{ action('ClassesController@edit') }}" class="button"><i class="fa fa-pencil"></i></a></td>
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