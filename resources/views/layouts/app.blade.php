<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ufunuo Publishing House — Distribution Management')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;1,6..12,400;1,6..12,600&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    
    <!-- Styles -->
    @include('partials.styles')
    @stack('styles')
</head>
<body>

    @include('partials.mobile-overlay')
    @include('partials.notif-panel')
    @include('partials.settings-panel')
    
    <!-- Modals -->
    @include('components.modals.order-modal')
    @include('components.modals.book-modal')

    <div class="app-layout">
        @include('partials.sidebar')

        <div class="main-area" id="mainArea">
            @include('partials.header')

            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>

    @include('partials.toast-container')

    <!-- Scripts -->
    @include('partials.scripts')
    @stack('scripts')

</body>
</html>
