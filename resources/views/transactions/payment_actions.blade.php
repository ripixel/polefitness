@if($transaction->status() == 'Paid')
	<a class="button button-green button-with-icon confirmAction button-green-selected"><i class="fa fa-check"></i> Successful</a>
@else
	<a href="{{ action('TransactionsController@markSuccessful', $transaction->id) }}" class="button button-green button-with-icon confirmAction" data-confirmmessage="Are you sure you want to mark this payment as successful?"><i class="fa fa-check"></i> Successful</a>
@endif

@if($transaction->status() == 'Awaiting Payment')
	<a class="button button-with-icon button-selected"><i class="fa fa-clock-o"></i> Awaiting</a>
@else
	<a href="{{ action('TransactionsController@markAwaiting', $transaction->id) }}" class="button button-with-icon"><i class="fa fa-clock-o"></i> Awaiting</a>
@endif

@if($transaction->status() == 'Resolved')
	<a class="button button-with-icon button-yellow confirmAction button-yellow-selected"><i class="fa fa-check"></i> Resolved</a>
@else
	<a href="{{ action('TransactionsController@markResolved', $transaction->id) }}" class="button button-with-icon button-yellow confirmAction" data-confirmmessage="Are you sure you want to mark this payment as resolved?"><i class="fa fa-check"></i> Resolved</a>
@endif

@if($transaction->status() == 'Failed')
	<a class="button button-with-icon button-red confirmAction button-red-selected"><i class="fa fa-times"></i> Failed</a>
@else
	<a href="{{ action('TransactionsController@markFailed', $transaction->id) }}" class="button button-with-icon button-red confirmAction" data-confirmmessage="Are you sure you want to mark this payment as failed?"><i class="fa fa-times"></i> Failed</a>
@endif

@if($transaction->status() == 'Strike')
	<a class="button button-with-icon button-red confirmAction button-red-selected"><i class="fa fa-exclamation-triangle"></i> Strike</a>
@else
	<a href="{{ action('TransactionsController@markStrike', $transaction->id) }}" class="button button-with-icon button-red confirmAction" data-confirmmessage="Are you sure you want to mark this payment as strike?"><i class="fa fa-exclamation-triangle"></i> Strike</a>
@endif