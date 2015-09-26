@extends('app')

@section('title')
	{{ $class->title }} on {{ $class->date }} | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">{{ $class->title }}</h1>
					<h2>{{ $class->date }}</h2>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-image pure-u-1-4" style="background: url('{{ $class->picture_link}}') no-repeat center center; background-size: cover;">
							<div class="news-overlay">
								@if($class->attendees->count() < $class->places_available)
									@if($class->attendees->contains($user) == FALSE)
										@if($class->date < Carbon\Carbon::now()->addWeek())
											<a class="button" href="{{ action('ClassesController@book', $class->id) }}">Book Now</a>
										@else
											<a class="button button-disabled">Too early to book</a>	
										@endif
									@else
										<a class="button button-disabled">You are already attending</a>
									@endif	
								@else
									<a class="button button-disabled">No More Spaces</a>
								@endif
							</div>
						</div>
						<div class="news-snippet pure-u-3-4">
							
							@if($class->date > Carbon\Carbon::now()->addWeek())
								<h2>It's too early to book onto this class - check back in {{ $class->date->diffInDays(Carbon\Carbon::now()->addWeek()) }} days</h2>
							@else
								<h2>Class Details</h2>
							@endif
							<strong>Description:</strong><br />
							{!! $class->description !!}
							<div class="pure-u-1">
								<div class="pure-g">
									<div class="pure-u-1-2">
										<p><strong>Cost for Members:</strong> {{ sprintf('£%01.2f', $class->cost_member) }}</p>
									</div>
									<div class="pure-u-1-2">
										<p><strong>Cost for Non-Members:</strong> {{ sprintf('£%01.2f', $class->cost) }}</p>
									</div>
								</div>
							</div>
							<strong>Attendees {{ $class->attendees->count() }}/{{ $class->places_available }}:</strong><br/>
							<div class="pure-g">
							@forelse($class->attendees as $attendee)
								<img class="attendee-img pure-u-1-12 square" src="{{ $attendee->picture_link }}" alt="{{ $attendee->fullname() }}'s picture'" title="{{ $attendee->fullname() }}" />
							@empty
								<p class="pure-u-1">Be the first to sign up - <strong>book now!</strong>
							@endforelse
							</div>
						</div>
					</div>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-image pure-u-1-4" style="background: url('{{ $class->location->picture_link}}') no-repeat center center; background-size: cover;">
						</div>
						<div class="news-snippet pure-u-3-4">
							<h2>Where</h2>
							{{ $class->location->address}}
							<iframe frameborder="0" style="margin-top: 20px; display: block; width: 100%; height: 250px; border:0" src="https://www.google.com/maps/embed/v1/place?q={{ urlencode($class->location->address) }}&key=AIzaSyD-aVlLaCEDnlgq2BqYc54UtJ94cOypfVU" allowfullscreen></iframe>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection