const fetch = async()=>{
    let response = fetch
}
// Smooth parallax scroll for hero section
window.addEventListener("scroll", function() {
    const hero = document.querySelector(".hero");
    if (hero) {
        const scrolled = window.pageYOffset;
        const heroHeight = hero.offsetHeight;
        
        // Apply parallax effect only when hero is in view
        if (scrolled < heroHeight) {
            hero.style.transform = "translateY(" + scrolled * 0.5 + "px)";
            hero.style.opacity = 1 - (scrolled / heroHeight) * 0.7;
        }
    }
});

// Hide/Show navbar on scroll
let lastScroll = 0;
const navbar = document.querySelector("nav");

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll <= 0) {
        navbar.classList.remove("scroll-up");
        return;
    }
    
    if (currentScroll > lastScroll && currentScroll > 100) {
        // Scrolling down - hide navbar
        navbar.classList.remove("scroll-up");
        navbar.classList.add("scroll-down");
    } else if (currentScroll < lastScroll) {
        // Scrolling up - show navbar
        navbar.classList.remove("scroll-down");
        navbar.classList.add("scroll-up");
    }
    
    lastScroll = currentScroll;
});

// Delete Modal Functions
let deleteFormToSubmit = null;

function openDeleteModal(form) {
    deleteFormToSubmit = form;
    document.getElementById('deleteModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('active');
    document.body.style.overflow = '';
    deleteFormToSubmit = null;
}

// Confirm delete button
document.addEventListener('DOMContentLoaded', function() {
    const confirmBtn = document.getElementById('confirmDelete');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            if (deleteFormToSubmit) {
                deleteFormToSubmit.submit();
            }
        });
    }

    // Close modal when clicking overlay
    const overlay = document.getElementById('deleteModal');
    if (overlay) {
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                closeDeleteModal();
            }
        });
    }

    // Handle all delete forms
    const deleteForms = document.querySelectorAll('.delete-form, form[method="POST"]:has(button.delete-control), form[method="POST"]:has(button.delete-btn), form[method="POST"]:has(button.dash-action-btn.delete)');
    deleteForms.forEach(form => {
        const deleteButton = form.querySelector('button[type="submit"]');
        if (deleteButton && (deleteButton.classList.contains('delete-control') || 
            deleteButton.classList.contains('delete-btn') || 
            deleteButton.classList.contains('delete') ||
            deleteButton.textContent.toLowerCase().includes('delete') ||
            deleteButton.textContent.toLowerCase().includes('supprimer'))) {
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                openDeleteModal(form);
            });
        }
    });
});

