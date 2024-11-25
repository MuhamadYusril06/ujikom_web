<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Galeri Web')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-color: #f5f5f5;
            --text-color: #1a1a1a;
            --navbar-bg: #2e2e2e;
            --navbar-gradient: linear-gradient(90deg, #3a3a3a, #555, #3a3a3a);
            --btn-bg: #000;
            --btn-hover: #555;
            --btn-text: #fff;
            --nav-text-color: #fff; /* Teks navbar selalu putih di light mode */
            --nav-hover-bg: linear-gradient(135deg, #444, #666);
            --nav-active-bg: linear-gradient(135deg, #666, #888);
            --box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        [data-theme="dark"] {
            --bg-color: #1a1a1a;
            --text-color: #f5f5f5;
            --navbar-bg: #000;
            --navbar-gradient: linear-gradient(90deg, #111, #333, #111);
            --btn-bg: #444;
            --btn-hover: #666;
            --nav-text-color: #ccc; /* Teks navbar lebih terang di dark mode */
            --nav-hover-bg: linear-gradient(135deg, #222, #444);
            --nav-active-bg: linear-gradient(135deg, #444, #666);
            --box-shadow: 0 8px 16px rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding-top: 85px;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar {
            background: var(--navbar-gradient);
            box-shadow: var(--box-shadow);
            padding: 1rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1050;
            transition: background-color 0.4s, box-shadow 0.3s;
        }

        .navbar-brand,
        .nav-link {
            color: var(--nav-text-color) !important;
            border-radius: 30px;
            transition: background-color 0.3s, transform 0.2s, color 0.3s;
        }

        .nav-link.active {
            background: var(--nav-active-bg);
            color: var(--btn-text) !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .nav-link:hover {
            background: var(--nav-hover-bg);
            color: var(--btn-text) !important;
            transform: translateY(-3px);
        }

        .btn-primary {
            background-color: var(--btn-bg);
            color: var(--btn-text);
            border-radius: 30px;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--btn-hover);
            transform: scale(1.1);
            box-shadow: var(--box-shadow);
        }

        .dark-mode-toggle {
            cursor: pointer;
            font-size: 1.8rem;
            margin-right: 20px;
            transition: color 0.3s, transform 0.3s;
        }

        .dark-mode-toggle:hover {
            transform: rotate(20deg);
            color: var(--nav-active-bg);
        }

        footer {
            background-color: var(--navbar-bg);
            color: var(--btn-text);
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }

        @media (max-width: 768px) {
            .navbar-brand img {
                height: 35px;
            }

            .nav-link {
                padding: 0.6rem 1rem;
            }
        }

        .social-link {
        color: inherit;
        transition: transform 0.3s, color 0.3s;
    }

    .social-link:hover {
        color: #ddd; /* Warna ikon saat hover */
        transform: scale(1.2); /* Efek zoom halus */
    }

    @media (max-width: 576px) {
        .social-icons {
            gap: 10px;
        }

        .footer-content {
            padding: 1rem;
        }
    }
    
        
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="https://pjj.smkn4bogor.sch.id/pluginfile.php/1/core_admin/logocompact/300x300/1662946883/LOGO%20SMKN%204.png" 
                     alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('info.index') ? 'active' : '' }}" href="{{ route('info.index') }}">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}" href="{{ route('agenda.index') }}">Agenda</a>
                    </li>
                    @auth
                    @if (Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">Dashboard</a>
                    </li>
                    @endif
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <i class="fas fa-moon dark-mode-toggle" id="darkModeToggle"></i>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-decoration-none w-100 text-start">Keluar</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item ms-2">
                        <a class="btn btn-primary" href="{{ route('login') }}">Masuk</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer style="
    background-color: var(--navbar-bg); 
    color: var(--btn-text); 
    padding: 2rem 1rem; 
    text-align: center;
    ">
    <div class="footer-content" style="
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        gap: 15px;
        max-width: 800px;
        margin: 0 auto;
    ">
        <p style="margin: 0;">&copy; 2024 Galeri Web. Semua Hak Dilindungi.</p>
        
        <div class="social-icons" style="
            display: flex; 
            gap: 20px; 
            justify-content: center;
        ">
            <a href="https://web.facebook.com/people/SMK-NEGERI-4-KOTA-BOGOR/100054636630766/" target="_blank" aria-label="Facebook" 
               class="social-link" style="font-size: 1.8rem;">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.instagram.com/smkn4kotabogor/" target="_blank" aria-label="Instagram" 
               class="social-link" style="font-size: 1.8rem;">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://smkn4bogor.sch.id/" target="_blank" aria-label="Chrome" 
               class="social-link" style="font-size: 1.8rem;">
                <i class="fab fa-chrome"></i>
            </a>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>

    <script>
        const toggle = document.getElementById('darkModeToggle');
        const body = document.body;

        if (localStorage.getItem('theme') === 'dark') {
            body.setAttribute('data-theme', 'dark');
            toggle.classList.replace('fa-moon', 'fa-sun');
        }

        toggle.addEventListener('click', () => {
            const isDarkMode = body.hasAttribute('data-theme');
            if (isDarkMode) {
                body.removeAttribute('data-theme');
                localStorage.removeItem('theme');
                toggle.classList.replace('fa-sun', 'fa-moon');
            } else {
                body.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
                toggle.classList.replace('fa-moon', 'fa-sun');
            }
        });
    </script>
</body>

</html>
