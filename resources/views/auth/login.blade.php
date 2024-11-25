@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4 animate__animated animate__fadeInDown">Login</h2>

            <!-- Flash Message -->
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeInUp" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Login Card -->
            <div class="card shadow-lg rounded-4 border-0 login-card">
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login.store') }}" class="animate__animated animate__fadeInUp">
                        @csrf

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" id="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" id="password" 
                                       class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Login Button -->
                        <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3 py-2 login-btn">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>

                        <!-- Register Link -->
                        <p class="text-center mt-4 mb-0">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-decoration-none register-link">Register</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS di Blade -->
<style>
    /* Login Card */
    .login-card {
        background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .login-card:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    /* Login Button Hover */
    .login-btn {
        transition: background-color 0.3s, transform 0.2s;
    }

    .login-btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* Register Link Hover */
    .register-link {
        transition: color 0.3s;
    }

    .register-link:hover {
        color: #0056b3;
    }

    /* Input Group Hover Effect */
    .input-group-text {
        transition: background-color 0.3s;
    }

    .input-group-text:hover {
        background-color: #e9ecef;
    }

    /* Responsif */
    @media (max-width: 576px) {
        .login-card {
            padding: 1rem;
        }

        .btn {
            width: 100%; /* Tombol full width di mobile */
        }
    }
</style>
@endsection
