<a href="{{ action('AdminController@transactions') }}" class="button">Show All</a>
<a href="{{ action('AdminController@transactionsSuccessful') }}" class="button button-green">Show Successful</a>
<a href="{{ action('AdminController@transactionsAwaiting') }}" class="button">Show Awaiting</a>
<a href="{{ action('AdminController@transactionsResolved') }}" class="button button-yellow">Show Resolved</a>
<a href="{{ action('AdminController@transactionsFailed') }}" class="button button-red">Show Failed</a>
<a href="{{ action('AdminController@transactionsStrike') }}" class="button button-red">Show Strike</a>