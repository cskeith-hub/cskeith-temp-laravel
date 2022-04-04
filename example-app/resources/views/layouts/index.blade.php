<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BASIC TEMPLATE</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    @include('layouts.header')
    @yield('body')
    @include('layouts.footer')
</body>
</html>