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
					<h1 style="font-size: 3.5em">Edit Profile</h1>
				</div>
				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet pure-u-1">
							{!! Form::model($user, ['method' => 'PATCH', 'url' => action('UserController@updatePublic'), 'class' => 'pure-form pure-form-stacked'] ) !!}
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
								{!! Form::label('password_input','Enter a new password to change it') !!}
								{!! Form::password('password_input', ['class' => 'pure-input-1']) !!}
							</p>
							
							{!! Form::submit('Update Information', ['class' => 'button button-on-white']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection