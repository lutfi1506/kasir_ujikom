<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url('image/background.png');
        }
    </style>
</head>

<body class="h-screen bg-cover">
    {{ $slot }}
</body>

</html>
