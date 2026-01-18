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
                <h1 class="auth-title">Welcome Back!</h1>
                <p class="auth-subtitle">Login to continue your journey</p>
                
                @if(session('error'))
                    <div class="auth-error-message">
                        {{ session('error') }}
                    </div>
                @endif
                
                <form action="{{ route('login') }}" method="POST" class="auth-form">
                    @csrf
                    
                    <div class="auth-input-group">
                        <label for="email" class="auth-label">Email</label>
                        <input 
                            type="text" 
                            name="email" 
                            id="email"
                            placeholder="your@email.com" 
                            value="{{ old('email') }}"
                            class="auth-input @error('email') input-error @enderror"
                        >
                        @error('email')
                            <div class="auth-error">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="auth-input-group">
                        <label for="password" class="auth-label">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            placeholder="••••••••" 
                            class="auth-input @error('password') input-error @enderror"
                        >
                        @error('password')
                            <div class="auth-error">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="auth-button">Login</button>
                    
                    <p class="auth-link-text">
                        Don't have an account? 
                        <a href="{{ route('register') }}" class="auth-link">Register here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection