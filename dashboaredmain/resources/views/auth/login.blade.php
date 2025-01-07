<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f8f5fa 0%, #c097d1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Arial', sans-serif;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
        }

        .login-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(138, 91, 156, 0.1);
            overflow: hidden;
            display: flex;
            max-width: 1000px;
            margin: 0 auto;
        }

        .login-sidebar {
            background: #5c3b6d;
            padding: 40px;
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .login-sidebar h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .login-sidebar p {
            color: #c097d1;
            text-align: center;
            font-size: 1.1rem;
        }

        .login-content {
            padding: 40px;
            width: 60%;
            background: white;
        }

        .login-header {
            margin-bottom: 30px;
            text-align: left;
        }

        .login-header h2 {
            color: #5c3b6d;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #5c3b6d;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #f0e6f5;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #8a5b9c;
            outline: none;
            box-shadow: 0 0 0 3px rgba(138, 91, 156, 0.1);
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .remember-me input {
            margin-right: 10px;
        }

        .btn-primary {
            background: #8a5b9c;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 15px;
        }

        .btn-primary:hover {
            background: #5c3b6d;
            transform: translateY(-2px);
        }

        .forgot-password {
            text-align: center;
        }

        .forgot-password a {
            color: #8a5b9c;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .forgot-password a:hover {
            color: #5c3b6d;
            text-decoration: underline;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
            }
            
            .login-sidebar,
            .login-content {
                width: 100%;
                padding: 30px;
            }
            
            .login-sidebar {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-wrapper">
        <div class="login-sidebar">
            <h1>LumiPick</h1>
            <p>Welcome to the Admin Dashboard. Please login to access your account and manage your system.</p>
        </div>
        
        <div class="login-content">
            <div class="login-header">
                <h2>Admin Login</h2>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" 
                           required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="remember-me">
                    <input class="form-check-input" type="checkbox" 
                           name="remember" id="remember" 
                           {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn-primary">
                    Login to Dashboard
                </button>

                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
</body>
</html>