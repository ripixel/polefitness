@extends('admin')

@section('title')
	Edit User | Uos Pole Fitness Society Admin
@endsection

@section('content')
	<h1>User Manager</h1>
	<h2>Edit User</h2>
	
	<a href="{{ action('UserController@adminClasses', $user->id) }}" class="button button-with-icon"><i class="fa fa-calendar"></i> Classes</a> 
	@include('users.transaction_button')
	
	<div class="pure-g">
		{!! Form::model($user, ['method' => 'PATCH', 'url' => action('UserController@update', $user->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
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
			
			<div class="pure-u-1">
				{!! Form::label('email','Email') !!}
				{!! Form::text('email', null, ['class' => 'pure-input-1']) !!}
			</div>
			
			<div class="pure-u-1">
				{!! Form::label('picture_link','Picture URL') !!}
				{!! Form::text('picture_link', null, ['class' => 'pure-input-1']) !!}
			</div>
			
			<div class="pure-u-1">
				<div class="pure-g">
					<div class="pure-u-1-3" style="box-sizing: border-box; padding-right: 10px;">
						{!! Form::label('email_confirmed','Active') !!}
						{!! Form::checkbox('email_confirmed') !!}
					</div>
					<div class="pure-u-1-3">
						{!! Form::label('member','Society Member') !!}
						{!! Form::checkbox('member') !!}
					</div>
					<div class="pure-u-1-3">
						{!! Form::label('admin','Admin') !!}
						{!! Form::checkbox('admin') !!}
					</div>
					<div class="pure-u-1">
						{!! Form::submit('Save User', ['class' => 'button button-green']) !!}
					</div>
				</div>
			</div>
		{!! Form::close() !!}
		
		<div class="pure-u-1-2">
			{!! Form::open(['method' => 'POST', 'url' => action('UserController@grantMembership'), 'class' => 'pure-form', 'style' => 'padding: 0;']) !!}
			<div class="pure-g">
				<div class="pure-u-1">
					<h2>Grant Memberships</h2>	
				</div>
				<div class="pure-u-1-2" style="box-sizing: border-box; padding-right: 10px;">
					{!! Form::label('membership_id','Membership') !!}
					{!! Form::select('membership_id', $memberships, null, ['id' => 'membership_id', 'class' => 'select2 pure-input-1']) !!}
				</div>
				<div class="pure-u-1-3">
					{!! Form::label('spaces_to_change','Spaces to Grant') !!}
					{!! Form::text('spaces_to_change', null, ['class' => 'pure-input-1 spinner']) !!}
				</div>
				<div class="pure-u-1">
					{!! Form::hidden('user_id', $user->id) !!}
					{!! Form::submit('Grant Memberships', ['class' => 'button button-green']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	
		<div class="pure-u-1-2">
			{!! Form::open(['method' => 'POST', 'url' => action('UserController@removeMembership'), 'class' => 'pure-form', 'style' => 'padding: 0;']) !!}
			<div class="pure-g">
				<div class="pure-u-1">
					<h2>Remove Memberships</h2>	
				</div>
				<div class="pure-u-1-2" style="box-sizing: border-box; padding-right: 10px;">
					{!! Form::label('membership_id','Membership') !!}
					{!! Form::select('membership_id', $memberships, null, ['id' => 'membership_id', 'class' => 'select2 pure-input-1']) !!}
				</div>
				<div class="pure-u-1-3">
					{!! Form::label('spaces_to_change','Spaces to Remove') !!}
					{!! Form::text('spaces_to_change', null, ['class' => 'pure-input-1 spinner']) !!}
				</div>
				<div class="pure-u-1">
					{!! Form::hidden('user_id', $user->id) !!}
					{!! Form::submit('Remove Memberships', ['class' => 'button button-red']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	
	
@endsection