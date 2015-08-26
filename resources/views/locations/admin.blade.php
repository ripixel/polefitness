@extends('admin')

@section('title')
	Location Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>Location Manager</h1>
	<h2>Showing All Locations</h2>
	
	@include('locations.actions')
	
	<table class="admin-table pure-table pure-table-striped pure-table-horizontal">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			@foreach($locations as $location)
				<tr>
					<td><a href="{{ action('LocationController@edit', $location->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit</a></td>
					<td>{{ $location->name }}</td>
					<td>{{ $location->address }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection