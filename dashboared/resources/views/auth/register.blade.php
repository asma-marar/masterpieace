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

        .register-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(138, 91, 156, 0.1);
            overflow: hidden;
            display: flex;
            max-width: 1000px;
            margin: 0 auto;
        }

        .register-sidebar {
            background: #5c3b6d;
            padding: 40px;
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .register-sidebar h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #fff;
        }

        .register-sidebar p {
            color: #c097d1;
            text-align: center;
            font-size: 1.1rem;
        }

        .register-content {
            padding: 40px;
            width: 60%;
            background: white;
        }

        .register-header {
            margin-bottom: 30px;
            text-align: left;
        }

        .register-header h2 {
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
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: #5c3b6d;
            transform: translateY(-2px);
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .register-wrapper {
                flex-direction: column;
            }
            
            .register-sidebar,
            .register-content {
                width: 100%;
                padding: 30px;
            }
            
            .register-sidebar {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="register-wrapper">
        <div class="register-sidebar">
            <h1>LumiPick</h1>
            <p>Create your admin account to access the dashboard and manage your system.</p>
        </div>
        
        <div class="register-content">
            <div class="register-header">
                <h2>Create Account</h2>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" 
                           required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" 
                           required autocomplete="email">
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
                           name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" 
                           class="form-control" 
                           name="password_confirmation" 
                           required autocomplete="new-password">
                </div>

                <button type="submit" class="btn-primary">
                    Create Account
                </button>
            </form>
        </div>
    </div>
</div>
</body>
</html>