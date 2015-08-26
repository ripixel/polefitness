@extends('admin')

@section('content')
	<h1>News Manager</h1>
	<h2>Create News Item</h2>
	
	{!! Form::model($news_item = new \App\Blog_Item, ['method' => 'POST', 'url' => action('NewsController@store'), 'class' => 'pure-form pure-form-stacked'] ) !!}
	
		@include('news.form', ['submit_text' => 'Create News Article'])
	
	{!! Form::close() !!}
@endsection