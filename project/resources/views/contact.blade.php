@extends('layouts.app')

@section('content')
<div class="contact-modern">
    <!-- Decorative shapes -->
    <div class="contact-deco contact-deco-1"></div>
    <div class="contact-deco contact-deco-2"></div>
    <div class="contact-star contact-star-1">✦</div>
    
    <div class="contact-content">
        <h1 class="contact-main-title">Get in Touch</h1>

        <div class="contact-single-box">
            <form class="contact-form" method="POST" action="#">
                @csrf
                
                <div class="contact-row">
                    <div class="contact-input-group">
                        <input 
                            type="text" 
                            name="name" 
                            class="contact-input" 
                            placeholder="Your Name"
                            required>
                    </div>
                    
                    <div class="contact-input-group">
                        <input 
                            type="email" 
                            name="email" 
                            class="contact-input" 
                            placeholder="Your Email"
                            required>
                    </div>
                </div>
                
                <div class="contact-input-group">
                    <textarea 
                        name="message" 
                        rows="5" 
                        class="contact-textarea" 
                        placeholder="Your message..."
                        required></textarea>
                </div>
                
                <button type="submit" class="contact-submit-btn">Send Message</button>
            </form>
            
            <div class="contact-info-compact">
                <div class="info-item">
                    <strong>Address:</strong> 123 Avenue Mohammed V, Casablanca
                </div>
                <div class="info-item">
                    <strong>Phone:</strong> <a href="tel:+212612345678" class="info-link">+212 6 12 34 56 78</a>
                </div>
                <div class="info-item">
                    <strong>Email:</strong> <a href="mailto:contact@rekrute.com" class="info-link">contact@rekrute.com</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
