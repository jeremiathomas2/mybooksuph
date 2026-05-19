<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome — Ufunuo Publishing House</title>
    
    <script>
        // Apply theme immediately to prevent flash
        (function() {
            const theme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #1a3a5c;
            --accent: #2d7dd2;
            --bg: #f0f4f9;
            --text: #1a2a3a;
        }
        [data-theme="dark"] {
            --bg: #0f1923;
            --text: #e8f0f8;
        }
        body {
            margin: 0;
            font-family: 'Nunito Sans', sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, #132d47 100%);
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            transition: background 0.3s;
        }
        .container {
            max-width: 600px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
            transition: all 0.3s;
        }
        [data-theme="dark"] .container {
            background: rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.05);
        }
        .logo {
            font-size: 64px;
            margin-bottom: 20px;
            color: var(--accent);
        }
        h1 {
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 10px;
        }
        p {
            font-size: 18px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 40px;
        }
        .actions {
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        .btn {
            padding: 14px 32px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
        }
        .btn-primary {
            background: var(--accent);
            color: #fff;
        }
        .btn-primary:hover {
            background: #2068b8;
            transform: translateY(-2px);
        }
        .btn-outline {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
            transform: translateY(-2px);
        }
        .lang-switcher {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .lang-switch {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 13px;
            cursor: pointer;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="lang-switcher">
        <select onchange="window.location.href='/lang/' + this.value" class="lang-switch">
            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
            <option value="sw" {{ app()->getLocale() == 'sw' ? 'selected' : '' }}>Kiswahili</option>
        </select>
    </div>

    <div class="container">
        <div class="logo"><i class="fas fa-book-open"></i></div>
        <h1>Ufunuo Publishing House</h1>
        <p>{{ __('messages.splash_subtitle') }}</p>
        
        <div class="actions">
            <a href="{{ route('login') }}" class="btn btn-primary">{{ __('messages.login') }}</a>
            <a href="{{ route('register') }}" class="btn btn-outline">{{ __('messages.register') }}</a>
        </div>
    </div>
</body>
</html>
