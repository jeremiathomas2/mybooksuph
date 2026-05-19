<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Ufunuo Publishing House</title>
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
            height: 600px;
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
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
        .form-input {
            width: 100%;
            padding: 12px 16px;
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
            <h2>Ufunuo Publishing House</h2>
            <p>Welcome back! Please login to your account to manage book distribution, tracking, and reports.</p>
            <div style="margin-top: auto; font-size: 14px; color: rgba(255,255,255,0.5);">
                &copy; 2024 Ufunuo Publishing House. All rights reserved.
            </div>
        </div>
        <div class="login-form-area">
            <h1>Sign In</h1>
            <p class="subtitle">Enter your credentials to access your dashboard</p>
            
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" placeholder="admin@rightstar.com" required autofocus>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                </div>
                
                <div style="display: flex; align-items: center; margin-bottom: 20px;">
                    <input type="checkbox" id="remember" name="remember" style="margin-right: 8px;">
                    <label for="remember" style="font-size: 13px; color: #666; cursor: pointer;">Remember me</label>
                </div>

                <button type="submit" class="btn-login">Sign In</button>
            </form>

            <div class="extra-links">
                <a href="#">Forgot Password?</a>
                <a href="{{ route('register') }}">Create Account</a>
            </div>
        </div>
    </div>
</body>
</html>
