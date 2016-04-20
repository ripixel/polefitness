@extends('admin')

@section('title')
	Email Template Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>Email Template Manager</h1>
	<h2>{{ $subtitle }}</h2>

	@include('emails.actions')

	<table class="admin-table pure-table pure-table-striped pure-table-horizontal">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Subject</th>
				<th>Sent To</th>
			</tr>
		</thead>
		<tbody>
			@foreach($emails as $email)
				<tr>
					<td><a href="{{ action('EmailsController@edit', $email->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit</a></td>
					<td>{{ $email->name }}</td>
					<td>{{ $email->subject }}</td>
					<td>{{ $email->sent_to }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection