<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('back/css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('back.layouts.partials.header')

    <main>
        <div class="container">
            @include('flash::message')
            
            @yield('content')
        </div>
    </main>

    <footer>
        @include('back.layouts.partials.footer')
    </footer>

    <!-- Scripts -->
    <script src="{{ mix('back/js/app.js') }}" defer></script>
</body>
</html>
