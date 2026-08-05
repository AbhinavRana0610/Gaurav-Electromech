
// Loading Animation
document.addEventListener('DOMContentLoaded', function() {
    const loadingScreen = document.createElement('div');
    loadingScreen.className = 'loading-animation';
    loadingScreen.innerHTML = '<div class="loader"></div>';
    document.body.appendChild(loadingScreen);
    setTimeout(() => {
        loadingScreen.classList.add('hidden');
        setTimeout(() => {
            loadingScreen.remove();
        }, 500);
    }, 1500);
});


        // Neo Navbar functionality
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('neo-navbar');
            const navMenu = document.getElementById('neo-nav-menu');
            const hamburger = document.getElementById('neo-hamburger');
            const dropdowns = document.querySelectorAll('.neo-dropdown');
            
            // Navbar scroll effect
            let lastScrollY = window.scrollY;
            
            window.addEventListener('scroll', () => {
                const currentScrollY = window.scrollY;
                
                if (currentScrollY > 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
                
                // Hide/show navbar on scroll
                if (currentScrollY > lastScrollY && currentScrollY > 100) {
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    navbar.style.transform = 'translateY(0)';
                }
                
                lastScrollY = currentScrollY;
            });
            
            // Mobile menu toggle
            hamburger.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                hamburger.classList.toggle('active');
                
                // Toggle body scroll lock
                if (navMenu.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
                
                // Close all dropdowns when menu is closed
                if (!navMenu.classList.contains('active')) {
                    dropdowns.forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                }
            });
            
            // Mobile dropdown toggle
            if (window.innerWidth <= 968) {
                dropdowns.forEach(dropdown => {
                    const toggle = dropdown.querySelector('.neo-dropdown-toggle');
                    
                    toggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        dropdown.classList.toggle('active');
                        
                        // Close other dropdowns
                        dropdowns.forEach(otherDropdown => {
                            if (otherDropdown !== dropdown) {
                                otherDropdown.classList.remove('active');
                            }
                        });
                    });
                });
            }
            
            // Close mobile menu when clicking on a link
            document.querySelectorAll('.neo-nav-menu a').forEach(link => {
                link.addEventListener('click', (e) => {
                    if (window.innerWidth <= 968 && !link.classList.contains('neo-dropdown-toggle')) {
                        navMenu.classList.remove('active');
                        hamburger.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            });
        });



// Particle System 
class ParticleSystem {
    constructor(container) {
        this.container = container;
        this.particles = [];
        this.init();
    }
    init() {
        for (let i = 0; i < 50; i++) {
            this.createParticle();
        }
        this.animate();
    }
    createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = Math.random() * 100 + '%';
        particle.style.animationDelay = Math.random() * 6 + 's';
        particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
        particle.style.opacity = Math.random() * 0.5 + 0.2;
        this.container.appendChild(particle);
        this.particles.push(particle);
    }
    animate() {
        this.particles.forEach(particle => {
            const rect = particle.getBoundingClientRect();
            if (rect.top > window.innerHeight) {
                particle.style.top = '-10px';
                particle.style.left = Math.random() * 100 + '%';
            }
        });
        requestAnimationFrame(() => this.animate());
    }
}
const particlesContainer = document.getElementById('particles');
if (particlesContainer) {
    new ParticleSystem(particlesContainer);
}

// Smooth Scrolling for Navigation
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Navigation scroll effect
const navbar = document.getElementById('navbar');
let lastScrollY = window.scrollY;
window.addEventListener('scroll', () => {
    const currentScrollY = window.scrollY;
    if (currentScrollY > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
    if (currentScrollY > lastScrollY && currentScrollY > 100) {
        navbar.style.transform = 'translateY(-100%)';
    } else {
        navbar.style.transform = 'translateY(0)';
    }
    lastScrollY = currentScrollY;
});

// Navbar functionality 
document.addEventListener('DOMContentLoaded', function() {
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');
    const navbar = document.getElementById('navbar');
    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            navToggle.classList.toggle('active');
        });
    }
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
                navToggle.classList.remove('active');
            }
        });
    });
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.style.padding = '0.5rem 0';
        } else {
            navbar.style.padding = '0.8rem 0';
        }
    });
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 968) {
                e.preventDefault();
                const dropdown = this.parentElement.querySelector('.dropdown-menu');
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            }
        });
    });
});

// Animated Counter 
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const startTime = Date.now();
    function updateCounter() {
        const elapsed = Date.now() - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easeOutQuart = 1 - Math.pow(1 - progress, 4);
        const current = Math.round(start + (target - start) * easeOutQuart);
        element.textContent = current;
        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        }
    }
    updateCounter();
}

document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    if (filterButtons.length > 0 && productCards.length > 0) {
        
        const filterProducts = (filterValue) => {
            productCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                const shouldBeVisible = (filterValue === 'all' || cardCategory === filterValue);

                if (shouldBeVisible) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        };

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                const filterValue = button.getAttribute('data-filter');
                filterProducts(filterValue);
            });
        });

        // Initially show all products
        const allButton = document.querySelector('.filter-btn[data-filter="all"]');
        if (allButton) {
            allButton.classList.add('active');
        }
        filterProducts('all');
    }
});

class AccordionManager {
    constructor() {
        this.accordionItems = document.querySelectorAll('.accordion-item');
        this.init();
    }
    init() {
        this.accordionItems.forEach(item => {
            const header = item.querySelector('.accordion-header');
            header.addEventListener('click', () => {
                this.toggleAccordion(item);
            });
        });
    }
    toggleAccordion(item) {
        const isActive = item.classList.contains('active');
        this.accordionItems.forEach(accordionItem => {
            accordionItem.classList.remove('active');
        });
        if (!isActive) {
            item.classList.add('active');
        }
    }
}
document.addEventListener('DOMContentLoaded', () => {
    new AccordionManager();
});


const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animated');
            if (entry.target.classList.contains('hero-stats')) {
                const statNumbers = entry.target.querySelectorAll('.stat-number');
                statNumbers.forEach(stat => {
                    const target = parseInt(stat.dataset.target);
                    animateCounter(stat, target);
                });
            }
        }
    });
}, observerOptions);

document.querySelectorAll('.hero-stats, .industries-grid, .features-grid, .about-content, .section-header').forEach(el => {
    el.classList.add('animate-on-scroll');
    observer.observe(el);
});


// Parallax Effect 
function parallaxEffect() {
    const scrolled = window.pageYOffset;
    const parallaxElements = document.querySelectorAll('.hero-image');
    parallaxElements.forEach(element => {
        const speed = 0.5;
        element.style.transform = `translateY(${scrolled * speed}px)`;
    });
}
window.addEventListener('scroll', parallaxEffect);


// Product Modal Functionality 
const modal = document.getElementById('product-modal');
const modalCloseBtn = document.getElementById('modal-close');
const modalTitle = document.getElementById('modal-product-title');
const modalDescription = document.getElementById('modal-product-description');
const modalFeatures = document.getElementById('modal-product-features');
const modalImage = document.getElementById('modal-product-image');

document.querySelectorAll('.product-card').forEach(card => {
    card.style.cursor = 'pointer';
    card.addEventListener('click', () => {
        const title = card.querySelector('h3').textContent;
        const description = card.querySelector('p').textContent;
        const features = card.querySelectorAll('.feature-tag');
        const imageSrc = card.querySelector('.product-image img').src;
        modalTitle.textContent = title;
        modalDescription.textContent = description;
        modalImage.src = imageSrc;
        modalImage.alt = title;
        modalFeatures.innerHTML = '';
        features.forEach(feature => {
            const span = document.createElement('span');
            span.className = 'feature-tag';
            span.textContent = feature.textContent;
            modalFeatures.appendChild(span);
        });
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    });
});

if(modalCloseBtn) {
    modalCloseBtn.addEventListener('click', () => {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });
}
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
});



// Hero video: hold the 9.9MB file back until the page has finished loading, so
// the poster image paints first and the video never competes with the initial
// render. Skipped entirely when the visitor prefers reduced motion.
(function () {
    var video = document.querySelector('video.hero-video-background[data-src]');
    if (!video) return;

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    function loadHeroVideo() {
        if (video.dataset.loaded) return;
        video.dataset.loaded = '1';

        var source = document.createElement('source');
        source.src = video.dataset.src;
        source.type = 'video/mp4';
        video.appendChild(source);
        video.load();

        var played = video.play();
        if (played && played.catch) {
            played.catch(function () { /* autoplay blocked - poster stays */ });
        }
    }

    if (document.readyState === 'complete') {
        loadHeroVideo();
    } else {
        window.addEventListener('load', loadHeroVideo);
    }
})();
