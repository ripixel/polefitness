@extends('app')

@section('title')
	Your Passes | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Your Passes</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet center pure-u-1">
							<h2>Passes Purchased</h2>
							<table class="public-table pure-table pure-table-striped pure-table-horizontal">
								<thead>
									<tr>
										<th>Type</th>
										<th>Purchased</th>
										<th>Payment Status</th>
										<th>Free Spaces Remaining</th>
									</tr>
								</thead>
								<tbody>
							@foreach($user->user_memberships()->orderBy('created_at', 'desc')->get() as $user_membership)
									<tr>
										<td><strong>{{ $user_membership->membership->name }}</strong></td>
										<td>{{ $user_membership->created_at }}</td>
										<td class="{{ $user_membership->transaction->goodBadStatus() }}">{{ $user_membership->transaction->status() }}</td>
										@if($user_membership->transaction->goodBadStatus() != "bad")
											<td>{{ $user_membership->spaces_left }}</td>
										@else
											<td>N/A</td>
										@endif
									</tr>
							@endforeach
								</tbody>
							</table>

							<h2>Purchase Passes</h2>
							@foreach($memberships as $membership)
								<h3>{{ $membership->name }}</h3>
								@if($membership->description)
								<p>{{$membership->description }}</p>
								@endif
								<a href="{{ action('UserController@purchaseMembership', $membership->id) }}" style="margin-bottom: 5px; min-width: 100%;" class="button button-on-white"><strong>{{ sprintf('£%01.2f', $membership->cost) }}</strong> - {{ $membership->free_classes }} passes</a><br/>
							@endforeach
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection