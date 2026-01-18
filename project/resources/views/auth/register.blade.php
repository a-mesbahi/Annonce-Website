@extends('layouts.app')

@section('content')
<div class="auth-page">
    <!-- Decorative shapes -->
    <div class="deco-shape deco-shape-1"></div>
    <div class="deco-shape deco-shape-2"></div>
    <div class="deco-shape deco-shape-3"></div>
    <div class="deco-shape deco-shape-4"></div>
    <div class="deco-star deco-star-1">✦</div>
    <div class="deco-star deco-star-2">✧</div>
    <div class="deco-star deco-star-3">✦</div>
    
    <div class="auth-container">
        <div class="auth-card">
            <h1 class="auth-title">Join Us!</h1>
            <p class="auth-subtitle">Create your account and start posting</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="auth-form-group">
                    <label for="name" class="auth-label">Name</label>
                    <input 
                        type="text" 
                        id="name"
                        name="name" 
                        class="auth-input" 
                        placeholder="Your full name"
                        value="{{ old('name') }}"
                        required>
                    @error('name')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="auth-form-group">
                    <label for="username" class="auth-label">Username</label>
                    <input 
                        type="text" 
                        id="username"
                        name="username" 
                        class="auth-input" 
                        placeholder="Choose a username"
                        value="{{ old('username') }}"
                        required>
                    @error('username')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="auth-form-group">
                    <label for="email" class="auth-label">Email</label>
                    <input 
                        type="email" 
                        id="email"
                        name="email" 
                        class="auth-input" 
                        placeholder="your.email@example.com"
                        value="{{ old('email') }}"
                        required>
                    @error('email')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="auth-form-group">
                    <label for="password" class="auth-label">Password</label>
                    <input 
                        type="password" 
                        id="password"
                        name="password" 
                        class="auth-input" 
                        placeholder="Create a strong password"
                        required>
                    @error('password')
                        <div class="auth-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="auth-form-group">
                    <label for="password_confirmation" class="auth-label">Confirm Password</label>
                    <input 
                        type="password" 
                        id="password_confirmation"
                        name="password_confirmation" 
                        class="auth-input" 
                        placeholder="Type your password again"
                        required>
                </div>

                <button type="submit" class="auth-button">Create Account</button>

                <p class="auth-footer">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="auth-link">Login here</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection