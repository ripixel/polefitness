@extends('admin')

@section('title')
	Transactions for {{ $user->fullname() }} | Uos Pole Fitness Society Admin
@endsection('')

@section('content')
	<h1>User Manager</h1>
	<h2>Transactions for {{ $user->fullname() }}</h2>
	
	<a href="{{ action('UserController@adminEdit', $user->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit User</a> 
	<a href="{{ action('UserController@adminClasses', $user->id) }}" class="button button-with-icon"><i class="fa fa-calendar"></i> Classes</a>
	
	<table class="admin-table pure-table pure-table-striped pure-table-horizontal">
		<thead>
			<tr>
				<th>Date</th>
				<th>Amount</th>
				<th>Title</th>
				<th>Description</th>
				<th>Method</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user->transactions as $transaction)
				<tr>
					<td>{{ $transaction->created_at }}</td>
					<td class="{{ $transaction->goodBadStatus() }}">{{ sprintf('£%01.2f', $transaction->amount) }}</td>
					<td>{{ $transaction->name }}</td>
					<td>{{ $transaction->description }}</td>
					<td>{{ $transaction->payment_method->name }}</td>
					<td class="{{ $transaction->goodBadStatus() }}">{{ $transaction->status() }}</td>
					<td>
						@include('transactions.payment_actions') 
						@if($transaction->hasClass())
						<a href="{{ action('ClassesController@editAttendees', $transaction->classId()) }}" class="button button-with-icon"><i class="fa fa-calendar"></i> Jump to Class</a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
	
@endsection