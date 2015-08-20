@extends('app')

@section('title')
	Classes | UoS Pole Fitness Society
@endsection

@section('content')
	<div id="news" class="hero hero-classes">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-title hero-content">
					<h1 style="font-size: 3.5em">Classes</h1>
					<h3>These are all the awesome classes we have coming up, check them out...</h3>	
				</div>

				<div class="pure-u-1 news-item">
					<div class="pure-g">
						<div class="news-image pure-u-1-4" style="background: url('img/com-2.jpg') no-repeat center center; background-size: cover;">
							<div class="news-overlay"><a class="button" href="#">See Info</a></div>
						</div>
						<div class="news-snippet pure-u-3-4">
							<h3>Next Class</h3>
							<h2>Advanced Spinning</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur delectus dolorum eius eos est expedita fugit id illum inventore, magnam maiores minima mollitia nam nisi optio quam saepe similique voluptatibus.</p>
							<p><strong>Where:</strong> A Pole New Adventure</p>
							<p><strong>When:</strong> 8:00pm Today</p>
							<p><strong>Places Taken:</strong> 10/16</p>
						</div>
					</div>
				</div>
				
				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-1.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Introduction to Pole</h3>
						<p>6:30pm Tomorrow</p>
						<p><a class="button" href="#">See Info</a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>
				
				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-3.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Ben's Private Show</h3>
						<p>12:00pm 15th September</p>
						<p><a class="button" href="#">See Info</a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>
				
				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-1.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Introduction to Pole</h3>
						<p>6:30pm 18th September</p>
						<p><a class="button" href="#">See Info</a></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
@endsection