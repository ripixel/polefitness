@extends('admin')

@section('content')
	<h1>Edit News Item</h1>
	{!! Form::model($news_item, ['method' => 'PATCH', 'url' => action('NewsController@update', $news_item->id)] ) !!}
	
		{!! Form::label('title','Title') !!}
		{!! Form::text('title') !!}
	
		{!! Form::label('body','Body') !!}
		{!! Form::textarea('body') !!}
	
		{!! Form::label('picture_link','Picture URL') !!}
		{!! Form::text('picture_link') !!}
		
		{!! Form::submit('Update News Item') !!}
	
	{!! Form::close() !!}
@endsection