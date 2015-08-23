<nav>
	<ul>
		<li><a href="{{ action('AdminController@index') }}">Admin Home</a></li>
		<li><a href="{{ action('AdminController@news') }}">News Manager</a></li>
		<li><a href="{{ action('AdminController@classes') }}">Class Manager</a></li>
		<li><a href="{{ action('AdminController@users') }}">User Manager</a></li>
		<li><a href="{{ action('AdminController@transactions') }}">Transaction Manager</a></li>
		<li><a href="{{ action('AdminController@memberships') }}">Membership Manager</a></li>
		<li><a href="{{ action('AdminController@locations') }}">Location Manager</a></li>
	</ul>
</nav>