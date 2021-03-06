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

				@if($class->date < Carbon\Carbon::now()->addWeek())
					<div class="pure-u-1 news-item">
						<div class="pure-g">
							<div class="news-image pure-u-1 pure-u-md-1-4" style="background: url('{{ $class->picture_link}}') no-repeat center center; background-size: cover;">
							</div>
							<div class="news-snippet pure-u-1 pure-u-md-3-4">
								<h2>Booking information</h2>
								@php $booking_methods = False;
								@if($class->attendees->contains($user) == FALSE)
									@if($class->memberships_allowed->count() > 0)
										@php $booking_methods = True;
										<p>There are currently {{ $class->places_available - $class->attendees->count() }} spaces available for this class.</p>
										<p>If you wish to bring along a guest, you may arrange this after you have placed your booking.</p>
										<h3>Pay by Pass</h3>
										<p>The following pass types are accepted to book onto this class:</p>
										@php $has_membership = False;
										@foreach($class->memberships_allowed as $membership)
											@php $spaces_left = $user->membership_spaces_left($membership->id)
											@if($spaces_left > 0)
												<a href="{{ action('ClassesController@bookClassMembership', [$class->id, $membership->id]) }}" class="button button-on-white button-pad-vertical"><strong>{{ $membership->name }}</strong> - Book using one of your {{ $spaces_left }} remaining passes of this type</a><br />
											@else
												<a class="button button-on-white button-disabled button-pad-vertical"><strong>{{ $membership->name }}</strong> - You do not own any of this pass type</a><br />
											@endif
										@endforeach

										@if(!$has_membership)
											<p>Alternatively, you can sign up for more class passes by clicking below:</p>
											<a href="{{ action('UserController@memberships') }}" class="button button-on-white">Buy more passes</a>
										@endif
									@endif

									@if($class->payment_methods_allowed->count() > 0)
										<h3>Pay by other method</h3>
										<p>The cost for booking onto this class for you as a <strong>{{ $user->status() }}</strong> is <strong>
											@if($user->member || $user->admin)
												{{ sprintf('£%01.2f', $class->cost_member) }}
											@else
												{{ sprintf('£%01.2f', $class->cost) }}
											@endif
										</strong></p>
										<p>The following payment methods are accepted to book onto this class:</p>
										@foreach($class->payment_methods_allowed as $payment_method)
											<a href="{{ action('ClassesController@bookClassPayment', [$class->id, $payment_method->id]) }}" class="button button-on-white button-pad-vertical">Pay by <strong>{{ $payment_method->name }}</strong></a>
										@endforeach
									@else
										@if($booking_methods)
											<p>The only way to be able to book onto this class is by having an eligible class pass.</p>
										@else
											<h2>Oops!</h2>
											<p>It looks like this class has no way to pay for it! Please contact the University of Sheffield Pole Fitness Society committee and let them know.</p>
										@endif
									@endif
								@else
									<h2>You are already booked onto this class - see you there!</h2>
								@endif
							</div>
						</div>
					</div>
				@else
					<div class="pure-u-1 news-item">
						<h3>It's too early to book onto this class - check back in {{ $class->date->diffInDays(Carbon\Carbon::now()->addWeek()) }} days</h3>
					</div>
				@endif

			</div>
		</div>
	</div>
@endsection