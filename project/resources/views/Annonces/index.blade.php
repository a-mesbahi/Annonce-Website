@extends('layouts.app')


@section('content')
@if(auth()->user())
<div class="publish-form">
        <div class="plus-annonces">
                <ul>
                    <li><a href="{{ route('Annonces.offer') }}">Voir les offres</a></li>
                    <li><a href="{{ route('Annonces.request') }}">Voir les demandes</a></li>
                </ul>
        </div>
        <form action="{{ route('Annonces') }}" method="POST">
            @csrf
            <div class="input-group textarea">
                <label for="">Annonce description : </label>
                <textarea name="body" id="description" cols="30" rows="10" placeholder="Enter Your Annonce Description..."></textarea>
                @error('body')
                        <div class="error">
                            {{ $message }}
                        </div> 
                @enderror
            </div>
            <div class="super-group">
                <div class="input-group">
                    <label for="">Annonce Image URL : </label>
                    <input type="text" name="img_url" class="img_url" placeholder="Enter Your URL Image">  
                    @error('img_url')
                        <div class="error">
                            {{ $message }}
                        </div> 
                    @enderror
                </div>
                <select name="annonce_type" id="">
                    <option value="" selected disabled>Choose Your Annonce type </option>
                    <option value="offer">offer</option>
                    <option value="request">request</option>
                </select>
            </div>
            <button class="button">Poster</button>
            
        </form>
    </div>
    @endif
    
    <div class="annonce-container">
        @foreach ($annonces as $annonce)
            <div class="annonce-card">
                <div class="card-image" style="background-image: url('{{$annonce->img_url}}');">
                    <div class="annonce-badge {{ $annonce->annonce_type }}">
                        {{ ucfirst($annonce->annonce_type) }}
                    </div>
                </div>
                
                <div class="card-content">
                    <div class="card-header">
                        <div class="user-info">
                            <div class="avatar">{{ substr($annonce->user->username, 0, 1) }}</div>
                            <div class="user-details">
                                <h4>{{ $annonce->user->username }}</h4>
                                <span class="time">{{ $annonce->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @can('edit', $annonce)
                            <div class="card-actions">
                                <a href="{{ route('Annnoces.edit',['annonce'=>$annonce]) }}" class="action-btn edit-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </div>
                        @endcan
                    </div>
                    
                    <div class="card-description">
                        <p>{{ $annonce->body }}</p>
                    </div>
                    
                    @can('delete',$annonce)
                        <div class="card-footer">
                            <form action="{{ route('Annonces.destroy',['annonce'=>$annonce]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
            </div>
        @endforeach
        <div class="pagination">
            {{ $annonces->links("pagination::bootstrap-4") }}
        </div>
    </div>
    
@endsection