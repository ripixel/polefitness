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
					<h3>{{ $class->date }}</h3>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-image pure-u-1-4" style="background: url('{{ $class->picture_link}}') no-repeat center center; background-size: cover;">
							<div class="news-overlay">
								@if($class->attendees->count() < $class->places_available)
									@if($class->attendees->contains($user) == FALSE)
										<a class="button" href="{{ action('ClassesController@book', $class->id) }}">Book Now</a>
									@else
										<a class="button button-disabled">You are already attending</a>
									@endif	
								@else
									<a class="button button-disabled">No More Spaces</a>
								@endif
							</div>
						</div>
						<div class="news-snippet pure-u-3-4">
							<h2>Description</h2>
							{!! $class->description !!}
							<h2>Attendees {{ $class->attendees->count() }}/{{ $class->places_available }}</h2>
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