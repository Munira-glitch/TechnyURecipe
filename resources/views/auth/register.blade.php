<x-guest-layout>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: white;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-box {
            width: 100%;
            height: 100vh;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            padding: 0 20px;
        }

        .form-wrapper {
            width: 100%;
            max-width: 500px;
            padding: 30px 30px 20px 30px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-wrapper img {
            height: 50px;
            margin: 0 auto 20px auto;
            display: block;
        }

        .form-wrapper h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #111;
            font-size: 26px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #fdfdfd;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #4f46e5;
            outline: none;
        }

        .error-message {
            color: #e3342f;
            font-size: 13px;
            margin-top: 4px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .login-link {
            font-size: 13px;
            color: #555;
            text-decoration: none;
        }

        .login-link:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        button {
            padding: 10px 20px;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4338ca;
        }

        @media (max-width: 600px) {
            .form-wrapper {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }

            .login-link {
                text-align: center;
            }

            button {
                width: 100%;
            }
        }
    </style>

    <div class="register-box">
        <div class="form-wrapper">
           
            <img src="http://technyon.io/wp-content/uploads/2018/01/TECHNYON-BANNER-2022-site.png" alt="Your Company">

            <h2>Create an Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="actions">
                    <a class="login-link" href="{{ route('login') }}">
                        Already registered?
                    </a>
                    <button type="submit">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
