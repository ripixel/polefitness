@extends('app')

@section('title')
	Forgotten Password | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Forgotten Password</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet pure-u-1">
							<h2>Forgotten Password</h2>
							{!! Form::open(['method' => 'POST', 'url' => action('HomeController@doForgotten'), 'class' => 'pure-form', 'style' => 'padding: 0;']) !!}
							
							<p>
								{!! Form::label('email', 'Please enter the email associated with your account') !!}
								{!! Form::text('email', null, ['class' => 'pure-input-1']) !!}
							</p>
							
							<p>{!! Form::submit('Send me a password reset email') !!}</p>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection