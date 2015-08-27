@php $awaiting = $user->transactions()->awaiting()->count()
@if($awaiting > 0)
	<a href="{{ action('UserController@adminTransactions', $user->id) }}" class="button button-with-icon button-red"><i class="fa fa-money"></i>{{ $awaiting }} Transactions Outstanding</a>
@else
	<a href="{{ action('UserController@adminTransactions', $user->id) }}" class="button button-with-icon"><i class="fa fa-money"></i> Transactions</a>
@endif