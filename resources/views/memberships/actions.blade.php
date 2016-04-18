<a href="{{ action('MembershipsController@create') }}" class="button button-green button-with-icon"><i class="fa fa-plus"></i> Add Membership</a>
<a href="{{ action('AdminController@memberships') }}" class="button">Show All</a>
<a href="{{ action('AdminController@membershipsActive') }}" class="button button-green">Show Active</a>
<a href="{{ action('AdminController@membershipsRetired') }}" class="button button-red">Show Retired</a>