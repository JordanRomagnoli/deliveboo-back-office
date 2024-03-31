@extends('layouts.guest')

@section('page-title', 'Registration')

@section('main-content')
    <section class="registration">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name">
                    Name
                </label>
                <input type="text" id="name" name="name">
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email">
                    Email
                </label>
                <input type="email" id="email" name="email">
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">
                    Password
                </label>
                <input type="password" id="password" name="password">
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">
                    Conferma Password
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <div>
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <button class="login-button" type="submit">
                Register
            </button>
        </form>
    </section>
@endsection
