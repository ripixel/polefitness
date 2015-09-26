@extends('admin')

@section('title')
	Transactions Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>Transactions Manager</h1>
	<h2>{{ $subtitle }}</h2>
	
	@include('transactions.actions')
	
	<table class="admin-table pure-table pure-table-striped pure-table-horizontal">
		<thead>
			<tr>
				<th>Date</th>
				<th>User</th>
				<th>Amount</th>
				<th>Title</th>
				<th>Description</th>
				<th>Method</th>
				<th>Status Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($transactions as $transaction)
				<tr>
					<td>{{ $transaction->created_at }}</td>
					<td><a href="{{ action('UserController@adminTransactions', $transaction->user_id) }}" class="button">{{ $transaction->user->fullname() }}</a></td>
					<td class="{{ $transaction->goodBadStatus() }}">{{ sprintf('£%01.2f', $transaction->amount) }}</td>
					<td>{{ $transaction->name }}</td>
					<td>
						@if($transaction->hasClass())
							<a href="{{ action('ClassesController@editAttendees', $transaction->classId()) }}" class="button button-with-icon">{{ $transaction->description }}</a>
						@else
							{{ $transaction->description }}
						@endif
					</td>
					<td>{{ $transaction->payment_method->name }}</td>
					<td>
						@include('transactions.payment_actions') 
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection