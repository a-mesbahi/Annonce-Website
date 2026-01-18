@extends('layouts.app')

@section('content')
<div class="show-modern">
    <!-- Back Button -->
    <a href="{{ route('Annonces') }}" class="show-back-btn">
        ← Back to Annonces
    </a>

    <div class="show-content">
        <!-- Image Section -->
        <div class="show-image-box">
            <div class="show-image" style="background-image: url('{{ $annonce->img_url }}');"></div>
            <div class="show-badge badge-{{ $annonce->annonce_type }}">
                {{ ucfirst($annonce->annonce_type) }}
            </div>
        </div>

        <!-- Details Section -->
        <div class="show-details-box">
            <!-- User Info -->
            <div class="show-user">
                <div class="show-avatar">{{ substr($annonce->user->username, 0, 1) }}</div>
                <div class="show-user-info">
                    <h3 class="show-username">{{ $annonce->user->username }}</h3>
                    <p class="show-time">Posted {{ $annonce->created_at->diffForHumans() }}</p>
                </div>
            </div>

            <!-- Description -->
            <div class="show-description">
                <h2 class="show-section-title">Description</h2>
                <p class="show-text">{{ $annonce->body }}</p>
            </div>

            <!-- Meta Info -->
            <div class="show-meta">
                <div class="show-meta-item">
                    <span class="meta-key">Type:</span>
                    <span class="meta-val">{{ ucfirst($annonce->annonce_type) }}</span>
                </div>
                <div class="show-meta-item">
                    <span class="meta-key">Published:</span>
                    <span class="meta-val">{{ $annonce->created_at->format('M d, Y') }}</span>
                </div>
            </div>

            <!-- Actions -->
            @can('edit', $annonce)
            <div class="show-actions">
                <a href="{{ route('Annnoces.edit', ['annonce' => $annonce]) }}" class="show-action-btn edit-btn">
                    Edit
                </a>
                <form action="{{ route('Annonces.destroy', ['annonce' => $annonce]) }}" method="POST" style="display: inline;" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="show-action-btn delete-btn">
                        Delete
                    </button>
                </form>
            </div>
            @endcan
        </div>
    </div>
</div>
@endsection
