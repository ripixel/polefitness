@extends('admin')

@section('title')
	Class Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>Class Manager</h1>
	<h2>{{ $subtitle }}</h2>
	
	@include('classes.actions')
	
	<table class="pure-table pure-table-striped admin-table pure-table-horizontal">
		<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th>Creator</th>
				<th>Supervisor</th>
				<th>Location</th>
				<th>Date</th>
				<th>Payments</th>
			</tr>
		</thead>
		<tbody>
			@foreach($classes as $class)
				<tr>
					<td>
						<a href="{{ action('ClassesController@copy', $class->id) }}" class="button button-with-icon button-green"><i class="fa fa-plus"></i> Clone</a> 
						<a href="{{ action('ClassesController@edit', $class->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit</a> 
						<a href="{{ action('ClassesController@editAttendees', $class->id) }}" class="button button-with-icon"><i class="fa fa-users"></i> Attendees {{ $class->attendees->count() }}/{{ $class->places_available }}</a>
					</td>
					<td>{{ $class->title }}</td>
					<td>{{ $class->creator->fullname() }}</td>
					<td>{{ $class->supervisor->fullname() }}</td>
					<td>{{ $class->location->name }}</td>
					<td>{{ $class->date }} - {{ $class->end_date->format('g:ia') }}</td>
					<td class="{{ $class->goodBadPaymentStatus() }}">{{ $class->paymentStatus() }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection