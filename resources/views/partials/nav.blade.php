<div class="navbar center">
    <div class="container">
        <a href="{{ action('HomeController@index') }}">Home</a>
        <a href="{{ action('NewsController@index') }}">News</a>
        <a href="{{ action('HomeController@index') }}" class="home-a">&nbsp;</a>
        <a href="{{ action('ClassesController@index') }}">Classes</a>
		@if(Auth::check())
			<a href="{{ action('UserController@profile') }}">My Profile</a>
		@else
        	<a href="{{ action('HomeController@showLogin') }}">Login / Register</a>
		@endif
    </div>
</div>