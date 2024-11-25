@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Judul Galeri -->
    <h1 class="text-center mb-5 animate__animated animate__fadeInDown">{{ $gallery->title }}</h1>

    <!-- Galeri Foto -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($gallery->photos as $photo)
        <div class="col">
            <div class="card h-100 shadow-lg border-0 rounded-5 overflow-hidden position-relative photo-card animate-on-scroll">
                <!-- Gambar Foto -->
                <div class="photo-wrapper position-relative">
                    <img src="{{ $photo->image_url }}" 
                         class="card-img-top lazyload" 
                         alt="{{ $photo->title }}" 
                         loading="lazy"
                         style="object-fit: cover; height: 250px; transition: transform 0.5s ease;">
                    <!-- Overlay -->
                    <div class="overlay">
                        <i class="fas fa-search-plus fa-3x text-white animate__animated animate__fadeIn"></i>
                    </div>
                </div>

                <!-- Informasi Foto -->
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title fw-bold text-truncate">{{ $photo->title }}</h5>
                    </div>
                    <a href="{{ route('photos.show', $photo->id) }}" 
                       class="btn btn-outline-primary w-100 rounded-pill mt-3 align-self-end animate__animated animate__pulse">
                        <i class="fas fa-images me-2"></i> View Photo
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- CSS Langsung di Blade -->
<style>
    /* Efek Zoom pada Gambar */
    .photo-wrapper {
        overflow: hidden;
        border-radius: 10px 10px 0 0;
    }

    .photo-wrapper img {
        transition: transform 0.4s ease-in-out;
    }

    .photo-wrapper:hover img {
        transform: scale(1.1); /* Zoom in saat hover */
    }

    /* Overlay Efek */
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
    }

    .photo-wrapper:hover .overlay {
        opacity: 1; /* Overlay muncul saat hover */
    }

    /* Animasi Fade dan Hover pada Card */
    .photo-card:hover {
        transform: scale(1.03);
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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
        .photo-wrapper {
            border-radius: 5px;
        }

        .overlay i {
            font-size: 2rem;
        }

        .photo-card {
            margin-bottom: 1rem;
        }
    }
</style>

<!-- JavaScript untuk Animasi Scroll -->
<script>
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate-on-scroll');
        elements.forEach((el) => {
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
