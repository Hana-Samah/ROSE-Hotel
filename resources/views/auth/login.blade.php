<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
        /* CSS to style Google Login Button */
.login-container {
    text-align: right; /* Center the container */
    margin-top: 20px; /* Add space above the button */
}

.google-login-button {
    display: inline-block;
    padding: 10px 20px; /* Padding inside the button */
    font-size: 16px; /* Font size */
    font-weight: bold; /* Bold text */
    color: #fff; /* Text color */
    background-color: #A52A2A; /* Google red color */
    border: none; /* Remove border */
    border-radius: 5px; /* Rounded corners */
    text-decoration: none; /* Remove underline */
    transition: background-color 0.3s ease; /* Smooth background color transition */
}


    </style>
</head>
<body>
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{ '/' }}">
                <img src="/images/logo.png" alt="#" style="width: 70px; height: 65px; padding-top:0" />
            </a>
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4" style="background-color: #A52A2A; border-color: #A52A2A;">
                    {{ __('Log in') }}
                </x-button>
            </div>
            
            <!-- Google Login Button -->
            <div class="login-container mt-4">
                <a href="{{ url('auth/google') }}" class="google-login-button">Login with Google</a>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> 
</body>
</html>
