<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.register') }} — Ufunuo Publishing House</title>
    
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
            width: 1100px;
            height: 800px;
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
            width: 550px;
            padding: 40px 60px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            background: var(--card-bg);
        }
        .brand-logo {
            font-size: 48px;
            color: var(--accent);
            margin-bottom: 20px;
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
            margin-bottom: 25px;
        }
        [data-theme="dark"] .subtitle {
            color: #8aa8c8;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group.full {
            grid-column: span 2;
        }
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 6px;
            color: #444;
        }
        [data-theme="dark"] .form-label {
            color: #8aa8c8;
        }
        .form-input {
            width: 100%;
            padding: 10px 16px;
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
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--text);
        }
        .extra-links a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 700;
        }
        .extra-links a:hover {
            text-decoration: underline;
        }
        .error-msg {
            color: #e74c3c;
            font-size: 11px;
            margin-top: 4px;
            font-weight: 600;
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
        .conditional-field {
            display: none;
            animation: fadeIn 0.3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 1024px) {
            .login-wrapper {
                width: 95%;
                height: auto;
                min-height: 90vh;
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
                padding: 30px;
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
        @media (max-width: 768px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full { grid-column: span 1; }
        }
        @media (max-width: 480px) {
            .login-wrapper { width: 100%; border-radius: 0; min-height: 100vh; }
            .login-side { display: none; }
            .login-form-area { padding: 20px; }
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
            <h2>{{ __('messages.join_us_title') }}</h2>
            <p>{{ __('messages.join_us_desc') }}</p>
            <div style="margin-top: auto; font-size: 14px; color: rgba(255,255,255,0.5);">
                &copy; 2024 Ufunuo Publishing House. All rights reserved.
            </div>
        </div>

        <div class="login-form-area">
            <h1>{{ __('messages.create_account') }}</h1>
            <p class="subtitle">{{ __('messages.join_network_subtitle') }}</p>
            
            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label">{{ __('messages.full_name') }}</label>
                        <input type="text" name="name" class="form-input" placeholder="e.g. John Doe" value="{{ old('name') }}" required autofocus>
                        @error('name') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('messages.email_address') }}</label>
                        <input type="email" name="email" class="form-input" placeholder="e.g. john@example.com" value="{{ old('email') }}" required>
                        @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('messages.gender') }}</label>
                        <select name="gender" class="form-input" required>
                            <option value="">{{ __('messages.select_gender') }}</option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                        </select>
                        @error('gender') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('messages.phone_number') }}</label>
                        <input type="text" name="phone_number" class="form-input" placeholder="e.g. 07XXXXXXXX" value="{{ old('phone_number') }}" required>
                        @error('phone_number') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('messages.baptism_status') }}</label>
                        <select name="baptism" class="form-input" required>
                            <option value="0" {{ old('baptism') == '0' ? 'selected' : '' }}>{{ __('messages.no') }}</option>
                            <option value="1" {{ old('baptism') == '1' ? 'selected' : '' }}>{{ __('messages.yes') }}</option>
                        </select>
                        @error('baptism') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('messages.user_type') }}</label>
                        <select name="user_type" id="userTypeSelect" class="form-input" required onchange="toggleFields(this.value)">
                            <option value="individual_buyer" {{ old('user_type') == 'individual_buyer' ? 'selected' : '' }}>{{ __('messages.individual_buyer') }}</option>
                            <option value="church_agent" {{ old('user_type') == 'church_agent' ? 'selected' : '' }}>{{ __('messages.church_agent') }}</option>
                            <option value="evangelist" {{ old('user_type') == 'evangelist' ? 'selected' : '' }}>{{ __('messages.evangelist') }}</option>
                            <option value="transport_company" {{ old('user_type') == 'transport_company' ? 'selected' : '' }}>{{ __('messages.transport_company') }}</option>
                        </select>
                        @error('user_type') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <!-- Transport Company Fields -->
                    <div class="form-group full conditional-field" id="transportFields">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">{{ __('messages.company_name') }}</label>
                                <input type="text" name="company_name" class="form-input" placeholder="Enter company name" value="{{ old('company_name') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __('messages.company_reg_number') }}</label>
                                <input type="text" name="company_reg_number" class="form-input" placeholder="Registration Number" value="{{ old('company_reg_number') }}">
                            </div>
                            <div class="form-group full">
                                <label class="form-label">{{ __('messages.transport_routes') }}</label>
                                <textarea name="transport_routes" class="form-input" placeholder="e.g. Dar - Mwanza, Dar - Arusha" style="height: 60px;">{{ old('transport_routes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Evangelist Fields -->
                    <div class="form-group full conditional-field" id="evangelistFields">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">{{ __('messages.ministry_name') }}</label>
                                <input type="text" name="evangelist_ministry" class="form-input" placeholder="Ministry Name" value="{{ old('evangelist_ministry') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">{{ __('messages.working_region') }}</label>
                                <input type="text" name="evangelist_region" class="form-input" placeholder="Region" value="{{ old('evangelist_region') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('messages.password') }}</label>
                        <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                        @error('password') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{ __('messages.confirm_password') }}</label>
                        <input type="password" name="password_confirmation" class="form-input" placeholder="••••••••" required>
                    </div>
                </div>
                
                <button type="submit" class="btn-login">{{ __('messages.create_account') }}</button>
            </form>

            <div class="extra-links">
                {{ __('messages.already_have_account') }} <a href="{{ route('login') }}">{{ __('messages.sign_in') }}</a>
            </div>
        </div>
    </div>

    <script>
        function toggleFields(type) {
            document.getElementById('transportFields').style.display = type === 'transport_company' ? 'block' : 'none';
            document.getElementById('evangelistFields').style.display = type === 'evangelist' ? 'block' : 'none';
        }
        
        // Initialize on load (for old input)
        window.onload = function() {
            toggleFields(document.getElementById('userTypeSelect').value);
        };
    </script>
</body>
</html>
