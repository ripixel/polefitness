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
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($transactions as $transaction)
				<tr>
					<td>{{ $transaction->created_at }}</td>
					<td>{{ $transaction->user->fullname() }}</td>
					<td class="{{ $transaction->goodBadStatus() }}">{{ sprintf('£%01.2f', $transaction->amount) }}</td>
					<td>{{ $transaction->name }}</td>
					<td>{{ $transaction->description }}</td>
					<td>{{ $transaction->payment_method->name }}</td>
					<td class="{{ $transaction->goodBadStatus() }}">{{ $transaction->status() }}</td>
					<td>
						@include('transactions.payment_actions')
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection