@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4 animate__animated animate__fadeInDown">Register</h2>

            <!-- Flash Message -->
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeInUp" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Register Card -->
            <div class="card shadow-lg border-0 rounded-4 register-card">
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('register.store') }}" class="animate__animated animate__fadeInUp">
                        @csrf

                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input type="text" name="name" id="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" id="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" id="password" 
                                       class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Register Button -->
                        <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3 register-btn">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </button>

                        <!-- Login Link -->
                        <p class="text-center mt-4">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="text-decoration-none login-link">Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS Langsung di Blade -->
<style>
    /* Card Hover Effect */
    .register-card {
        background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .register-card:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    /* Register Button Hover */
    .register-btn {
        transition: background-color 0.3s, transform 0.2s;
    }

    .register-btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    /* Input Group Hover */
    .input-group-text {
        transition: background-color 0.3s;
    }

    .input-group-text:hover {
        background-color: #e9ecef;
    }

    /* Login Link Hover */
    .login-link:hover {
        color: #0056b3;
        transition: color 0.3s;
    }

    /* Responsif */
    @media (max-width: 576px) {
        .register-card {
            padding: 1rem;
        }

        .btn {
            width: 100%; /* Full-width button di mobile */
        }
    }
</style>
@endsection
