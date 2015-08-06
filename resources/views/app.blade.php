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
    <link href='http://fonts.googleapis.com/css?family=Raleway:100,400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>

@include('partials.nav')

<div class="content-wrapper">

    @yield('content')

</div>

@include('partials.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
@yield('javascript')
</body>
</html>