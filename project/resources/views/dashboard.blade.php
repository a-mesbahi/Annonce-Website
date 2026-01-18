@extends('layouts.app')

@section('content')
<div class="dashboard-modern">
    <!-- Header -->
    <div class="dash-header">
        <div class="dash-welcome">
            <h1 class="dash-title">Dashboard</h1>
            <p class="dash-subtitle">Welcome back, <strong>{{ $user->username }}</strong>! 
                @if($user->user_type === 'recruiter')
                    💼
                @else
                    👤
                @endif
            </p>
        </div>
        @if($user->user_type === 'recruiter')
            <a href="{{ route('Annonces') }}" class="dash-btn-new">
                <span>+ New Annonce</span>
            </a>
        @else
            <a href="{{ route('dashboard') }}#profile" class="dash-btn-new">
                <span>✏️ Edit Profile</span>
            </a>
        @endif
    </div>

    @if($user->user_type === 'recruiter')
        <!-- RECRUITER DASHBOARD -->
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
    @else
        <!-- JOB SEEKER DASHBOARD -->
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="dash-recent">
                <h2 class="dash-section-title">My Profile</h2>
                <div class="annonce-publish-box">
                    <div class="annonce-form">
                        <div class="form-group-annonce">
                            <label class="form-label-annonce">Phone Number</label>
                            <input 
                                type="tel" 
                                name="phone" 
                                class="form-input-annonce" 
                                placeholder="+1 234 567 8900"
                                value="{{ old('phone', $user->phone) }}">
                        </div>

                        <div class="form-group-annonce">
                            <label class="form-label-annonce">About Me</label>
                            <textarea 
                                name="bio" 
                                class="form-textarea-annonce" 
                                rows="4" 
                                placeholder="Tell recruiters about yourself...">{{ old('bio', $user->bio) }}</textarea>
                        </div>

                        <div class="form-group-annonce">
                            <label class="form-label-annonce">Skills (one per line)</label>
                            <textarea 
                                name="skills" 
                                class="form-textarea-annonce" 
                                rows="6" 
                                placeholder="PHP&#10;Laravel&#10;JavaScript&#10;React&#10;MySQL">{{ old('skills', $user->skills) }}</textarea>
                        </div>

                        <div class="form-group-annonce">
                            <label class="form-label-annonce">Upload CV (PDF, DOC, DOCX)</label>
                            <input 
                                type="file" 
                                name="cv" 
                                class="form-input-annonce" 
                                accept=".pdf,.doc,.docx">
                            @if($user->cv_path)
                                <p style="margin-top: 8px; font-size: 14px;">
                                    Current CV: <a href="{{ asset('storage/' . $user->cv_path) }}" target="_blank" style="color: black; font-weight: bold; text-decoration: underline;">View File</a>
                                </p>
                            @endif
                        </div>

                        <button type="submit" class="annonce-submit-btn">Save Profile</button>
                    </div>
                </div>
            </div>

            @if($user->skills)
                <div class="dash-recent">
                    <h2 class="dash-section-title">My Skills</h2>
                    <div class="skills-display">
                        @foreach(explode("\n", $user->skills) as $skill)
                            @if(trim($skill))
                                <span class="skill-tag">{{ trim($skill) }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </form>
    @endif
</div>
@endsection