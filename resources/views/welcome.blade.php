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
				<h2>Practice makes <em>pole</em>fect.</h2>
				<h3>There are <strong>{{ $classes_available }}</strong> classes happening this week</h3>
				<br />
				<a href="{{ action('ClassesController@index') }}" class="button" style="margin-bottom: 10px;"><i class="fa fa-calendar" style="margin-right: 10px;"></i> Book your place now</a>
				<br />
				<a href="#story" class="button"><i class="fa fa-book" style="margin-right: 10px;"></i> Read our story</a>
				<br/>
				<i class="fa fa-angle-down hero-bottom fa-2x bouncer"></i>
			</div>
		</div>
	</div>

	<div style="background: #fff;">
		<div class="home-2 center container">
			<h1>The best way to work out and have fun!</h1>
			<p>No matter what age, gender or ability you're always welcome at pole</p>
		</div>
	</div>

	<div id="story" class="hero hero-home-3">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-content">
					<h1 style="font-size: 3.5em">Our Story</h1>
				</div>

				<div class="pure-u-1 hero-content">
					<p>We have been a society at the University of Sheffield for around 4 years and are growing and improving every year. We started out as a small society of like-minded polers who wanted to share our passion with others. Since then we have grown and now have approximately 100 active members.</p>
					<p>Pole fitness is an emerging sport which combines skills from many different disciplines, including gymnastics and dance, but it is not necessary to have any background in these to begin your pole journey. Many people believe that you need to have upper body strength and a good level of fitness to be able to do pole - this is not true! You will develop upper body strength and fitness on your pole journey, along with great friends.</p>
					<p>The most important thing to remember about pole fitness is to enjoy your journey.
</p>
					<a href="#committee" class="button"><i class="fa fa-group" style="margin-right: 10px;"></i> Meet the committee</a>
				</div>
			</div>
		</div>
	</div>

	<div class="gold-background">
		<div class="home-4 center container">
			<div class="quote">
				<h2>"Before my first session I thought it would just be a fun, one off challenge but after the first spin I was hooked! At first, it felt really weird cause I'm hardly the most feminine girl around, but everyone was so lovely and supportive, and I feel so much better about myself and my body."</h2>
				<p>Emily Reed</p>
			</div>
			<div class="quote">
				<h2>"I joined pole for a way to get fit and make friends when I first joined university. I love pole because it’s so diverse all kinds of people do it!"</h2>
				<p>Charlotte Maughan</p>
			</div>
		</div>
	</div>

	<div id="committee" class="hero hero-home-5">
		<div class="block-overlay"></div>
		<div class="container">
			<div class="pure-g hero-content-center center">
				<div class="pure-u-1 hero-content">
					<h1 style="font-size: 3.5em">Meet your committee</h1>
					<h3>Feel free to contact any committee member or message us on our <a href="https://www.facebook.com/UniversityOfSheffieldPoleFitnessSociety?fref=ts" target="_blank">facebook page</a></h3>
				</div>

				<!-- Row 1 -->

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-zoe.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Zoe Allin</h3>
						<p>President</p>
						<p><a href="mailto:zkallin1@sheffield.ac.uk"><i class="fa fa-envelope"></i></a> <a href="http://www.instagram.com/zoallin" target="_blank"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-hannah.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Hannah Morgan</h3>
						<p>Secretary</p>
						<p><a href="mailto:hmorgan5@sheffield.ac.uk"><i class="fa fa-envelope"></i></a> <a href="http://www.instagram.com/moggienogging" target="_blank"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-alice.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Alice Brammer</h3>
						<p>Treasurer</p>
						<p><a href="mailto:abrammer1@sheffield.ac.uk"><i class="fa fa-envelope"></i></a></p>
					</div>
				</div>

				<!-- Row 2 -->

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-ruben.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Ruben Vilela</h3>
						<p>Inclusions &amp; Class Supervisor</p>
						<p><a href="mailto:rdossantosvilela1@sheffield.ac.uk"><i class="fa fa-envelope"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-beatrice.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Beatrice Anderson</h3>
						<p>Competitions Secretary</p>
						<p><a href="mailto:banderson1@sheffield.ac.uk"><i class="fa fa-envelope"></i></a> <a href="https://facebook.com/residentamerican" target="_blank"><i class="fa fa-facebook"></i></a> <a href="http://www.instagram.com/whatintheusername" target="_blank"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-amy.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Amy Spicer</h3>
						<p>Class Supervisor</p>
						<p><a href="mailto:aspicer-hadlington1@sheffield.ac.uk"><i class="fa fa-envelope"></i></a> <a href="http://www.instagram.com/amys20" target="_blank"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<!-- Row 3 -->

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-maddie.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Maddie Sinclair</h3>
						<p>Class Supervisor</p>
						<p><a href="mailto:Mesinclair1@Sheffield.ac.uk"><i class="fa fa-envelope"></i></a> <a href="http://www.instagram.com/maddiesinc" target="_blank"><i class="fa fa-instagram"></i></a></p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-mark.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Mark Androulidakis</h3>
						<p>Class Supervisor</p>
					</div>
				</div>

				<div class="pure-u-1-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-crystal.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Crystal Walls</h3>
						<p>Social Secretary</p>
					</div>
				</div>

				<!-- Row 4 -->

				<div class="pure-u-3-8 spacer"></div>

				<div class="pure-u-1 pure-u-md-1-4 hero-committee-member square" style="background: url('img/com-ben.jpg') no-repeat center center; background-size: cover;">
					<div class="committee-member-desc">
						<h3>Ben Hawker</h3>
						<p>Webmaster</p>
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
			beginQuoteCarousel(5000);
		});

	</script>
@endsection