@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Judul Informasi -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">{{ $info->title }}</h1>
    </div>

    <!-- Konten Informasi -->
    <div class="card shadow-lg rounded-5 border-0 mb-5 animate__animated animate__fadeInUp position-relative info-card">
        <div class="card-body p-5">
            <p class="lead text-muted text-center">{{ $info->content }}</p>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center">
        <a href="{{ route('info.index') }}" 
           class="btn btn-outline-secondary rounded-pill px-4 py-2 back-button">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Informasi
        </a>
    </div>
</div>

<!-- CSS di Blade -->
<style>
    /* Card dengan efek background */
    .info-card {
        background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
        overflow: hidden;
    }

    /* Efek Hover pada Tombol Kembali */
    .back-button {
        transition: all 0.3s ease-in-out;
    }

    .back-button:hover {
        background-color: #6c757d;
        color: white;
        transform: scale(1.05);
    }

    /* Animasi Scroll */
    .animate__animated {
        animation-duration: 0.8s;
    }

    /* Responsif */
    @media (max-width: 576px) {
        .card-body {
            padding: 2rem;
        }

        .display-4 {
            font-size: 2rem;
        }

        .back-button {
            width: 100%; /* Tombol full width di layar kecil */
        }
    }
</style>
@endsection
