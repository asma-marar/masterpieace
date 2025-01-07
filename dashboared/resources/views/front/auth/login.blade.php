<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fashion Store Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #5c3b6d;
            --primary-hover: #4a2f58;
            --background-color: #f8f5fa;
            --secondary-background: #FFFFFF;
            --accent-color: #c097d1;
            --text-color: #5c3b6d;
            --button-color: #8a5b9c;
            --button-hover: #7a4f8c;
            --error-color: #dc3545;
            --input-border: #e2d7e6;
            --input-background: #ffffff;
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
            background: linear-gradient(-45deg, #f8f5fa, #ffffff, #f8f5fa, #f1e9f4);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-container {
            width: 100%;
            max-width: 460px;
            height: 700px; /* Increased height */
            margin: 1rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(92, 59, 109, 0.15);
            overflow: hidden;
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: float 6s ease-in-out infinite;
            display: flex;
            flex-direction: column;
        }

        .logo-container {
            text-align: center;
            padding: 1rem 1rem 3rem 1rem; /* Increased padding */
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            height: 135px;
        }

        .logo-container img {
            width: 300px; /* Increased logo size */
            height: 150px;
            /* margin-bottom: 2rem; Increased margin */
        }

        .login-header {
            color: white;
            margin: -2.5rem 0;
            font-size: 1rem; /* Increased font size */
            font-weight: 500;
            animation: fadeInDown 1s ease-out;
        }

        .login-body {
            padding: 3rem 2rem; /* Increased padding */
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 2rem; /* Increased margin */
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
            padding: 1.25rem 1.25rem; /* Increased padding */
            border: 2px solid var(--input-border);
            border-radius: 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--input-background);
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(192, 151, 209, 0.1);
            transform: translateY(-2px);
        }

        .form-control.is-invalid {
            border-color: var(--error-color);
        }

        .invalid-feedback {
            color: var(--error-color);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: block;
        }

        .btn {
            width: 100%;
            padding: 1.25rem; /* Increased padding */
            border: none;
            border-radius: 16px;
            font-weight: 600;
            font-size: 1.1rem; /* Increased font size */
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--button-color);
            color: white;
            margin-bottom: 3rem; /* Added margin to separate from create account */
        }

        .btn-primary:hover {
            background: var(--button-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(138, 91, 156, 0.2);
        }

        .create-account-container {
            text-align: center;
            margin-top: auto; /* Push to bottom of available space */
        }

        .btn-secondary {
            display: inline-block;
            background: transparent;
            border: 2px solid var(--button-color);
            color: var(--button-color);
            padding: 0.75rem 2rem;
            width: auto; /* Allow button to size to content */
            margin: 0 auto; /* Center the button */
            text-decoration: none;

        }

        .btn-secondary:hover {
            background: rgba(138, 91, 156, 0.1);
            transform: translateY(-2px);
        }

        @media (max-height: 800px) {
            .login-container {
                height: auto;
                min-height: 600px;
            }
            
            .logo-container {
                padding: 2rem 1rem;
            }
            
            .logo-container img {
                width: 120px;
            }
            
            .login-header {
                font-size: 1.75rem;
            }
            
            .login-body {
                padding: 2rem;
            }
        }

        @media (max-width: 768px) {
            .login-container {
                margin: 0.5rem;
                border-radius: 20px;
                height: auto;
                min-height: 600px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container animate__animated animate__fadeIn">
        <div class="logo-container">
            <img src="{{ asset ('front-assets')}}/images/icons/1234.png" alt="Logo">
            <h1 class="login-header">Welcome Back</h1>
        </div>
        <div class="login-body">
            <form method="POST" action="{{ route('user.check') }}">
                @csrf
                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">Email Address</label>
                        <input id="email" type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" 
                               required autocomplete="email" autofocus
                               placeholder="Enter your email">
                        @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">Password</label>
                        <input id="password" type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password"
                               placeholder="Enter your password">
                        @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if ($errors->has('errorResponse'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('errorResponse') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Sign In
                </button>

                @if (Route::has('register'))
                    <div class="create-account-container">
                        <a href="{{ route('user.register') }}" class="btn btn-secondary" >
                            Create New Account
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>
</html>