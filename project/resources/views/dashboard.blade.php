@extends('layouts.app')

@section('content')
<div class="dashboard-modern">
    <!-- Header -->
    <div class="dash-header">
        <div class="dash-welcome">
            <h1 class="dash-title">Dashboard</h1>
            <p class="dash-subtitle">Welcome back, <strong>{{ $user->username }}</strong>! 👋</p>
        </div>
        <a href="{{ route('Annonces') }}" class="dash-btn-new">
            <span>+ New Annonce</span>
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="dash-stats">
        <div class="dash-stat-card">
            <div class="stat-number">{{ $totalAnnonces }}</div>
            <div class="stat-label">Total Annonces</div>
        </div>

        <div class="dash-stat-card">
            <div class="stat-number">{{ $offerAnnonces }}</div>
            <div class="stat-label">Offers</div>
        </div>

        <div class="dash-stat-card">
            <div class="stat-number">{{ $requestAnnonces }}</div>
            <div class="stat-label">Requests</div>
        </div>
    </div>

    <!-- Recent Annonces -->
    <div class="dash-recent">
        <h2 class="dash-section-title">Recent Annonces</h2>
        @if($recentAnnonces->count() > 0)
            <div class="dash-grid">
                @foreach($recentAnnonces as $annonce)
                    <div class="dash-card">
                        <div class="dash-card-image" style="background-image: url('{{ $annonce->img_url }}');"></div>
                        <div class="dash-card-body">
                            <div class="dash-card-header">
                                <span class="dash-badge dash-badge-{{ $annonce->annonce_type }}">
                                    {{ ucfirst($annonce->annonce_type) }}
                                </span>
                                <span class="dash-time">{{ $annonce->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="dash-card-text">{{ Str::limit($annonce->body, 80) }}</p>
                            <div class="dash-card-actions">
                                <a href="{{ route('Annnoces.edit', ['annonce' => $annonce]) }}" class="dash-action-btn edit">
                                    Edit
                                </a>
                                <form action="{{ route('Annonces.destroy', ['annonce' => $annonce]) }}" method="POST" style="display: inline;" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dash-action-btn delete">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="dash-empty">
                <div class="empty-icon">📝</div>
                <h3 class="empty-title">No annonces yet</h3>
                <p class="empty-text">You haven't published any annonces yet</p>
                <a href="{{ route('Annonces') }}" class="dash-btn-new">Create your first annonce</a>
            </div>
        @endif
    </div>
</div>
@endsection