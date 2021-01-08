<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Godej Mi</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/godejmi.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div id="app">
    <app :is-authorized={{ session()->get("is_authorized") ?: 0 }}></app>
</div>
</body>
</html>
