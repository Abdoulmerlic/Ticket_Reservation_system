<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelEase - Modern Bus Ticket Reservation System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- Additional styles for landing page -->
    <style>
    /* Hero Section Enhancements */
    .hero-section {
        position: relative;
        overflow: hidden;
        background-image: url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2069&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.85) 0%, rgba(118, 75, 162, 0.85) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-bg-pattern {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image:
            radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
        z-index: 0;
    }

    /* Bus-themed enhancements */
    .hero-content h1 i {
        color: #ffd700;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .feature-icon {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .feature-icon i.fa-bus {
        color: #ffd700;
    }

    /* Feature Cards */
    .feature-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: var(--spacing-8);
        margin-top: var(--spacing-12);
    }

    .feature-card {
        background: var(--white);
        border-radius: var(--radius-2xl);
        padding: var(--spacing-8);
        box-shadow: var(--shadow-lg);
        transition: all var(--transition-normal);
        position: relative;
        overflow: hidden;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-2xl);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        border-radius: var(--radius-xl);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: var(--spacing-6);
        color: var(--white);
        font-size: 2rem;
    }

    /* Stats Section */
    .stats-section {
        background: linear-gradient(135deg, var(--accent-color) 0%, var(--secondary-color) 100%);
        position: relative;
        overflow: hidden;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }

    .stats-content {
        position: relative;
        z-index: 2;
    }

    .stat-card {
        text-align: center;
        padding: var(--spacing-6);
        background: rgba(255, 255, 255, 0.1);
        border-radius: var(--radius-xl);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: var(--white);
        margin-bottom: var(--spacing-2);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .stat-label {
        font-size: var(--font-size-lg);
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
    }

    /* CTA Section */
    .cta-section {
        background: var(--gray-50);
        position: relative;
    }

    .cta-card {
        background: var(--white);
        border-radius: var(--radius-2xl);
        padding: var(--spacing-12);
        box-shadow: var(--shadow-xl);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(102, 126, 234, 0.1), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }

        100% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: var(--font-size-3xl);
        }

        .feature-grid {
            grid-template-columns: 1fr;
            gap: var(--spacing-6);
        }

        .stat-number {
            font-size: 2.5rem;
        }

        .cta-card {
            padding: var(--spacing-8);
        }
    }
    </style>
</head>

