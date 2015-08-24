@extends('app')

@section('title')
	Classes | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Classes</h1>
					<h3>These are all the awesome classes we have coming up, check them out...</h3>	
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-image pure-u-1-4" style="background: url('{{ $next_class->picture_link}}') no-repeat center center; background-size: cover;">
							<div class="news-overlay"><a class="button" href="{{ action('ClassesController@show', $next_class->id) }}">See Info</a></div>
						</div>
						<div class="news-snippet pure-u-3-4">
							<h3>Next Class</h3>
							<h2>{{ $next_class->title }}</h2>
							{!! $next_class->description !!}
							<p><strong>Where:</strong> {{ $next_class->location->name }}</p>
							<p><strong>When:</strong> {{ $next_class->date }}</p>
							<p><strong>Places Taken:</strong> {{ $next_class->attendees->count() }}/{{ $next_class->places_available }}</p>
						</div>
					</div>
				</div>
				
				@foreach($classes as $index => $classe)
				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('{{ $classe->picture_link }}') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>{{ $classe->title }}</h3>
						<p>{{ $classe->date }}<br />{{ $classe->attendees->count() }}/{{ $classe->places_available }} places taken</p>
						<p><a class="button" href="{{ action('ClassesController@show', $classe->id) }}">See Info</a></p>
					</div>
				</div>

				@if(($index+1) % 3 != 0)
					<div class="pure-u-1-8 spacer"></div>
				@endif
				
				@endforeach
				
			</div>
		</div>
	</div>
@endsection