@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Judul Halaman -->
    <h1 class="text-center mb-5 animate__animated animate__fadeInDown">Daftar Agenda</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($agendas as $agenda)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden animate-on-scroll position-relative">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title fw-bold text-truncate">{{ $agenda->title }}</h5>
                            <p class="text-muted">{{ Str::limit($agenda->description, 120, '...') }}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="badge text-white" style="background-color: #0d6efd;">
                                <i class="fas fa-calendar-alt me-2"></i>{{ $agenda->event_date->format('d M Y') }}
                            </span>
                            <a href="{{ route('agenda.show', $agenda->id) }}" 
                               class="btn btn-outline-primary rounded-pill agenda-btn">
                                <i class="fas fa-arrow-right"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- CSS Langsung di Blade -->
<style>
    /* Efek Hover pada Card */
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    /* Efek Hover pada Tombol */
    .agenda-btn {
        transition: background-color 0.3s ease, transform 0.2s;
    }

    .agenda-btn:hover {
        background-color: #0d6efd;
        color: white;
        transform: scale(1.1);
    }

    /* Animasi Scroll */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .animate-on-scroll.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsif */
    @media (max-width: 576px) {
        .agenda-btn {
            width: 100%; /* Tombol full width di layar kecil */
        }

        .badge {
            font-size: 0.9rem;
        }
    }
    
</style>

<!-- JavaScript untuk Animasi Scroll -->
<script>
    const animateOnScroll = () => {
        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                el.classList.add('show');
            }
        });
    };

    window.addEventListener('scroll', animateOnScroll);
    document.addEventListener('DOMContentLoaded', animateOnScroll);
</script>
@endsection
