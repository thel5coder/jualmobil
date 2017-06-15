<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoMobile</title>
    @include('partials.style')
</head>
<body class="wp-automobile">
<div class="wrapper">
    @include('partials.header')
        @yield('content')
    @include('partials.footer')
</div>
    @include('partials.script')
</body>
</html>