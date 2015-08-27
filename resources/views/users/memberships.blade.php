@extends('app')

@section('title')
	Your Memberships | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Your Memberships</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet center pure-u-1">
							<h2>Current Memberships</h2>
							<p>You currently have <strong>{{ $user->free_spaces_remaining() }}</strong> free spaces from memberships.</p>
							<p>You can purchase more membership spaces below:</p>
							@foreach($memberships as $membership)
								<a href="{{ action('UserController@purchaseMembership', $membership->id) }}" style="margin-bottom: 5px; min-width: 100%;" class="button button-on-white">{{ $membership->name }} - {{ sprintf('£%01.2f', $membership->cost) }} - {{ $membership->free_classes }} free classes</a><br/>
							@endforeach
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection