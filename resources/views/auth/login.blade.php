@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="textbox">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="textbox">
                    <input id="password" type="password" name="password" required placeholder="Password">
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="remember_me">
                    <input type="checkbox" id="remember_me" name="remember">
                    <span>Remember me</span>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

            {{-- <div class="login-footer">
                <a href="{{ route('password.request') }}">Forgot Password?</a> | 
                <a href="{{ route('register') }}">Sign Up</a>
            </div> --}}
        </div>
    </div>
@endsection
