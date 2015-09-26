@extends('app')

@section('title')
	Register | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Register</h1>
					<h3><a href="{{ action('HomeController@showLogin') }}" class="button">Already Registered?</a></h3>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet pure-u-1">
							<h2>Register</h2>
							{!! Form::open(['method' => 'POST', 'url' => action('HomeController@doRegister'), 'class' => 'pure-form', 'style' => 'padding: 0;']) !!}
							
							<div class="pure-u-1">
								<div class="pure-g">
									<div class="pure-u-1-2" style="box-sizing: border-box; padding-right: 10px;">
										{!! Form::label('first_name','First Name') !!}
										{!! Form::text('first_name', null, ['class' => 'pure-input-1']) !!}
									</div>
									<div class="pure-u-1-2">
										{!! Form::label('last_name','Last Name') !!}
										{!! Form::text('last_name', null, ['class' => 'pure-input-1']) !!}
									</div>
								</div>
							</div>
							
							<p>
								{!! Form::label('email', 'Email') !!}
								{!! Form::text('email', null, ['class' => 'pure-input-1']) !!}
							</p>
							
							<p>
								{!! Form::label('picture_link','Picture URL') !!}
								{!! Form::text('picture_link', null, ['class' => 'pure-input-1']) !!}
							</p>
							
							<p>
								{!! Form::label('password', 'Password') !!}
								{!! Form::password('password', ['class' => 'pure-input-1']) !!}
							</p>
							
							<p>{!! Form::submit('Register') !!}</p>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection