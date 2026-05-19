<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.login') }} — Ufunuo Publishing House</title>
    
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
            --card-bg: #ffffff;
            --text: #1a2a3a;
            --radius: 16px;
            --border: #eee;
        }
        [data-theme="dark"] {
            --bg: #0f1923;
            --card-bg: #182333;
            --text: #e8f0f8;
            --border: #253545;
        }
        body {
            margin: 0;
            font-family: 'Nunito Sans', sans-serif;
            background: var(--bg);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: background 0.3s;
        }
        .login-wrapper {
            display: flex;
            width: 1000px;
            height: 600px;
            background: var(--card-bg);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
            position: relative;
            transition: all 0.3s;
        }
        .login-side {
            flex: 1;
            background: linear-gradient(135deg, var(--primary) 0%, #132d47 100%);
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: #fff;
            position: relative;
        }
        .login-side::after {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }
        .login-side h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 20px;
        }
        .login-side p {
            font-size: 16px;
            color: rgba(255,255,255,0.7);
            line-height: 1.6;
        }
        .login-form-area {
            width: 450px;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--card-bg);
        }
        .brand-logo {
            font-size: 48px;
            color: var(--accent);
            margin-bottom: 30px;
        }
        h1 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 10px;
            color: var(--text);
        }
        .subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 30px;
        }
        [data-theme="dark"] .subtitle {
            color: #8aa8c8;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #444;
        }
        [data-theme="dark"] .form-label {
            color: #8aa8c8;
        }
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s;
            outline: none;
            box-sizing: border-box;
            background: var(--card-bg);
            color: var(--text);
        }
        .form-input:focus {
            border-color: var(--accent);
            background: var(--card-bg);
        }
        .btn-login {
            width: 100%;
            padding: 14px;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .btn-login:hover {
            background: #2068b8;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(45,125,210,0.2);
        }
        .extra-links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 13px;
        }
        .extra-links a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 700;
        }
        .extra-links a:hover {
            text-decoration: underline;
        }
        .top-nav {
            position: absolute;
            top: 20px;
            left: 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            z-index: 100;
        }
        .back-btn {
            background: rgba(255,255,255,0.1);
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        .back-btn:hover {
            background: rgba(255,255,255,0.2);
            transform: translateX(-3px);
        }
        [data-theme="dark"] .back-btn {
            background: rgba(255,255,255,0.05);
            color: #e8f0f8;
        }
        [data-theme="dark"] .back-btn:hover {
            background: rgba(255,255,255,0.1);
        }
        .lang-switch {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            color: #fff;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            cursor: pointer;
            outline: none;
        }
        @media (max-width: 1024px) {
            .login-wrapper {
                width: 90%;
                height: auto;
                min-height: 500px;
                flex-direction: column;
            }
            .login-side {
                padding: 40px;
                flex: none;
                height: 200px;
            }
            .login-side h2 { font-size: 24px; }
            .login-side p { font-size: 14px; }
            .login-form-area {
                width: 100%;
                padding: 40px;
                box-sizing: border-box;
            }
            .top-nav {
                top: 10px;
                left: 10px;
            }
            .back-btn, .lang-switch {
                background: #eee;
                color: #333;
                border-color: #ddd;
            }
        }
        @media (max-width: 480px) {
            .login-wrapper { width: 100%; border-radius: 0; min-height: 100vh; }
            .login-side { display: none; }
            .login-form-area { padding: 30px 20px; }
            .top-nav { position: relative; top: 0; left: 0; padding: 20px; width: 100%; box-sizing: border-box; justify-content: space-between; margin-bottom: 0; }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="top-nav">
            <a href="javascript:void(0)" onclick="window.history.length > 1 ? window.history.back() : window.location.href='/'" class="back-btn">
                <i class="fas fa-arrow-left"></i> {{ __('messages.back_to_home') }}
            </a>
            <select onchange="window.location.href='/lang/' + this.value" class="lang-switch">
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                <option value="sw" {{ app()->getLocale() == 'sw' ? 'selected' : '' }}>Kiswahili</option>
            </select>
        </div>

        <div class="login-side">
            <div class="brand-logo"><i class="fas fa-book-open"></i></div>
            <h2>Ufunuo Publishing House</h2>
            <p>{{ __('messages.login_welcome_desc') }}</p>
            <div style="margin-top: auto; font-size: 14px; color: rgba(255,255,255,0.5);">
                &copy; 2024 Ufunuo Publishing House. All rights reserved.
            </div>
        </div>
        <div class="login-form-area">
            <h1>{{ __('messages.sign_in') }}</h1>
            <p class="subtitle">{{ __('messages.login_subtitle') }}</p>
            
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">{{ __('messages.email_address') }}</label>
                    <input type="email" name="email" class="form-input" placeholder="admin@rightstar.com" required autofocus>
                </div>
                <div class="form-group">
                    <label class="form-label">{{ __('messages.password') }}</label>
                    <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>
                
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <input type="checkbox" id="remember" name="remember" style="margin-right: 8px;">
                    <label for="remember" style="font-size: 13px; color: #666; cursor: pointer;">{{ __('messages.remember_me') }}</label>
                </div>

                <button type="submit" class="btn-login">{{ __('messages.sign_in') }}</button>
            </form>

            <div class="extra-links">
                <a href="#">{{ __('messages.forgot_password') }}</a>
                <a href="{{ route('register') }}">{{ __('messages.create_account') }}</a>
            </div>
        </div>
    </div>
</body>
</html>
