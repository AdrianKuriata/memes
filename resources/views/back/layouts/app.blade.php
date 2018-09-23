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
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show pace-done pace-done" cz-shortcut-listen="true">
    <div class="pace  pace-inactive pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <div class="app-body">
        <main class="main">
            <div class="container-fluid">
                <div id="ui-view"><div>

                    <div class="animated fadeIn">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        <footer class="app-footer">
            <div>
                <a href="https://coreui.io/pro/">CoreUI Pro</a>
                <span>© 2018 creativeLabs.</span>
            </div>
            <div class="ml-auto">
                <span>Powered by</span>
                <a href="https://coreui.io/pro/">CoreUI Pro</a>
            </div>
        </footer>
    </div>
    <script>
    $('#ui-view').ajaxLoad();
    $(document).ajaxComplete(function() {
        Pace.restart()
    });
    </script>

    <!-- Scripts -->
    <script src="{{ mix('back/js/app.js') }}" defer></script>
</body>
</html>
