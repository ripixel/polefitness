@extends('admin')

@section('content')
	<h1>Edit News Item</h1>
	{!! Form::model($news_item, ['method' => 'PATCH', 'url' => action('NewsController@update', $news_item->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('news.form', ['submit_text' => 'Update News Article'])
	
	{!! Form::close() !!}
	
	{!! Form::model($news_item, ['method' => 'DELETE', 'url' => action('NewsController@destroy', $news_item->id), 'class' => 'pure-form pure-form-stacked'] ) !!}
		
		{!! Form::submit('Delete News Item', ['class' => 'button confirmDelete']) !!}
	
	{!! Form::close() !!}
	
	
@endsection