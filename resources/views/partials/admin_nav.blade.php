<nav>
	<ul>
		<li><a href="{{ action('AdminController@index') }}">Admin Home</a></li>
		<li><a href="{{ action('AdminController@news') }}">News Items</a></li>
		<li><a href="{{ action('AdminController@classes') }}">Classes</a></li>
		<li><a href="{{ action('AdminController@users') }}">Users</a></li>
		<li><a href="{{ action('AdminController@transactions') }}">Transactions</a></li>
		<li><a href="{{ action('AdminController@memberships') }}">Memberships</a></li>
		<li><a href="{{ action('AdminController@locations') }}">Locations</a></li>
		<li><a href="{{ action('AdminController@emails') }}">Email Templates</a></li>
		<li style="margin-top: 50px"><a href="{{ action('HomeController@index') }}">Return to Public Site</a></li>
	</ul>
</nav>