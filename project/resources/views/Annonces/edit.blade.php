@extends('layouts.app')

@section('content')
<div class="annonces-modern">
    <div class="annonce-publish-box">
        <h1 class="annonce-page-title">Edit Annonce</h1>
        
        <form action="{{ route('Annoce.update',$annonce->id) }}" method="POST" class="annonce-form">
            @csrf
            @method('PUT')
            
            <div class="form-group-annonce">
                <label for="description" class="form-label-annonce">Description</label>
                <textarea 
                    name="body" 
                    id="description" 
                    rows="6" 
                    placeholder="What's your annonce about? Share the details..."
                    class="form-textarea-annonce">{{ old('body', $annonce->body) }}</textarea>
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
                        value="{{ old('img_url', $annonce->img_url) }}"
                        class="form-input-annonce" 
                        placeholder="https://example.com/image.jpg">
                    @error('img_url')
                        <div class="error-msg-annonce">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group-annonce">
                    <label for="annonce_type" class="form-label-annonce">Type</label>
                    <select name="annonce_type" id="annonce_type" class="form-select-annonce">
                        <option value="" disabled>Choose type</option>
                        <option value="offer" {{ old('annonce_type', $annonce->annonce_type) == 'offer' ? 'selected' : '' }}>Offer</option>
                        <option value="request" {{ old('annonce_type', $annonce->annonce_type) == 'request' ? 'selected' : '' }}>Request</option>
                    </select>
                    @error('annonce_type')
                        <div class="error-msg-annonce">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="annonce-submit-btn">Update Annonce</button>
        </form>
    </div>
</div>
@endsection