{!! Form::open(['method' => 'POST', 'url' => action('AdminController@userSearch'), 'class' => 'pure-form', 'style' => 'padding: 0;']) !!}

	<a href="{{ action('AdminController@users') }}" class="button">Show All</a>
	<a href="{{ action('AdminController@usersAdmins') }}" class="button">Show Administrators</a>
	<a href="{{ action('AdminController@usersInstructors') }}" class="button">Show Instructors</a>
	<a href="{{ action('AdminController@usersOutstanding') }}" class="button button-red">Show Outstanding</a>
	<a href="{{ action('AdminController@usersStrike') }}" class="button button-yellow">Show Strike</a>
	<a href="{{ action('UserController@emailDump') }}" class="button" style="margin-right: 20px;">Show Confirmed Emails</a>
	{!! Form::text('first_name', null, ['placeholder' => 'First Name']) !!}
	{!! Form::text('last_name', null, ['placeholder' => 'Last Name']) !!}
	{!! Form::submit('Search for User', ['class' => 'button']) !!}


{!! Form::close() !!}