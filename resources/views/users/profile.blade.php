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
							<div class="news-overlay"><a class="button" href="{{ action('UserController@edit') }}">Edit Info</a></div>							
						</div>
						<div class="news-snippet pure-u-3-4">
							<h2>Basic information</h2>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection