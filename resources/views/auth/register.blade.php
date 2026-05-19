<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Ufunuo Publishing House</title>
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
        }
        body {
            margin: 0;
            font-family: 'Nunito Sans', sans-serif;
            background: #f0f4f9;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .login-wrapper {
            display: flex;
            width: 1000px;
            height: 650px;
            background: var(--card-bg);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            overflow: hidden;
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
            padding: 40px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 6px;
            color: #444;
        }
        .form-input {
            width: 100%;
            padding: 10px 16px;
            border: 2px solid #eee;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s;
            outline: none;
            box-sizing: border-box;
        }
        .form-input:focus {
            border-color: var(--accent);
            background: #fff;
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
            font-size: 12px;
            margin-top: 4px;
            font-weight: 600;
        }
        @media (max-width: 1024px) {
            .login-wrapper {
                width: 90%;
                height: auto;
                flex-direction: column;
            }
            .login-side {
                padding: 40px;
            }
            .login-form-area {
                width: 100%;
                padding: 40px;
                box-sizing: border-box;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-side">
            <div class="brand-logo"><i class="fas fa-book-open"></i></div>
            <h2>Join Ufunuo Publishing House</h2>
            <p>Create an account to start managing book distribution, inventory tracking, and sales analytics across Tanzania.</p>
            <div style="margin-top: auto; font-size: 14px; color: rgba(255,255,255,0.5);">
                &copy; 2024 Ufunuo Publishing House. All rights reserved.
            </div>
        </div>
        <div class="login-form-area">
            <h1>Create Account</h1>
            <p class="subtitle">Join our distribution network today</p>
            
            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-input" placeholder="e.g. John Doe" value="{{ old('name') }}" required autofocus>
                    @error('name') <div class="error-msg">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" placeholder="e.g. john@example.com" value="{{ old('email') }}" required>
                    @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                    @error('password') <div class="error-msg">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-input" placeholder="••••••••" required>
                </div>
                
                <button type="submit" class="btn-login">Create Account</button>
            </form>

            <div class="extra-links">
                Already have an account? <a href="{{ route('login') }}">Sign In</a>
            </div>
        </div>
    </div>
</body>
</html>
