@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Judul Halaman -->
    <h1 class="text-center mb-5 animate__animated animate__fadeInDown">Daftar Informasi</h1>

    <!-- Daftar Informasi -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($infos as $info)
            <div class="col">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden position-relative animate-on-scroll">
                    <div class="card-body d-flex flex-column">
                        <!-- Judul Informasi -->
                        <h5 class="card-title fw-bold text-truncate">{{ $info->title }}</h5>
                        <!-- Konten Informasi -->
                        <p class="card-text text-muted mb-4">
                            {{ Str::limit($info->content, 100, '...') }}
                        </p>
                        <!-- Tombol Lihat Detail -->
                        <div class="mt-auto text-end">
                            <a href="{{ route('info.show', $info->id) }}" 
                               class="btn btn-outline-primary btn-sm rounded-pill">
                               <i class="fas fa-info-circle me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- CSS di Blade -->
<style>
    /* Efek Hover pada Card */
    .card {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Animasi Scroll */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .animate-on-scroll.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsif */
    @media (max-width: 576px) {
        .card {
            margin-bottom: 1rem;
        }

        .btn-sm {
            width: 100%; /* Tombol full width di mobile */
        }
    }
</style>

<!-- JavaScript -->
<script>
    // Animasi scroll: Munculkan elemen saat masuk viewport
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
