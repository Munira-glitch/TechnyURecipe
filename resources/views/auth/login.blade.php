<x-guest-layout>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: white;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            background-color: #f8f9fc;
        }

        .login-box {
            width: 100%;
            height: 100vh;
            padding: 40px 60px;
            box-sizing: border-box;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-box img {
            display: block;
            height: 50px;
            margin: 0 auto 20px auto;
        }

        .login-box h2 {
            text-align: center;
            color: #111;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fdfdfd;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4f46e5;
            outline: none;
        }

        .error-message {
            color: #e3342f;
            font-size: 13px;
            margin-top: 5px;
        }

        .checkbox-group {
            max-width: 400px;
            margin: -10px auto 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .checkbox-group label {
            font-size: 13px;
            color: #555;
            display: flex;
            align-items: center;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 6px;
        }

        .forgot-link a {
            font-size: 13px;
            color: #4f46e5;
            text-decoration: none;
        }

        .forgot-link a:hover {
            text-decoration: underline;
        }

        button {
            display: block;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            padding: 12px;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4338ca;
        }

        .register-link {
            text-align: center;
            font-size: 13px;
            margin-top: 20px;
            color: #555;
        }

        .register-link a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .status-message {
            text-align: center;
            color: green;
            font-size: 14px;
            margin-bottom: 15px;
        }

        @media (max-width: 600px) {
            .login-box {
                padding: 30px 20px;
            }

            .form-group,
            .checkbox-group,
            button {
                width: 100%;
                max-width: 100%;
            }
        }
    </style>

    <div class="login-container">
        <div class="login-box">
            <img src="http://technyon.io/wp-content/uploads/2018/01/TECHNYON-BANNER-2022-site.png" alt="Your Company">

            <h2>Sign in to your account</h2>

            @if (session('status'))
                <div class="status-message">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="checkbox-group">
                    <label for="remember_me">
                        <input type="checkbox" id="remember_me" name="remember">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <div class="forgot-link">
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit">Log in</button>
                </div>

                <div class="register-link">
                    Not a member?
                    <a href="{{ route('register') }}">Create an account</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
