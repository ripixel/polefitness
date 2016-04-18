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
					<h1 style="font-size: 3.5em">Purchasing Passes</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet center pure-u-1">
							<h2>Purchase Details</h2>
							<p>Here are the details for what you are about to purchase:</p>
							<p><strong>Type:</strong> {{ $membership->name }}</p>
							<p><strong>Price:</strong> {{ sprintf('£%01.2f', $membership->cost ) }}</p>
							<p><strong>Class Entries Included:</strong> {{ $membership->free_classes }}</p>
							<p>How would you like to pay?</p>
							{!! Form::open(['method' => 'POST', 'url' => action('UserController@purchaseMembershipComplete'), 'class' => 'pure-form', 'style' => 'padding: 0;']) !!}

							{!! Form::select('payment_method_id', $payment_methods, null, ['id' => 'id', 'class' => 'select2 pure-input-1']) !!}
							{!! Form::hidden('membership_id', $membership->id) !!}

							{!! Form::submit('Purchase Passes', ['class' => 'button button-on-white pure-input-1', 'style' => 'margin-top: 10px;']) !!}

							{!! Form::close() !!}
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection

@section('javascript')
	<script src="{{ URL::asset('js/select2.min.js') }}"></script>
	<script type="text/javascript">
		$(function() {
			$(".select2").select2();
		});
	</script>
@endsection

@section('head')
	<link rel="stylesheet" href="{{ URL::asset('css/select2.css') }}" />
@endsection