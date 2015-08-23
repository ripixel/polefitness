<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('css/pure-min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/grids-responsive-min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:100,400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>

<div class="pure-g">
	<div class="pure-u-1-6">
		@include('partials.admin_nav')
	</div>
	
	<div class="pure-u-5-6">

		@yield('content')

	</div>
</div>

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/polefitness.js') }}"></script>
<script src="{{ URL::asset('js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
	$(function() {
		tinymce.init({
			selector: ".tinymce"
		});
		
		$(".confirmDelete").click(function() {
			var confirmDelete = confirm("Are you sure you want to delete this?");
			return confirmDelete;
		});
	});
</script>
@yield('javascript')
</body>
</html>