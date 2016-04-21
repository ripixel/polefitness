@extends('app')

@section('title')
	Your Classes | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Your Clasess</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet center pure-u-1">
							<h2>Classes</h2>
							<table class="public-table pure-table pure-table-striped pure-table-horizontal">
								<thead>
									<tr>
										<th>Title</th>
										<th>Date</th>
										<th>Status</th>
										<th>Payment Status</th>
										<th>Location</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user->classes_attending as $class)
									<tr>
										<td>{{ $class->title }}</td>
										<td>{{ $class->date }} - {{ $class->end_date->format('g:ia') }}</td>
										@if($class->pivot->rejected)
											<td class="bad">Rejected</td>
										@else
											<td class="good">Accepted</td>
										@endif
										@if($class->pivot->used_free_space)
											@if($class->pivot->guest)
												<td class="good">Used Guest Pass ({{ $class->pivot->guest_name }})</td>
											@else
												<td class="good">Used Class Pass</td>
											@endif
										@else
											@php $transaction = \App\Transaction::findOrFail($class->pivot->transaction_id)
											<td class="{{ $transaction->goodBadStatus() }}"> {{ $transaction->payment_method->name }} - {{ $transaction->status() }} - {{ sprintf('£%01.2f', $transaction->amount) }}</td>
										@endif
										<td>{{ $class->location->name }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection