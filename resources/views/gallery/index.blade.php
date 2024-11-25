@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5 animate__animated animate__fadeInDown">Galeri Kami</h1>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($galleries as $gallery)
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-5 overflow-hidden position-relative gallery-card animate-on-scroll">

                <!-- Cek apakah galeri memiliki foto -->
                @if ($gallery->photos->isNotEmpty())
                <div class="gallery-img-wrapper">
                    <img src="{{ $gallery->photos->first()->image_url }}"
                        class="card-img-top lazyload animate__animated"
                        alt="{{ $gallery->title }}"
                        style="object-fit: cover; height: 250px;"
                        loading="lazy">
                    <!-- Overlay -->
                    <div class="overlay">
                        <i class="fas fa-eye fa-3x text-white animate__animated animate__fadeIn"></i>
                    </div>
                </div>
                @else
                <img src="https://via.placeholder.com/300x250"
                    class="card-img-top lazyload animate__animated"
                    alt="No Image Available"
                    style="object-fit: cover; height: 250px;"
                    loading="lazy">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold text-truncate animate__animated animate__fadeInUp">{{ $gallery->title }}</h5>
                    <p class="text-muted">Total Foto:
                        <span class="badge bg-secondary text-white">{{ $gallery->photos->count() }}</span>
                    </p>
                    <a href="{{ route('gallery.show', ['gallery' => $gallery->id]) }}"
                        class="btn btn-primary w-100 rounded-pill mt-2 animate__animated animate__pulse">
                        <i class="fas fa-images me-2"></i> Lihat Galeri
                    </a>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- CSS Langsung di Blade -->
<style>
    /* Gallery Image Wrapper */
    .gallery-img-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }

    .gallery-img-wrapper img {
        transition: transform 0.4s ease-in-out;
    }

    .gallery-img-wrapper img:hover {
        transform: scale(1.1);
        /* Zoom in saat hover */
    }

    /* Overlay Effect */
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
        border-radius: 10px;
    }

    .gallery-img-wrapper:hover .overlay {
        opacity: 1;
        /* Tampilkan overlay saat hover */
    }

    /* Card Hover Effect */
    .card:hover {
        transform: scale(1.03);
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Animasi Fade dan Zoom saat Scroll */
    .animate-on-scroll {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .animate-on-scroll.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Responsive Design */
    @media (max-width: 576px) {
        .gallery-img-wrapper {
            border-radius: 5px;
        }

        .overlay i {
            font-size: 2rem;
            /* Kecilkan ikon di layar kecil */
        }

        .card {
            margin-bottom: 1rem;
        }
    }
</style>

<!-- JavaScript untuk Animasi Scroll -->
<script>
    // Fungsi untuk menambahkan class "show" saat elemen masuk viewport
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate-on-scroll');
        elements.forEach((el) => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                el.classList.add('show');
            }
        });
    };

    // Panggil fungsi saat halaman di-scroll
    window.addEventListener('scroll', animateOnScroll);
    // Panggil saat pertama kali halaman dimuat
    document.addEventListener('DOMContentLoaded', animateOnScroll);
</script>
@endsection