@extends('admin')

@section('title')
	Membership Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>Membership Manager</h1>
	<h2>{{ $subtitle }}</h2>

	@include('memberships.actions')

	<table class="admin-table pure-table pure-table-striped pure-table-horizontal">
		<thead>
			<tr>
				<th>Name</th>
				<th>Cost</th>
				<th>Free Classes</th>
				<th>Includes Soc Membership</th>
				<th>Status</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($memberships as $membership)
				<tr>
					<td>{{ $membership->name }}</td>
					<td>{{ sprintf('£%01.2f', $membership->cost) }}</td>
					<td>{{ $membership->free_classes }}</td>
					@if($membership->includes_membership)
						<td class="good"><i class="fa fa-check"></i> Yes</td>
					@else
						<td class="bad"><i class="fa fa-times"></i> No</td>
					@endif
					<td class="{{ $membership->goodBadStatus() }}">{{ $membership->status() }}</td>
					<td>
						@if($membership->active)
							<a href="{{ action('MembershipsController@retire', $membership->id) }}" class="button button-red button-with-icon confirmAction" data-confirmmessage="Are you sure you want to retire this membership?"><i class="fa fa-clock-o"></i> Retire</a>
						@else
							<a href="{{ action('MembershipsController@reactivate', $membership->id) }}" class="button button-green button-with-icon confirmAction" data-confirmmessage="Are you sure you want to reactivate this membership?"><i class="fa fa-check"></i> Reactivate</a>
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
