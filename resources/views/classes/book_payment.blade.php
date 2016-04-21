@extends('app')

@section('title')
	Book onto {{ $class->title }} | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Book onto {{ $class->title }}</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet center pure-u-1">
							<h2>Booking Details</h2>
							<p>Here are the details for your booking:</p>
							<p><strong>Class:</strong> {{ $class->title }} on {{ $class->date }}</p>
							<p><strong>Payment Method:</strong> {{ $payment_method->name }}</p>
							<p><strong>Cost: </strong>
								@if($payment_method->has_cost)
									@if($user->member || $user->admin)
										{{ sprintf('£%01.2f', $class->cost_member) }}
									@else
										{{ sprintf('£%01.2f', $class->cost) }}
									@endif
								@else
									Free
								@endif
							</p>
							{!! Form::open(['method' => 'POST', 'url' => action('ClassesController@bookClassPaymentComplete'), 'class' => 'pure-form', 'style' => 'padding: 0;']) !!}

							{!! Form::hidden('payment_method_id', $payment_method->id) !!}
							{!! Form::hidden('classe_id', $class->id) !!}

							@include('classes.guest')

							{!! Form::submit('Book Onto Class', ['class' => 'button button-on-white pure-input-1', 'style' => 'margin-top: 10px;']) !!}

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