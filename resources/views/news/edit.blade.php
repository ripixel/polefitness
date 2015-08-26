@extends('admin')

@section('content')
	<h1>News Manager</h1>
	<h2>Edit News Item</h2>
	
	{!! Form::model($news_item, ['method' => 'PATCH', 'url' => action('NewsController@update', $news_item->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('news.form', ['submit_text' => 'Update News Article'])
	
	{!! Form::close() !!}
	
	{!! Form::model($news_item, ['method' => 'DELETE', 'url' => action('NewsController@destroy', $news_item->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
		
		{!! Form::submit('Delete News Item', ['class' => 'button button-red confirmAction', 'data-confirmmessage' => 'Are you sure you want to delete this news item?']) !!}
	
	{!! Form::close() !!}
	
	
@endsection