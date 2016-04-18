@extends('app')

@section('title')
	Your Passes | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Purchase Complete</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet center pure-u-1">
							<h2>Purchase Details</h2>
							<p>Your purchase has been complete, and is now awaiting payment.</p>
							<p><strong>Transaction ID:</strong> {{ $transaction->id }}</p>
							<p><strong>Transaction Date:</strong> {{ $transaction->created_at }}</p>
							<p><strong>Passes Purchased:</strong> {{ $membership->name }}</p>
							<p><strong>Payment Method:</strong> {{ $transaction->payment_method->name }}</p>
							<p><strong>Total Amount:</strong> {{ sprintf('£%01.2f', $transaction->amount ) }}</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection