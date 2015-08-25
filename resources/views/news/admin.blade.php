@extends('admin')

@section('title')
	News Manager | UoS PFS Admin
@endsection

@section('content')
	<h1>News Manager</h1>
	<h2>{{ $subtitle }}</h2>
	
	@include('news.actions')
	
	<table class="admin-table pure-table pure-table-striped pure-table-horizontal">
		<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th>Owner</th>
				<th>Posted</th>
			</tr>
		</thead>
		<tbody>
			@foreach($news_items as $news_item)
				<tr>
					<td><a href="{{ action('NewsController@edit', $news_item->id) }}" class="button button-with-icon"><i class="fa fa-pencil"></i> Edit</a></td>
					<td>{{ $news_item->title }}</td>
					<td>{{ $news_item->user->fullname() }}</td>
					<td>{{ $news_item->created_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection