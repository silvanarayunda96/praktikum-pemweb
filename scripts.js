// Main JavaScript file for Vacsin website

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const hamburger = document.querySelector('.hamburger-menu');
    const navMenu = document.querySelector('.nav-menu');
    
    if (hamburger) {
        hamburger.addEventListener('click', function() {
            this.classList.toggle('active');
            navMenu.classList.toggle('active');
        });
    }
    
    // Expandable benefits
    const benefitItems = document.querySelectorAll('.benefit-item');
    
    benefitItems.forEach(item => {
        const expandIcon = item.querySelector('.expand-icon');
        const description = item.querySelector('.benefit-description');
        
        if (expandIcon && description) {
            expandIcon.addEventListener('click', function() {
                const isExpanded = description.style.display === 'block';
                
                // Close all descriptions first
                document.querySelectorAll('.benefit-description').forEach(desc => {
                    desc.style.display = 'none';
                });
                
                document.querySelectorAll('.expand-icon').forEach(icon => {
                    icon.textContent = '+';
                });
                
                // Then toggle the clicked one
                if (!isExpanded) {
                    description.style.display = 'block';
                    expandIcon.textContent = '-';
                }
            });
        }
    });
    
    // Variant slider
    initSlider('.variant-slider', '.variant-card');
    
    // Testimonial slider
    initSlider('.testimonial-slider', '.testimonial-card');
    
    // Registration form validation
    const registrationForm = document.getElementById('registration-form');
    
    if (registrationForm) {
        registrationForm.addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const nik = document.getElementById('nik').value;
            const phone = document.getElementById('phone').value;
            const email = document.getElementById('email').value;
            
            let isValid = true;
            let errorMessages = [];
            
            // Name validation
            if (name.trim() === '') {
                isValid = false;
                errorMessages.push('Nama tidak boleh kosong');
            }
            
            // NIK validation
            if (nik.trim() === '' || nik.length !== 16 || isNaN(nik)) {
                isValid = false;
                errorMessages.push('NIK harus 16 digit angka');
            }
            
            // Phone validation
            if (phone.trim() === '' || isNaN(phone)) {
                isValid = false;
                errorMessages.push('Nomor telepon tidak valid');
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email.trim() === '' || !emailRegex.test(email)) {
                isValid = false;
                errorMessages.push('Email tidak valid');
            }
            
            if (!isValid) {
                e.preventDefault();
                const errorContainer = document.getElementById('error-container');
                
                if (errorContainer) {
                    errorContainer.innerHTML = '';
                    errorMessages.forEach(message => {
                        const errorElement = document.createElement('p');
                        errorElement.classList.add('error-message');
                        errorElement.textContent = message;
                        errorContainer.appendChild(errorElement);
                    });
                    
                    errorContainer.style.display = 'block';
                    
                    // Scroll to error messages
                    errorContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    }
});

// Initialize sliders (carousels)
function initSlider(sliderSelector, slideSelector) {
    const slider = document.querySelector(sliderSelector);
    const slides = document.querySelectorAll(slideSelector);
    
    if (!slider || slides.length <= 3) return;
    
    let currentIndex = 0;
    const slideWidth = slides[0].offsetWidth + parseInt(window.getComputedStyle(slides[0]).marginRight);
    const maxIndex = slides.length - 3;
    
    // Create navigation arrows
    const prevArrow = document.createElement('div');
    prevArrow.classList.add('slider-arrow', 'prev-arrow');
    prevArrow.innerHTML = '&#10094;';
    slider.parentNode.insertBefore(prevArrow, slider);
    
    const nextArrow = document.createElement('div');
    nextArrow.classList.add('slider-arrow', 'next-arrow');
    nextArrow.innerHTML = '&#10095;';
    slider.parentNode.appendChild(nextArrow);
    
    // Handle arrow clicks
    prevArrow.addEventListener('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            updateSliderPosition();
        }
    });
    
    nextArrow.addEventListener('click', function() {
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateSliderPosition();
        }
    });
    
    // Update slider position
    function updateSliderPosition() {
        slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
        
        // Update arrow visibility
        prevArrow.style.opacity = currentIndex === 0 ? '0.5' : '1';
        nextArrow.style.opacity = currentIndex === maxIndex ? '0.5' : '1';
    }
    
    // Initial setup
    slider.style.transition = 'transform 0.3s ease-in-out';
    updateSliderPosition();
}

// Animated counter for statistics
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(function() {
        current += increment;
        
        if (current >= target) {
            clearInterval(timer);
            element.textContent = target.toFixed(2) + '%';
        } else {
            element.textContent = current.toFixed(2) + '%';
        }
    }, 16);
}

// Initialize animated counters when stats section is in viewport
const statsSection = document.querySelector('.statistics');
const statValues = document.querySelectorAll('.stat-box h3');

if (statsSection && statValues.length > 0) {
    let animated = false;
    
    window.addEventListener('scroll', function() {
        if (animated) return;
        
        const rect = statsSection.getBoundingClientRect();
        const isInViewport = rect.top < window.innerHeight && rect.bottom >= 0;
        
        if (isInViewport) {
            animated = true;
            
            statValues.forEach(value => {
                const target = parseFloat(value.textContent);
                value.textContent = '0.00%';
                animateCounter(value, target);
            });
        }
    });
}