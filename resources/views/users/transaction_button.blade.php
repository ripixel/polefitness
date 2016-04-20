@php $status = $user->transactionStatus()
@if(strpos($status, "Outstanding Transaction"))
	<a href="{{ action('UserController@adminTransactions', $user->id) }}" class="button button-with-icon button-red"><i class="fa fa-clock-o"></i> {{ $status }}</a>
@elseif(strpos($status, "Strike Transaction"))
	<a href="{{ action('UserController@adminTransactions', $user->id) }}" class="button button-with-icon button-yellow"><i class="fa fa-exclamation-triangle"></i> {{ $status }}</a>
@else
	<a href="{{ action('UserController@adminTransactions', $user->id) }}" class="button button-with-icon"><i class="fa fa-money"></i> {{ $status }}</a>
@endif