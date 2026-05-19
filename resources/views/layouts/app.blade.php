<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ufunuo Publishing House — Distribution Management')</title>
    
    <script>
        // Apply theme immediately to prevent flash
        (function() {
            const root = document.documentElement;
            
            // Theme
            const theme = localStorage.getItem('theme') || 'light';
            root.setAttribute('data-theme', theme);
            
            // Other settings
            const settings = {
                'header-bg': localStorage.getItem('setting_header-bg'),
                'sidebar-bg': localStorage.getItem('setting_sidebar-bg'),
                'accent': localStorage.getItem('setting_accent'),
                'sidebar-width': localStorage.getItem('setting_sidebar-width'),
                'transition': localStorage.getItem('setting_transition'),
                'hover-effect': localStorage.getItem('setting_hover-effect'),
                'compact-mode': localStorage.getItem('setting_compact-mode') === 'true'
            };
            
            if (settings['header-bg']) root.style.setProperty('--header-bg', settings['header-bg']);
            if (settings['sidebar-bg']) root.style.setProperty('--sidebar-bg', settings['sidebar-bg']);
            if (settings['accent']) {
                root.style.setProperty('--accent', settings['accent']);
                root.style.setProperty('--sidebar-active', settings['accent']);
            }
            if (settings['sidebar-width']) root.style.setProperty('--sidebar-width', settings['sidebar-width']);
            if (settings['transition']) root.style.setProperty('--transition', settings['transition']);
            
            if (settings['compact-mode']) {
                const style = document.createElement('style');
                style.id = 'compactStyleInitial';
                style.textContent = `.page-content{padding:12px!important} .card-body{padding:12px!important} .nav-item{padding:7px 18px!important} .stat-card{padding:12px!important}`;
                document.head.appendChild(style);
            }
            
            if (settings['hover-effect']) {
                const style = document.createElement('style');
                style.id = 'dynamicHoverStyleInitial';
                const effects = {
                    lift: `.stat-card:hover,.book-card:hover,.quick-action:hover{transform:translateY(-6px)!important;} .nav-item:hover{transform:translateX(3px)!important;}`,
                    glow: `.stat-card:hover,.book-card:hover,.quick-action:hover{transform:none!important;box-shadow:0 0 0 3px var(--accent),var(--shadow-hover)!important;} .nav-item:hover{transform:none!important;box-shadow:0 0 10px var(--accent)!important;}`,
                    scale: `.stat-card:hover,.book-card:hover,.quick-action:hover{transform:scale(1.04)!important;} .nav-item:hover{transform:scale(1.03)!important;}`,
                    slide: `.stat-card:hover,.book-card:hover,.quick-action:hover{transform:translateX(5px)!important;} .nav-item:hover{transform:translateX(6px)!important;}`
                };
                style.textContent = effects[settings['hover-effect']] || '';
                document.head.appendChild(style);
            }
        })();
    </script>
    
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
