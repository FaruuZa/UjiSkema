<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-4.6-dist/css/bootstrap.min.css') }}">
    @stack('style')
    <title>UjiSkema</title>
</head>
<body>

    @yield('body')

    <script src="{{ asset('vendor/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.6-dist/js/bootstrap.min.js') }}"></script>
    @stack('script')
</body>
</html>
