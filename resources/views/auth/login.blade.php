@extends('layouts.app')

@section('content')
<style>
    /* Minecraft-style background */
    body {
        background-image: url('{{ asset('assets/img/MC-5.jpg') }}'); 
        background-size: cover;
        background-position: center;
        font-family: 'Minecraft', sans-serif; /* Use a pixel-like font similar to Minecraft */
    }

    /* Center the container on the page */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; /* Ensure the container takes full height of the viewport */
    }

    .card {
        background-color: #fafafa; /* Light card background */
        border: 3px solid #000; /* Add a solid border to mimic Minecraft UI */
        width: 100%;
        max-width: 450px;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
    }

    .card-header {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        background-color: #4caf50; /* Minecraft green */
        color: white;
        padding: 10px;
    }

    /* Style for input fields */
    .form-control {
        border: 2px solid #000; /* Thicker border for Minecraft-like effect */
        background-color: #fff;
    }

    /* Style for buttons */
    .btn-primary {
        background-color: #107C10; /* Microsoft green button */
        border-color: #107C10;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0f6d0f; /* Darker green on hover */
    }

    .btn-secondary {
        background-color: #6c757d; /* Customize the color of the register button */
        border-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Darker shade on hover */
        border-color: #545b62;
    }

    .btn-microsoft {
        background-color: #2b78e4; /* Microsoft blue */
        color: white;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        border: none;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-microsoft img {
        height: 20px;
        margin-right: 10px;
    }

    .btn-microsoft:hover {
        background-color: #225ea0;
    }

    /* Additional style adjustments */
    .card-body {
        padding: 20px;
    }

    .form-check-label {
        font-size: 14px;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Login') }}</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-8 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                        <a class="btn btn-secondary" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>

                        <!-- Minecraft-styled Sign in with Microsoft button -->
                        <a >
                           
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
