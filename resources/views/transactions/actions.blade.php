<a href="{{ action('AdminController@transactions') }}" class="button">Show All</a> 
<a href="{{ action('AdminController@transactionsSuccessful') }}" class="button button-green">Show Successful</a> 
<a href="{{ action('AdminController@transactionsAwaiting') }}" class="button">Show Awaiting</a> 
<a href="{{ action('AdminController@transactionsFailed') }}" class="button button-red">Show Failed</a> 
<a href="{{ action('AdminController@transactionsRejected') }}" class="button button-red">Show Rejected</a>