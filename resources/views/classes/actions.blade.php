<a href="{{ action('ClassesController@create') }}" class="button button-green button-with-icon"><i class="fa fa-plus"></i> Add New Class</a>
<a href="{{ action('AdminController@classes') }}" class="button">Show All</a>
<a href="{{ action('AdminController@classesUpc') }}" class="button">Show Upcoming Only</a>
<a href="{{ action('AdminController@classesMine') }}" class="button">Show My Created</a>
<a href="{{ action('AdminController@classesMineSupervisor') }}" class="button">Show My Supervising</a>
<a href="{{ action('AdminController@classesMineInstructor') }}" class="button">Show My Instructing</a>
<a href="{{ action('AdminController@classesOutstanding') }}" class="button button-red">Show Outstanding Payments</a>