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
						<div class="news-image pure-u-1-4" style="background: url('{{ $class->picture_link}}') no-repeat center center; background-size: cover;">
						</div>
						<div class="news-snippet pure-u-3-4">
							<h2>Booking information</h2>
							@if($class->attendees->contains($user) == FALSE)
								<p>There are currently {{ $class->places_available - $class->attendees->count() }} spaces available for this class.</p>
								@if($user->free_spaces_remaining() > 0)
									<p>You currently have <strong>{{ $user->free_spaces_remaining() }}</strong> free spaces from memberships remaining.</p>
									<a href="#" class="button button-on-white">Use a free space to book onto this class</a>
								@else 
									<p>You do not currently have any free spaces available for use.</p>
									<a href="{{ action('UserController@memberships') }}" class="button button-on-white">Sign up for a new membership</a>
								@endif
								
								@if($class->payment_methods_allowed->count() > 0)
									<p>Additionally, the following payment methods are accepted to book onto this class:</p>
									@foreach($class->payment_methods_allowed as $payment_method)
										<a href="#" class="button button-on-white">Pay by {{ $payment_method->name }}</a> 
									@endforeach
								@else
									<p>The only way to be able to book onto this class is by having a membership.</p>
								@endif
							@else
								<h2>You are already booked onto this class - see you there!</h2>
							@endif
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection