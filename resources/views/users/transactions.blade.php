@extends('app')

@section('title')
	Your Transactions | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Your Transactions</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet center pure-u-1">							
							<h2>Transaction History</h2>
							<table class="public-table pure-table pure-table-striped pure-table-horizontal">
								<thead>
									<tr>
										<th>Date</th>
										<th>Title</th>
										<th>Description</th>
										<th>Amount</th>
										<th>Method</th>
										<th>Payment Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($user->transactions as $transaction)
											<tr>
												<td>{{ $transaction->created_at }}</td>
												<td>{{ $transaction->name }}</td>
												<td>{{ $transaction->description }}</td>
												<td>{{ sprintf('£%01.2f', $transaction->amount) }}</td>
												<td>{{ $transaction->payment_method->name }}</td>
												<td class="{{ $transaction->goodBadStatus() }}">{{ $transaction->status() }}</td>
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