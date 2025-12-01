@extends('layouts.app')

@section('title', 'Login - CYPRUS EXPRESS')

@section('content')
    <!-- Page Header -->
    <section class="bg-gradient-to-r from-[#FF6B35] via-[#FF8FA3] to-[#FF6B35] py-12">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-white text-center">Welcome Back</h1>
            <p class="text-white/90 text-center mt-2">Sign in to your account</p>
        </div>
    </section>

    <!-- Login Form -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-8">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <p class="text-sm text-green-800">{{ session('status') }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('Email') }}
                            </label>
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus 
                                autocomplete="username"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('email') border-red-500 @enderror"
                            >
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('Password') }}
                            </label>
                            <input 
                                id="password" 
                                type="password" 
                                name="password" 
                                required 
                                autocomplete="current-password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:border-transparent @error('password') border-red-500 @enderror"
                            >
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                name="remember"
                                class="w-4 h-4 text-[#FF6B35] border-gray-300 rounded focus:ring-[#FF6B35]"
                            >
                            <label for="remember_me" class="ml-2 text-sm text-gray-600">
                                {{ __('Remember me') }}
                            </label>
                        </div>

                        <div class="flex items-center justify-between">
                            @if (Route::has('password.request'))
                                <a 
                                    href="{{ route('password.request') }}" 
                                    class="text-sm text-[#FF6B35] hover:text-[#FF8FA3] transition-colors"
                                >
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <button 
                            type="submit"
                            class="w-full bg-[#FF6B35] text-white py-3 px-4 rounded-lg font-semibold hover:bg-[#FF8FA3] transition-colors focus:outline-none focus:ring-2 focus:ring-[#FF6B35] focus:ring-offset-2"
                        >
                            {{ __('Log in') }}
                        </button>

                        <div class="text-center mt-6">
                            <p class="text-sm text-gray-600">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="text-[#FF6B35] hover:text-[#FF8FA3] font-semibold transition-colors">
                                    Register here
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
