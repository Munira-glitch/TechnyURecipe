<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center px-6 py-12 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <!-- Logo -->
            <div class="flex justify-center">
                <img class="h-12 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            </div>

            <!-- Title -->
            <h2 class="mt-6 text-center text-2xl font-bold text-gray-900 dark:text-gray-100">Sign in to your account</h2>

            <!-- Session Status -->
            @if (session('status'))
                <div class="text-green-600 text-sm text-center">{{ session('status') }}</div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center">
                        <input type="checkbox" id="remember_me" name="remember"
                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-500">
                        Log in
                    </button>
                </div>

                <!-- Register Link -->
                <p class="mt-6 text-center text-sm text-gray-500">
                    Not a member? <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Create an account</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>
