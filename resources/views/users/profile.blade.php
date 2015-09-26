@extends('app')

@section('title')
	Your Profile | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Your Profile</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-image pure-u-1-4" style="background: url('{{ $user->picture_link }}') no-repeat center center; background-size: cover;">
								<div class="news-overlay"><a class="button" href="{{ action('HomeController@doLogout') }}">Logout</a></div>
						</div>
						<div class="news-snippet pure-u-3-4">
							<h2>Your Info</h2>
							<p><strong>Name:</strong> {{ $user->fullname }}</p>
							<p><strong>Email:</strong> {{ $user->email }}</p>
							<p><strong>Status:</strong> {{ $user->status() }}</p>
							<a class="button button-on-white" href="{{ action('UserController@edit') }}">Edit Information</a>
							@if($user->admin)
								<a class="button button-on-white" href="{{ action('AdminController@index') }}">Go to Admin Site</a>
							@endif
						</div>
					</div>
				</div>
				
				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990;">
					<div class="committee-member-desc">
						<h3>Memberships</h3>
						<p>See your current memberships, and buy more.</p>
						<p><a class="button" href="{{ action('UserController@memberships') }}">View Memberships</a></p>
					</div>
				</div>
				
				<div class="pure-u-1-8 spacer"></div>
				
				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990;">
					<div class="committee-member-desc">
						<h3>Classes</h3>
						<p>The classes you're booked on, past and future.</p>
						<p><a class="button" href="{{ action('UserController@classes') }}">View Classes</a></p>
					</div>
				</div>
				
				<div class="pure-u-1-8 spacer"></div>
				
				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990;">
					<div class="committee-member-desc">
						<h3>Transactions</h3>
						<p>View a summary of the transactions you've made using the site.</p>
						<p><a class="button" href="{{ action('UserController@transactions') }}">View Transactions</a></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection