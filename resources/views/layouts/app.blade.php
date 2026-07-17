<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    >
</head>
<body>
    @yield('content')

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    @stack('scripts')
</body>
</html>