<body>
    <!-- Fixed Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <i class="fas fa-bus"></i>
                <span>TravelEase</span>
            </div>

            <nav class="nav">
                <a href="#home" class="nav-link active">Home</a>
                <a href="#features" class="nav-link">Features</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#contact" class="nav-link">Contact</a>
            </nav>

            <div class="flex items-center gap-4">
                <a href="booking/index.php" class="btn btn-primary">
                    <i class="fas fa-ticket-alt"></i>
                    Book Now
                </a>
                <a href="admin/login.php" class="btn btn-secondary">
                    <i class="fas fa-user-shield"></i>
                    Admin
                </a>
                <button class="mobile-menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content full-width">
        <!-- Hero Section -->
        <section id="home" class="hero-section p-8">
            <div class="hero-bg-pattern"></div>
            <div class="container">
                <div class="hero-content text-center">
                    <h1 class="animate-float">
                        <i class="fas fa-bus"></i>
                        TravelEase - Your Journey, Our Priority
                    </h1>
                    <p class="text-xl mb-8 text-white-600">
                        Experience seamless bus travel booking with our modern reservation platform.
                        Book your tickets in minutes with secure payment processing and instant confirmation.
                    </p>

                    <div class="flex justify-center gap-6 flex-wrap">
                        <a href="booking/index.php" class="btn btn-primary btn-lg animate-pulse">
                            <i class="fas fa-rocket"></i>
                            Start Booking
                        </a>
                        <a href="#features" class="btn btn-secondary btn-lg">
                            <i class="fas fa-info-circle"></i>
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="p-8 bg-white">
            <div class="container">
                <div class="text-center mb-12">
                    <h2 class="mb-4">Why Choose TravelEase?</h2>
                    <p class="text-lg text-white-600 max-w-2xl mx-auto">
                        Discover the features that make TravelEase the preferred choice for bus travelers
                        worldwide.
                    </p>
                </div>

                <div class="feature-grid">
                    <div class="feature-card animate-fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 class="mb-4">Lightning Fast Booking</h3>
                        <p class="text-white-600">
                            Complete your booking in under 3 minutes with our streamlined process and intuitive
                            interface.
                        </p>
                    </div>

                    <div class="feature-card animate-fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="mb-4">Bank-Level Security</h3>
                        <p class="text-gray-600">
                            Your payment information is protected with enterprise-grade security and encryption
                            protocols.
                        </p>
                    </div>

                    <div class="feature-card animate-fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="mb-4">Mobile-First Design</h3>
                        <p class="text-gray-600">
                            Book tickets on any device with our responsive design that works perfectly on all screen
                            sizes.
                        </p>
                    </div>

                    <div class="feature-card animate-fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-bus"></i>
                        </div>
                        <h3 class="mb-4">Wide Route Network</h3>
                        <p class="text-gray-600">
                            Access to hundreds of bus routes across the country with real-time availability.
                        </p>
                    </div>

                    <div class="feature-card animate-fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="mb-4">24/7 Support</h3>
                        <p class="text-gray-600">
                            Get help anytime with our round-the-clock customer support team.
                        </p>
                    </div>

                    <div class="feature-card animate-fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="mb-4">Real-time Updates</h3>
                        <p class="text-gray-600">
                            Stay informed with real-time updates on your booking status and travel information.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section p-8">
            <div class="container">
                <div class="stats-content">
                    <div class="grid grid-4">
                        <div class="stat-card">
                            <div class="stat-number">10K+</div>
                            <div class="stat-label">Happy Customers</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">50+</div>
                            <div class="stat-label">Destinations</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">99.9%</div>
                            <div class="stat-label">Uptime</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section p-8">
            <div class="container">
                <div class="cta-card">
                    <h2 class="mb-6">Ready to Start Your Journey?</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Join thousands of satisfied customers who trust TravelEase for their bus travel needs.
                    </p>
                    <div class="flex justify-center gap-6 flex-wrap">
                        <a href="booking/index.php" class="btn btn-primary btn-lg">
                            <i class="fas fa-ticket-alt"></i>
                            Book Your Ticket Now
                        </a>
                        <a href="admin/login.php" class="btn btn-secondary btn-lg">
                            <i class="fas fa-user-shield"></i>
                            Admin Access
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Enhanced Footer -->
    <footer class="footer full-width">
        <div class="footer-content">
            <div class="footer-logo">
                <i class="fas fa-bus"></i>
                <span>TravelEase</span>
            </div>
            <nav class="footer-nav">
                <a href="index.php">
                    <i class="fas fa-home"></i>
                    Home
                </a>
                <a href="about.php">
                    <i class="fas fa-info-circle"></i>
                    About
                </a>
                <a href="contact.php">
                    <i class="fas fa-envelope"></i>
                    Contact
                </a>
                <a href="booking/index.php">
                    <i class="fas fa-ticket-alt"></i>
                    Book Tickets
                </a>
                <a href="admin/login.php">
                    <i class="fas fa-user-shield"></i>
                    Admin
                </a>
            </nav>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/utils.js"></script>
    <script>
    // Initialize navigation functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const mobileToggle = Utils.$('.mobile-menu-toggle');
        const nav = Utils.$('.nav');

        if (mobileToggle && nav) {
            Utils.on(mobileToggle, 'click', function() {
                mobileToggle.classList.toggle('active');
                nav.classList.toggle('mobile-open');
            });
        }

        // Smooth scrolling for navigation links
        const navLinks = Utils.$$('.nav-link[href^="#"]');
        navLinks.forEach(link => {
            Utils.on(link, 'click', function(e) {
                e.preventDefault();
                const target = Utils.$(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        let lastScrollTop = 0;
        Utils.on(window, 'scroll', function() {
            const header = Utils.$('.header');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }

            // Hide/show header on scroll
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                header.style.transform = 'translateY(-100%)';
            } else {
                header.style.transform = 'translateY(0)';
            }

            lastScrollTop = scrollTop;
        });

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                }
            });
        }, observerOptions);

        Utils.$$('.feature-card, .stat-card').forEach(card => {
            observer.observe(card);
        });
    });
    </script>
</body>

</html>