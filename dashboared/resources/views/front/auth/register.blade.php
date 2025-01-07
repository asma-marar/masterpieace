<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fashion Store Registration</title>
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

/* Keep animations */
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
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow-x: hidden;
    padding: 1rem 0;
}

.registration-container {
    width: 100%;
    max-width: 560px;
    margin: 0.5rem;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
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
    padding: 0.5rem 1rem 2rem 1rem;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    height: 120px;
}

.logo-container img {
    width: auto;
    height: 140px;
    margin-top: -0.5rem;
}

.registration-header {
    color: white;
    margin: -1.5rem 0;
    font-size: 1.75rem;
    font-weight: 700;
    animation: fadeInDown 1s ease-out;
}

.registration-body {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.form-row {
    display: flex;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.form-group {
    flex: 1;
    margin-bottom: 1rem;
    animation: fadeInUp 0.5s ease-out;
}

.form-row .form-group {
    margin-bottom: 0;
}

.input-wrapper {
    position: relative;
}

.input-label {
    position: absolute;
    left: 1rem;
    top: -0.6rem;
    background: white;
    padding: 0 0.5rem;
    font-size: 0.8rem;
    color: var(--primary-color);
    font-weight: 500;
    z-index: 1;
}

.form-control {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid var(--input-border);
    border-radius: 12px;
    font-size: 0.95rem;
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

.btn {
    width: 100%;
    padding: 1rem;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-primary {
    background: var(--button-color);
    color: white;
    margin-bottom: 1rem;
}

.login-link-container{
    text-align: center;
    margin-top: auto; /* Push to bottom of available space */
}

.btn-secondary {
    display: inline-block;
    background: transparent;
    border: 2px solid var(--button-color);
    color: var(--button-color);
    padding: 0.5rem 1.5rem;
    width: auto;
    margin: 0 auto;
    font-size: 0.9rem;
    text-decoration: none;
}

/* Keep media query */
@media (max-width: 768px) {
    .registration-container {
        margin: 0.5rem;
        border-radius: 16px;
    }

    .form-row {
        flex-direction: column;
        gap: 1rem;
    }
}
    </style>
</head>
<body>
    <div class="registration-container animate__animated animate__fadeIn">
        <div class="logo-container">
            <img src="{{ asset ('front-assets')}}/images/icons/1234.png" alt="Logo">
            <h1 class="registration-header">Create Account</h1>
        </div>
        <div class="registration-body">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <label class="input-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   name="name" value="{{ old('name') }}" required 
                                   placeholder="Enter your email">
                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required 
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
                        <label class="input-label">Phone Number</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                               name="phone" value="{{ old('phone') }}" required 
                               placeholder="+9627XXXXXXXX">
                        @error('phone')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" 
                               name="address" value="{{ old('address') }}" required 
                               placeholder="Enter your address">
                        @error('address')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrapper">
                        <label class="input-label">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" 
                               name="city" value="{{ old('city') }}" required 
                               placeholder="Enter your city">
                        @error('city')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <label class="input-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required placeholder="Enter your password">
                            @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <label class="input-label">Confirm Password</label>
                            <input type="password" class="form-control" 
                                   name="password_confirmation" required 
                                   placeholder="Confirm your password">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Register
                </button>

                <div class="login-link-container">
                    <a href="{{ route('user.login') }}" class="btn btn-secondary">
                        Already have an account? Sign In
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>