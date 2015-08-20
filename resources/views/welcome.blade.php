@extends('app')

@section('title')
	University of Sheffield Pole Fitness Society
@endsection

@section('content')

	<div class="pure-g hero hero-home-1 hero-full-screen">
		<div class="gradient-overlay"></div>
		<div class="container">
			<div class="pure-u-1 hero-content hero-content-center center">
				<img src="img/logo-white.png" class="main-logo" /><br />
				<h2>The greatest Pole Fitness Society on the planet. Probably.</h2>
				<h3>There are <strong>3</strong> classes with spaces remaining this week.</h3>
				<br />
				<a href="#" class="button" style="margin-bottom: 10px;"><i class="fa fa-calendar" style="margin-right: 10px;"></i> Book your place now</a>
				<br />
				<a href="#story" class="button"><i class="fa fa-book" style="margin-right: 10px;"></i> Read our story</a>
				<br/>
				<i class="fa fa-angle-down hero-bottom fa-2x bouncer"></i>
			</div>
		</div>
	</div>

	<div class="home-2 center container">
		<h1>The best way to work out and have fun</h1>
		<p>Some sub-text about why it's awesome to be a pole fitness-goer whatchamacallit</p>
	</div>

	<div id="story" class="hero hero-home-3">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-content">
					<h1 style="font-size: 3.5em">Our Story</h1>
				</div>

				<div class="pure-u-1 hero-content">
					<h2>How do you start the best pole fitness society in the north? With balls.</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet assumenda consequatur debitis dolorem earum eligendi esse fuga illo odit, officiis provident, quae quas qui quod rerum totam voluptas voluptatibus? Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab ad alias amet at aut, blanditiis deleniti dignissimos dolorem facilis in, nam quae quam sequi similique suscipit tempore totam voluptates.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, nisi temporibus! Ab aliquid error nemo quasi reprehenderit sapiente sit. Consequatur in itaque perspiciatis reiciendis repellendus, tempora! Esse neque omnis rerum.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid assumenda atque debitis, ea eos facere fuga, in ipsum minus non omnis porro possimus praesentium quidem quisquam recusandae reprehenderit rerum, tempore.</p>
					<a href="#committee" class="button"><i class="fa fa-group" style="margin-right: 10px;"></i> Meet the committee</a>
				</div>
			</div>
		</div>
	</div>

	<div class="gold-background">
		<div class="home-4 center container">
			<div class="quote">
				<h1>"It's the best thing I've ever signed up for!"</h1>
				<p>Beth Parsons</p>
			</div>
			<div class="quote">
				<h1>"I've made the best friends I've ever had, and I fancy them all!"</h1>
				<p>Horny Henry</p>
			</div>
			<div class="quote">
				<h1>"There's something so rewarding about wrapping my thighs around a hard stiff greasy pole"</h1>
				<p>Ben Hawker</p>
			</div>
		</div>
	</div>

	<div id="committee" class="hero hero-home-5">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-content">
					<h1 style="font-size: 3.5em">Meet your committee</h1>
					<h3>They're pretty awesome, and pretty... well, pretty.</h3>
				</div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-1.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Bethany Parsons</h3>
						<p>President</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-2.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Amy Walpole</h3>
						<p>Secretary</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Sophie Fisk</h3>
						<p>Treasurer</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Lara Natalia</h3>
						<p>Social Secretary</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Janice Dhanaraj</h3>
						<p>Social Secretary</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Maria Moller Carter</h3>
						<p>Publicity Officer</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-3.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Ben Hawker</h3>
						<p>Inclusions Officer</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Jingle Ng Jing Le</h3>
						<p>Inclusions Officer</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Teresa Liew</h3>
						<p>Events Officer</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Amy Spicer</h3>
						<p>Tour Secretary</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Emma Brudenell</h3>
						<p>Tour Secretary</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Janice Yip</h3>
						<p>Competitions Secretary</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Georgina Hunt</h3>
						<p>Competitions Secretary</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: #ffd990; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Maddie Sinclair</h3>
						<p>Charities Officer</p>
						<p><a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

@section('javascript')
	<script>
		function bouncerLoop() {
			$('.bouncer').animate({'bottom': '30'}, {
				duration: 800,
				complete: function() {
					$('.bouncer').animate({bottom: 20}, {
						duration: 1000,
						complete: bouncerLoop});
				}
			});
		}

		var quoteCounter = 0;
		function beginQuoteCarousel(timing) {
			var quotes = $('.quote');

			//get the highest value for the height of the container so the page doesn't jump around like
			var maxHeight = 0;
			for(var i = 0; i < quotes.length; i++) {
				quotes.eq(i).show();
				maxHeight = Math.max(maxHeight, $(".home-4").height());
				quotes.eq(i).hide();
			}
			$(".home-4").height(maxHeight);
			quotes.eq(quotes.length-1).fadeIn().delay(timing).fadeOut();

			//set the carousel off
			setInterval(function() {
				var quoteToFadeIn = quotes.eq(quoteCounter);
				quoteToFadeIn.fadeIn().delay(timing).fadeOut();
				quoteCounter++;
				if(quoteCounter == quotes.length) {
					quoteCounter = 0;
				}
			}, timing + 801);
		}

		$(function() {
			bouncerLoop();
			beginQuoteCarousel(3000);
		});

	</script>
@endsection