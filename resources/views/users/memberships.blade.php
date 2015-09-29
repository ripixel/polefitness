@extends('app')

@section('title')
	Your Memberships | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Your Memberships</h1>
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-snippet center pure-u-1">							
							<h2>Memberships Purchased</h2>
							<table class="public-table pure-table pure-table-striped pure-table-horizontal">
								<thead>
									<tr>
										<th>Membership</th>
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
										<td>{{ $user_membership->spaces_left }}</td>
									</tr>
							@endforeach
								</tbody>
							</table>
							
							<h2>Purchase Memberships</h2>
							@foreach($memberships as $membership)
								<a href="{{ action('UserController@purchaseMembership', $membership->id) }}" style="margin-bottom: 5px; min-width: 100%;" class="button button-on-white"><strong>{{ $membership->name }}</strong> - {{ sprintf('£%01.2f', $membership->cost) }} - {{ $membership->free_classes }} free classes</a><br/>
							@endforeach
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection