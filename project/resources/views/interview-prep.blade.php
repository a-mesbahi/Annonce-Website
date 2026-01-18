@extends('layouts.app')

@section('content')
<div class="interview-prep-page">
    <div class="interview-header">
        <h1 class="interview-title">Interview Prep</h1>
        <p class="interview-subtitle">Master the most common interview questions. Click a card to reveal the answer!</p>
    </div>

    <div class="flashcards-grid">
        @foreach($questions as $index => $qa)
            <div class="flashcard">
                <div class="flashcard-inner">
                    <div class="flashcard-front">
                        <div class="card-number">Q{{ $index + 1 }}</div>
                        <p class="card-question">{{ $qa['question'] }}</p>
                        <div class="flip-hint">Click to see answer</div>
                    </div>
                    <div class="flashcard-back">
                        <div class="card-badge">Best Answer</div>
                        <p class="card-answer">{{ $qa['answer'] }}</p>
                        <div class="flip-hint">Click to flip back</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
