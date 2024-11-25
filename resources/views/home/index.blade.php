@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="hero-section text-center my-5">
        <h1 class="display-3 fw-bold text-gradient animate__animated animate__fadeInDown">
            Selamat Datang di Galeri Web
        </h1>
        <p class="lead mt-2 animate__animated animate__fadeInUp">
            {{ $welcomeMessage ?? 'Temukan koleksi terbaik kami dan jelajahi informasi menarik lainnya!' }}
        </p>
        <a href="{{ route('gallery.index') }}" class="btn btn-primary btn-lg mt-4 animate__animated animate__zoomIn shadow">
            <i class="fas fa-images me-2"></i> Jelajahi Galeri
        </a>
    </div>

    <!-- Informasi & Agenda Section -->
    <div class="row text-center mt-5 animate__animated animate__fadeIn">
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg h-100 border-0 rounded-4 overflow-hidden">
                <div class="card-body">
                    <h3 class="card-title text-gradient"><i class="fas fa-info-circle me-2"></i>Informasi Terbaru</h3>
                    <p class="card-text text-muted">Dapatkan berita dan informasi terbaru seputar acara dan kegiatan terkini.</p>
                    <a href="{{ route('info.index') }}" class="btn btn-outline-primary rounded-pill mt-3">
                        <i class="fas fa-newspaper me-1"></i> Lihat Informasi
                    </a>
                </div>
                <div class="card-footer bg-light border-0 text-muted">
                    <small><i class="fas fa-clock me-1"></i> Updated regularly</small>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card shadow-lg h-100 border-0 rounded-4 overflow-hidden">
                <div class="card-body">
                    <h3 class="card-title text-gradient"><i class="fas fa-calendar-alt me-2"></i>Agenda Kegiatan</h3>
                    <p class="card-text text-muted">Lihat agenda kegiatan mendatang dan jangan lewatkan acara menarik kami.</p>
                    <a href="{{ route('agenda.index') }}" class="btn btn-outline-primary rounded-pill mt-3">
                        <i class="fas fa-calendar-day me-1"></i> Lihat Agenda
                    </a>
                </div>
                <div class="card-footer bg-light border-0 text-muted">
                    <small><i class="fas fa-calendar-check me-1"></i> Check out the latest events</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="my-5 animate__animated animate__fadeInUp">
    <h4 class="text-center mb-4">Lokasi</h4>
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.5204188173674!2d106.824694!3d-6.640733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1635174157107!5m2!1sid!2sid" 
            width="100%" 
            height="300" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>




    <!-- Footer CTA Section -->
    <div class="text-center mt-5 animate__animated animate__fadeInUp">
    <h4 class="mb-3">Ayo Bergabung dengan Kami!</h4>
    <p>Jelajahi lebih banyak fitur dan berinteraksi dengan komunitas kami.</p>
    <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow">
        <i class="fas fa-user-plus me-2"></i> Daftar Sekarang
    </a>
</div>


<!-- Custom CSS for Hover Effect -->
<style>
    .map-container {
        width: 100%;
        height: 300px;
        overflow: hidden;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .map-container:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
