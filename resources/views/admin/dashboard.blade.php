@extends('layouts.admin')

@section('content')
<div class="container-fluid my-5">
    <!-- Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <h1 class="display-6 fw-bold text-center text-md-start mb-3 mb-md-0">Admin Dashboard</h1>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary rounded-pill">
            <i class="fas fa-home me-2"></i>Back to Home
        </a>
    </div>

    <!-- Summary Cards -->
    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 shadow border-0 rounded-4">
                <div class="card-body text-center text-md-start">
                    <h5 class="card-title"><i class="fas fa-users me-2"></i>Users</h5>
                    <p class="card-text">Manage and view all registered users.</p>
                    <p class="text-muted">Total: <strong>{{ $usersCount }}</strong> users</p>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100 rounded-pill">
                        <i class="fas fa-arrow-right me-2"></i>Go to Users
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 shadow border-0 rounded-4">
                <div class="card-body text-center text-md-start">
                    <h5 class="card-title"><i class="fas fa-images me-2"></i>Galleries</h5>
                    <p class="card-text">Create, update, or delete galleries with ease.</p>
                    <p class="text-muted">Total: <strong>{{ $galleriesCount }}</strong> galleries</p>
                    <a href="{{ route('dashboard.galleries.index') }}" class="btn btn-outline-primary w-100 rounded-pill">
                        <i class="fas fa-arrow-right me-2"></i>Manage Galleries
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 shadow border-0 rounded-4">
                <div class="card-body text-center text-md-start">
                    <h5 class="card-title"><i class="fas fa-info-circle me-2"></i>Infos</h5>
                    <p class="card-text">Manage informational content and updates.</p>
                    <p class="text-muted">Total: <strong>{{ $infosCount }}</strong> infos</p>
                    <a href="{{ route('dashboard.infos.index') }}" class="btn btn-outline-primary w-100 rounded-pill">
                        <i class="fas fa-arrow-right me-2"></i>Manage Infos
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 shadow border-0 rounded-4">
                <div class="card-body text-center text-md-start">
                    <h5 class="card-title"><i class="fas fa-calendar-alt me-2"></i>Agendas</h5>
                    <p class="card-text">Oversee upcoming events and activities.</p>
                    <p class="text-muted">Total: <strong>{{ $agendasCount }}</strong> agendas</p>
                    <a href="{{ route('dashboard.agendas.index') }}" class="btn btn-outline-primary w-100 rounded-pill">
                        <i class="fas fa-arrow-right me-2"></i>Manage Agendas
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities Section -->
    <div class="mt-5">
        <h3 class="mb-4 text-center text-md-start"><i class="fas fa-bell me-2"></i>Recent Activities</h3>
        <ul class="list-group">
            @forelse ($recentUsers as $user)
                <li class="list-group-item d-flex flex-wrap justify-content-between align-items-center">
                    <span>New user registered: <strong>{{ $user->name }}</strong></span>
                    <span class="badge bg-primary rounded-pill mt-2 mt-md-0">{{ $user->created_at->diffForHumans() }}</span>
                </li>
            @empty
                <li class="list-group-item text-muted">No recent user registrations.</li>
            @endforelse

            @forelse ($recentGalleries as $gallery)
                <li class="list-group-item d-flex flex-wrap justify-content-between align-items-center">
                    <span>Gallery updated: <strong>{{ $gallery->title }}</strong></span>
                    <span class="badge bg-primary rounded-pill mt-2 mt-md-0">{{ $gallery->updated_at->diffForHumans() }}</span>
                </li>
            @empty
                <li class="list-group-item text-muted">No recent gallery updates.</li>
            @endforelse

            @forelse ($recentAgendas as $agenda)
                <li class="list-group-item d-flex flex-wrap justify-content-between align-items-center">
                    <span>New event added: <strong>{{ $agenda->title }}</strong></span>
                    <span class="badge bg-primary rounded-pill mt-2 mt-md-0">
                        {{ $agenda->created_at ? $agenda->created_at->diffForHumans() : 'Date not available' }}
                    </span>
                </li>
            @empty
                <li class="list-group-item text-muted">No recent events added.</li>
            @endforelse

            @forelse ($recentInfos as $info)
                <li class="list-group-item d-flex flex-wrap justify-content-between align-items-center">
                    <span>New info posted: <strong>{{ $info->title }}</strong></span>
                    <span class="badge bg-primary rounded-pill mt-2 mt-md-0">
                        {{ $info->created_at ? $info->created_at->diffForHumans() : 'Date not available' }}
                    </span>
                </li>
            @empty
                <li class="list-group-item text-muted">No recent info updates.</li>
            @endforelse
        </ul>
    </div>

    <!-- Footer Actions -->
    <div class="text-center mt-5">
        <p class="text-muted">Logged in as <strong>{{ Auth::user()->name }}</strong></p>
        <a href="{{ route('logout') }}" class="btn btn-danger rounded-pill">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </a>
    </div>
</div>
@endsection
