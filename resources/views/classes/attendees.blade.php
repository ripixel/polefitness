@extends('admin')

@section('title')
	Attendees for {{ $class->title }} | Uos Pole Fitness Society Admin
@endsection

@section('content')
	<h1>Class Manager</h1>
	<h2>Attendees for {{ $class->title }}</h2>
	<a href="{{ action('ClassesController@edit', $class->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit Class</a>

	<table class="pure-table pure-table-striped admin-table pure-table-horizontal">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Status</th>
				<th>Strikes</th>
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
							<a href="{{ action('ClassesController@acceptAttendee', [$class->id, $attendee->id]) }}" class="button button-green button-with-icon"><i class="fa fa-check"></i> Accept</a>
						@else
							<a href="{{ action('ClassesController@rejectAttendee', [$class->id, $attendee->id]) }}" class="button button-red button-with-icon confirmAction" data-confirmmessage="Are you sure you want to reject this user from the class?"><i class="fa fa-ban"></i> Reject</a>
						@endif
						<a href="{{ action('ClassesController@removeFromClassAdmin', [$class->id, $attendee->id]) }}" class="button button-red button-with-icon confirmAction" data-confirmmessage="Are you sure you want to remove this user from the class?"><i class="fa fa-times"></i> Remove</a>
					</td>
					<td><a href="{{ action('UserController@adminEdit', $attendee->id) }}" class="button">{{ $attendee->fullname() }}</a></td>
					@if($attendee->pivot->rejected)
						<td class="bad">Rejected</td>
					@else
						<td class="good">Accepted</td>
					@endif
					@php $strikes = $attendee->transactionsStrike()
					@if($strikes > 0)
						<td class="bad"><i class="fa fa-exclamation-triangle"></i> {{ $strikes }}</td>
					@else
						<td class="good">None</td>
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