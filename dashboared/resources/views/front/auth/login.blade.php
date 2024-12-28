<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fashion Store Login</title>
    <style>
        :root {
            --primary-color: #8B5E3C;
            --primary-hover: #704B30;
            --background-color: #F5E6D3;
            --secondary-background: #FFFFFF;
            --accent-color: #D2691E;
            --text-color: #2C1810;
            --error-color: #A94442;
            --input-border: #DBC1AC;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--background-color);
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            margin: 2rem;
            background: var(--secondary-background);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(139, 94, 60, 0.1);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .login-body {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-color);
            font-weight: 600;
            font-size: 0.875rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid var(--input-border);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(139, 94, 60, 0.1);
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

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            padding: calc(1rem - 2px);
        }

        .btn-secondary:hover {
            background-color: rgba(139, 94, 60, 0.1);
        }

        .btn-link {
            color: var(--text-color);
            font-size: 0.875rem;
            text-decoration: none;
            text-align: center;
            padding: 0.5rem;
            margin-top: 0.5rem;
        }

        .btn-link:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .login-container {
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="login-header">Welcome Back</h1>
        <div class="login-body">
            <form method="POST" action="{{ route('user.check') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="Enter your email">
                    @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
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

                <div class="button-container">
                    <button type="submit" class="btn btn-primary">
                        Sign In
                    </button>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary">
                            Create New Account
                        </a>
                    @endif

                    @if (Route::has('password.request'))
                        <a class="btn-link" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>