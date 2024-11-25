@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Judul Agenda -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">{{ $agenda->title }}</h1>
    </div>

    <!-- Card Deskripsi Agenda -->
    <div class="card shadow-lg border-0 rounded-4 mb-5 animate__animated animate__fadeInUp">
        <div class="card-body p-4">
            <p class="lead text-muted text-center mb-0">{{ $agenda->description }}</p>
        </div>
    </div>

    <!-- Tanggal Agenda -->
    <div class="text-center mb-5">
        <span class="badge bg-primary py-2 px-3 rounded-pill fs-5 animate__animated animate__fadeIn">
            <i class="fas fa-calendar-alt me-2"></i> 
            {{ \Carbon\Carbon::parse($agenda->event_date)->format('d M Y') }}
        </span>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center">
        <a href="{{ route('agenda.index') }}" 
           class="btn btn-outline-secondary rounded-pill px-4 py-2 back-button">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Agenda
        </a>
    </div>
</div>

<!-- CSS di Blade -->
<style>
    /* Efek Hover pada Tombol Kembali */
    .back-button {
        transition: all 0.3s ease-in-out;
    }

    .back-button:hover {
        background-color: #6c757d;
        color: white;
        transform: scale(1.05);
    }

    /* Animasi Halus */
    .animate__animated {
        animation-duration: 0.8s;
    }

    /* Card Deskripsi */
    .card {
        background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    /* Responsif */
    @media (max-width: 576px) {
        .display-4 {
            font-size: 2rem;
        }

        .back-button {
            width: 100%; /* Tombol full width di layar kecil */
        }

        .badge {
            font-size: 1.2rem;
        }
    }
</style>
@endsection
