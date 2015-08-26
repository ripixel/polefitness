@extends('admin')

@section('content')
	<h1>Class Manager</h1>
	<h2>Attendees for {{ $class->title }}</h2>
	<a href="{{ action('ClassesController@edit', $class->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit Class</a>
	
	<table class="pure-table pure-table-striped admin-table pure-table-horizontal">
		<thead>
			<tr>
				<th style="width: 1px;"></th>
				<th>Name</th>
				<th>Status</th>
				<th>Signed Up</th>
				<th>Payment</th>
				<th>Payment Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($class->all_attendees as $attendee)
				<tr>
					<td>
						@if($attendee->pivot->rejected)
							<a href="{{ action('ClassesController@acceptAttendee', [$class->id, $attendee->id]) }}" class="button button-green"><i class="fa fa-check"></i></a></td>
						@else
							<a href="{{ action('ClassesController@rejectAttendee', [$class->id, $attendee->id]) }}" class="button button-red confirmAction" data-confirmmessage="Are you sure you want to reject this user from the class?"><i class="fa fa-ban"></i></a></td>
						@endif
					<td>{{ $attendee->fullname() }}</td>
					@if($attendee->pivot->rejected)
						<td class="bad">Rejected</td>
					@else
						<td class="good">Accepted</td>
					@endif
					<td>{{ $attendee->pivot->created_at }}</td>
					@if($attendee->pivot->used_free_space)
						<td class="good">Used Membership Space</td>
						<td></td>
					@else
						@php $transaction = \App\Transaction::findOrFail($attendee->pivot->transaction_id)
						<td class="{{ $transaction->goodBadStatus() }}"> {{ $transaction->payment_method->name }} - {{ $transaction->status() }} - {{ sprintf('£%01.2f', $transaction->amount) }}</td>
						<td>
							@include('transactions.payment_actions')
						</td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
	
	
@endsection