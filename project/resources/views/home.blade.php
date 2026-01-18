@extends('layouts.app')

@section('content')
    <div class="hero">
        <h2 class="sign">Amine Mesbahi</h2>
    </div>
    <div class="middle">
        <div class="left">
            <h2>Tired of the "Black Hole" of Applications? </h2>
            <h2>We’ve all been there. You spend hours tailoring your resume, writing the perfect cover letter, and hitting 'apply,' only to receive a generic automated rejection—or worse, total silence. Traditional job boards have become crowded and impersonal, making it feel like your skills are being lost in a sea of thousands. It’s frustrating to feel like just another number in an algorithm that doesn't understand your true potential or your career aspirations.</h2>
        </div>
        <div class="right">
            <h2>A Human-Centric Approach to Hiring </h2>
            <h2>ekrute was built to change the narrative. We’ve replaced the 'apply and pray' method with a precision matching system that respects your time and your talent. By focusing on quality over quantity, we connect you with recruiters who are looking for exactly what you offer. Whether you are looking for a remote startup role or a position at a global firm, our platform ensures your profile lands on the right desk at the right time. Experience a recruitment process that is transparent, fast, and actually works for you</h2>
        </div>
        <div class="plus">
            <div class="text-home">
                <h1>Go Check</h1>
            </div>
            <div class="button">
                <h1> > </h1>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <h2 class="section-title-handwritten">How It Works</h2>
        <div class="how-grid">
            <div class="how-card">
                <div class="step-number">1</div>
                <h3 class="card-title-handwritten">Create</h3>
                <p class="card-text">Build your professional profile in minutes. Showcase your skills, experience, and career aspirations in a way that makes you stand out.</p>
            </div>
            <div class="how-card">
                <div class="step-number">2</div>
                <h3 class="card-title-handwritten">Match</h3>
                <p class="card-text">Our AI-powered matching system connects you with opportunities that align perfectly with your skills and career goals.</p>
            </div>
            <div class="how-card">
                <div class="step-number">3</div>
                <h3 class="card-title-handwritten">Connect</h3>
                <p class="card-text">Meet directly with recruiters who are genuinely interested in your profile. Skip the black hole and start real conversations.</p>
            </div>
        </div>
    </section>

    <!-- Featured Categories Section -->
    <section class="featured-categories">
        <h2 class="section-title-handwritten">Featured Categories</h2>
        <div class="categories-grid">
            <div class="category-box">
                <h3>Tech</h3>
            </div>
            <div class="category-box">
                <h3>Marketing</h3>
            </div>
            <div class="category-box">
                <h3>Design</h3>
            </div>
            <div class="category-box">
                <h3>Finance</h3>
            </div>
            <div class="category-box">
                <h3>Sales</h3>
            </div>
            <div class="category-box">
                <h3>Management</h3>
            </div>
        </div>
    </section>

    <!-- Success Stories Section -->
    <section class="success-stories">
        <h2 class="section-title-handwritten">Success Stories</h2>
        <div class="testimonials-row">
            <div class="testimonial-card">
                <div class="testimonial-emoji">
                    <div class="emoji-placeholder">😊</div>
                </div>
                <div class="testimonial-content">
                    <p class="testimonial-text">"I found a role that actually matches my passion for UI design within a week. Rekrute made it so simple."</p>
                    <p class="testimonial-author">— Sarah K.</p>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-emoji">
                    <div class="emoji-placeholder">🎯</div>
                </div>
                <div class="testimonial-content">
                    <p class="testimonial-text">"The recruiters here are actually responsive. I felt like a human, not just a resume."</p>
                    <p class="testimonial-author">— Marc L.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
