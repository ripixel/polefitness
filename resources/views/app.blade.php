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

</head>
<body>

<div class="container-fluid">

    @yield('content')

</div>

@yield('footer')

</body>
</html>