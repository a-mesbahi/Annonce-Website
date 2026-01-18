@extends('layouts.app')

@section('content')
<div class="annonces-modern">
    @if(auth()->user() && auth()->user()->user_type === 'recruiter')
    <!-- Publish Form Section (Only for Recruiters) -->
    <div class="annonce-publish-box">
        <h1 class="annonce-page-title">Create Annonce</h1>
        
        <!-- Filter Buttons -->
        <div class="annonce-filters">
            <a href="{{ route('Annonces.offer') }}" class="filter-btn">View Offers</a>
            <a href="{{ route('Annonces.request') }}" class="filter-btn">View Requests</a>
        </div>

        <form action="{{ route('Annonces') }}" method="POST" class="annonce-form">
            @csrf
            
            <div class="form-group-annonce">
                <label for="description" class="form-label-annonce">Description</label>
                <textarea 
                    name="body" 
                    id="description" 
                    rows="6" 
                    placeholder="What's your annonce about? Share the details..."
                    class="form-textarea-annonce">{{ old('body') }}</textarea>
                @error('body')
                    <div class="error-msg-annonce">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-row-annonce">
                <div class="form-group-annonce">
                    <label for="img_url" class="form-label-annonce">Image URL</label>
                    <input 
                        type="text" 
                        name="img_url" 
                        id="img_url"
                        value="{{ old('img_url') }}"
                        class="form-input-annonce" 
                        placeholder="https://example.com/image.jpg">
                    @error('img_url')
                        <div class="error-msg-annonce">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group-annonce">
                    <label for="annonce_type" class="form-label-annonce">Type</label>
                    <select name="annonce_type" id="annonce_type" class="form-select-annonce">
                        <option value="" selected disabled>Choose type</option>
                        <option value="offer" {{ old('annonce_type') == 'offer' ? 'selected' : '' }}>Offer</option>
                        <option value="request" {{ old('annonce_type') == 'request' ? 'selected' : '' }}>Request</option>
                    </select>
                    @error('annonce_type')
                        <div class="error-msg-annonce">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="annonce-submit-btn">Publish Annonce</button>
        </form>
    </div>
    @elseif(auth()->user() && auth()->user()->user_type === 'job_seeker')
    <!-- Job Seeker Header -->
    <div class="annonce-publish-box" style="padding: 30px; text-align: center;">
        <h1 class="annonce-page-title">Find Your Next Opportunity</h1>
        <p style="font-size: 16px; color: #666; margin-top: 10px;">Browse available jobs and see your match scores!</p>
        
        <!-- Filter Buttons -->
        <div class="annonce-filters" style="margin-top: 20px;">
            <a href="{{ route('Annonces') }}" class="filter-btn">All Jobs</a>
            <a href="{{ route('Annonces.offer') }}" class="filter-btn">Job Offers</a>
            <a href="{{ route('Annonces.request') }}" class="filter-btn">Requests</a>
        </div>
    </div>
    @endif

    <!-- Annonces Grid -->
    <div class="annonces-grid-section">
        <h2 class="annonces-section-title">All Annonces</h2>
        
        <div class="annonces-grid">
            @foreach ($annonces as $annonce)
                <div class="annonce-item">
                    <a href="{{ route('Annonces.show', $annonce) }}" class="annonce-link">
                        <div class="annonce-img" style="background-image: url('{{$annonce->img_url}}');">
                            @if(auth()->check() && auth()->user()->user_type === 'job_seeker' && isset($annonce->match_score) && $annonce->match_score > 0)
                                <div class="match-score-badge match-{{ $annonce->match_score >= 70 ? 'high' : ($annonce->match_score >= 40 ? 'medium' : 'low') }}">
                                    {{ $annonce->match_score }}%
                                </div>
                            @endif
                            
                            <div class="annonce-type-badge badge-{{ $annonce->annonce_type }}">
                                {{ ucfirst($annonce->annonce_type) }}
                            </div>
                        </div>
                        
                        <div class="annonce-body">
                            <div class="annonce-user">
                                <div class="user-avatar">{{ substr($annonce->user->username, 0, 1) }}</div>
                                <div class="user-meta">
                                    <h4 class="username">{{ $annonce->user->username }}</h4>
                                    <span class="post-time">{{ $annonce->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            
                            <p class="annonce-text">{{ $annonce->body }}</p>
                        </div>
                    </a>

                    @if(auth()->check() && (auth()->user()->can('edit', $annonce) || auth()->user()->can('delete', $annonce)))
                        <div class="annonce-controls">
                            @can('edit', $annonce)
                                <a href="{{ route('Annnoces.edit',['annonce'=>$annonce]) }}" class="control-btn edit-control">
                                    Edit
                                </a>
                            @endcan
                            
                            @can('delete', $annonce)
                                <form action="{{ route('Annonces.destroy',['annonce'=>$annonce]) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="control-btn delete-control">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

        <div class="annonce-pagination">
            {{ $annonces->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>

<script>
    // Prevent card link from triggering when clicking action buttons
    document.addEventListener('DOMContentLoaded', function() {
        const controlBtns = document.querySelectorAll('.annonce-controls');
        controlBtns.forEach(control => {
            control.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
            });
        });
        
        document.querySelectorAll('.control-btn, .delete-form').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    });
</script>

@endsection
