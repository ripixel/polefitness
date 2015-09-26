<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('css/pure-min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/grids-responsive-min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/polefitness.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/toastr.min.css') }}" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:100,400,300,700|Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	@yield('head')

</head>
<body>

@include('partials.nav')

<div class="content-wrapper">

	@yield('content')

</div>

@include('partials.footer')

<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/smooth-link-scroll.js') }}"></script>
<script src="{{ URL::asset('js/polefitness.js') }}"></script>
<script src="{{ URL::asset('js/toastr.min.js') }}"></script>
<script type="text/javascript">
	$(function() {
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-bottom-full-width",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "3000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			}
		
		@if($errors->has())
			@foreach ($errors->all() as $error)
				toastr["error"]("{{ $error }}");
			@endforeach
		@endif
		
		@if(Session::get('bad') != null)
			toastr["error"]("{{ Session::get('bad') }}");
		@endif
		
		@if(Session::get('good') != null)
			toastr["success"]("{{ Session::get('good') }}");
		@endif
	});
</script>
@yield('javascript')
</body>
</html>