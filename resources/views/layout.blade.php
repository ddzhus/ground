<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container m-5">
        <h1>Ground</h1>
        <ul>
            <li><a href="{{ route('index') }}">Image</a></li>
            <li><a href="{{ route('queue') }}">Queue</a></li>
            <li><a href="{{ route('database') }}">Database</a></li>
        </ul>
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
