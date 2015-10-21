@extends('app')

@section('title')
	Login | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Login</h1>
					<h3><a href="{{ action('HomeController@showRegister') }}" class="button">Not got an account?</a></h3>
					<h3><a href="{{ action('HomeController@showForgotten') }}" class="button">Forgotten your Password?</a></h3>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet pure-u-1">
							<h2>Login</h2>
							{!! Form::open(['method' => 'POST', 'url' => action('HomeController@doLogin'), 'class' => 'pure-form', 'style' => 'padding: 0;']) !!}
							
							<p>
								{!! Form::label('email', 'Email') !!}
								{!! Form::text('email', null, ['class' => 'pure-input-1']) !!}
							</p>
							
							<p>
								{!! Form::label('password', 'Password') !!}
								{!! Form::password('password', ['class' => 'pure-input-1']) !!}
							</p>
							
							<p>{!! Form::submit('Login') !!}</p>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection