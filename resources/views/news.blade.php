@extends('app')

@section('title')
	News | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-news">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">News</h1>
					<h3>Good news, everyone...!</h3>
				</div>
				
				@foreach($blog_items as $blog_item)
				<div class="pure-u-1 news-item">
					<div class="pure-g">
					<div class="news-image pure-u-1-4" style="background: url('{{ $blog_item->picture_link }}') no-repeat center center; background-size: cover;"></div>
						<div class="news-snippet pure-u-3-4">
							<h2>{{ $blog_item->title }}</h2>
							{!! $blog_item->body !!}
							<div class="news-details">
								Posted <strong>{{ $blog_item->created_at }}</strong> by <strong>{{ $blog_item->user->fullname() }}</strong>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
		</div>
	</div>
@endsection