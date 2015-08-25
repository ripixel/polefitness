<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('css/pure-min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/grids-responsive-min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/select2.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/admin.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/toastr.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('css/jquery.datetimepicker.css') }}" />
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
<script src="{{ URL::asset('js/select2.min.js') }}"></script>
<script src="{{ URL::asset('js/toastr.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.datetimepicker.js') }}"></script>
<script type="text/javascript">
	$(function() {
		tinymce.init({
			selector: ".tinymce"
		});
		
		$(".select2").select2();
		
		$(".confirmAction").click(function() {
			var confirmmessage = $(this).data("confirmmessage");
			if(confirmmessage===undefined) {
				confirmmessage = "Are you sure you want to do this?";
			}
			var confirmResult = confirm(confirmmessage);
			return confirmResult;
		});
		
		$(".datepicker").datetimepicker({
			format:'l jS M g:ia'
		});
		
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
			"timeOut": null,
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
			}
		
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