<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Office CRM - @yield('title')</title>
</head>

<body class="h-screen bg-gray-200">
    <div class="w-full h-full">
        @yield('content')
    </div>
</body>

</html>