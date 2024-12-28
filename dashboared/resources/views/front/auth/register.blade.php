<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MODISH - Create Account</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6C5CE7;
            --primary-hover: #5B4BC4;
            --background-color: #F9F9F9;
            --secondary-background: #FFFFFF;
            --accent-color: #8E7CF7;
            --text-color: #1A1A1A;
            --error-color: #FF3B3B;
            --input-border: #E0E0E0;
            --input-background: #F8F9FA;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(-45deg, #EEE6FF, #F5F0FF, #EEE6FF, #F0E6FF);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .register-container {
            width: 100%;
            max-width: 460px;
            max-height: 98vh;
            margin: 1rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(108, 92, 231, 0.1);
            overflow: hidden;
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: float 6s ease-in-out infinite;
            display: flex;
            flex-direction: column;
        }

        .logo-container {
            text-align: center;
            padding: 1.5rem 1rem;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
        }

        .logo-container svg {
            width: 120px;
            height: auto;
        }

        .login-header {
            color: white;
            margin: 0.5rem 0;
            font-size: 1.75rem;
            font-weight: 700;
            animation: fadeInDown 1s ease-out;
        }

        .register-body {
            padding: 1.5rem 2rem;
            flex: 1;
            overflow-y: auto;
        }

        .form-group {
            margin-bottom: 1.25rem;
            animation: fadeInUp 0.5s ease-out;
        }

        .input-wrapper {
            position: relative;
        }

        .input-label {
            position: absolute;
            left: 1rem;
            top: -0.75rem;
            background: white;
            padding: 0 0.5rem;
            font-size: 0.875rem;
            color: var(--primary-color);
            font-weight: 500;
            z-index: 1;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid var(--input-border);
            border-radius: 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--input-background);
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(108, 92, 231, 0.1);
            transform: translateY(-2px);
            background: white;
        }

        .btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 16px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(108, 92, 231, 0.2);
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.1);
            transform: translate(-50%, -50%) rotate(35deg);
            transition: transform 0.5s ease;
        }

        .btn-primary:hover::after {
            transform: translate(-50%, -50%) rotate(35deg) translateX(20%);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.25rem 0;
            color: #666;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--input-border);
        }

        .divider span {
            padding: 0 1rem;
            font-size: 0.875rem;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 1.25rem;
            margin-top: 1.25rem;
        }

        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid var(--input-border);
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            border-color: var(--primary-color);
            background: rgba(108, 92, 231, 0.1);
        }

        .login-link {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.9rem;
        }

        @media (max-height: 800px) {
            .register-container {
                max-height: 95vh;
            }
            
            .logo-container {
                padding: 1rem;
            }
            
            .logo-container svg {
                width: 100px;
            }
            
            .login-header {
                font-size: 1.5rem;
                margin: 0.25rem 0;
            }
            
            .form-control {
                padding: 0.75rem 1rem;
            }
            
            .btn {
                padding: 0.75rem;
            }
            
            .social-btn {
                width: 40px;
                height: 40px;
            }
        }

        @media (max-width: 768px) {
            .register-container {
                margin: 0.5rem;
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container animate__animated animate__fadeIn">
        <div class="logo-container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 60">
                <g fill="#FFFFFF">
                    <path d="M30 10 L50 10 L45 25 L35 25 Z" />
                    <circle cx="40" cy="35" r="15" fill="none" stroke="#FFFFFF" stroke-width="2" />
                    <path d="M30 35 Q40 45 50 35" fill="none" stroke="#FFFFFF" stroke-width="2" />
                </g>
                <g fill="#FFFFFF">
                    <text x="70" y="40" font-family="Arial" font-weight="bold" font-size="24">MODISH</text>
                </g>
            </svg>
            <h1 class="login-header">Create Account</h1>
        </div>
        <div class="register-body">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">Full Name</label>
                        <input type="text" class="form-control" 
                               name="name" placeholder="Enter your full name" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">Email Address</label>
                        <input type="email" class="form-control" 
                               name="email" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">Password</label>
                        <input type="password" class="form-control" 
                               name="password" placeholder="Choose a password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">Confirm Password</label>
                        <input type="password" class="form-control" 
                               name="password_confirmation" placeholder="Confirm your password" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Create Account
                </button>

                <div class="divider">
                    <span>or sign up with</span>
                </div>

                <div class="social-login">
                    <div class="social-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6C5CE7" stroke-width="2">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                        </svg>
                    </div>
                    <div class="social-btn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#6C5CE7" stroke-width="2">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                    </div>
                </div>

                <div class="login-link">
                    <a href="{{ route('login') }}" style="color: var(--text-color); text-decoration: none;">
                        Already have an account? <span style="color: var(--primary-color); font-weight: 600;">Sign In</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>