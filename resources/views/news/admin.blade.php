@extends('admin')

@section('title')
	News Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>News Manager</h1>
	<h2>{{ $subtitle }}</h2>
	<a href="{{ action('NewsController@create') }}" class="button button-with-icon"><i class="fa fa-plus"></i> Add News Item</a> 
	<a href="{{ action('AdminController@news') }}" class="button button-with-icon">Show All</a> 
	<a href="{{ action('AdminController@newsMine') }}" class="button button-with-icon">Show Mine</a>
	<table class="admin-table pure-table pure-table-striped">
		<thead>
			<tr>
				<th style="width: 1px;"></th>
				<th>Title</th>
				<th>Owner</th>
				<th>Posted</th>
				<th>Last Updated</th>
			</tr>
		</thead>
		<tbody>
			@foreach($news_items as $news_item)
				<tr>
					<td><a href="{{ action('NewsController@edit', $news_item->id) }}" class="button"><i class="fa fa-pencil"></i></a></td>
					<td>{{ $news_item->title }}</td>
					<td>{{ $news_item->user->fullname() }}</td>
					<td>{{ $news_item->created_at }}</td>
					<td>{{ $news_item->updated_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection