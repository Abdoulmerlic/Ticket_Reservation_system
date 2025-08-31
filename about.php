<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TicketReserve System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        .about-hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .about-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }

        .about-content {
            position: relative;
            z-index: 2;
        }

        .mission-vision {
            background: var(--white);
            border-radius: var(--radius-2xl);
            padding: var(--spacing-8);
            box-shadow: var(--shadow-xl);
            margin-top: -50px;
            position: relative;
            z-index: 3;
        }

        .mission-card,
        .vision-card {
            text-align: center;
            padding: var(--spacing-6);
            border-radius: var(--radius-xl);
            transition: all var(--transition-normal);
        }

        .mission-card {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
        }

        .vision-card {
            background: var(--gray-50);
            border: 2px solid var(--gray-200);
        }

        .mission-card:hover,
        .vision-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-2xl);
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: var(--spacing-8);
        }

        .team-member {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: var(--spacing-6);
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
        }

        .team-member:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--spacing-4);
            color: var(--white);
            font-size: 3rem;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--spacing-6);
        }

        .value-card {
            background: var(--gray-50);
            border-radius: var(--radius-xl);
            padding: var(--spacing-6);
            text-align: center;
            border: 1px solid var(--gray-200);
            transition: all var(--transition-normal);
        }

        .value-card:hover {
            background: var(--white);
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto var(--spacing-4);
            color: var(--white);
            font-size: 2rem;
        }

        .text-highlight {
            color: var(--primary-color);
            font-weight: 600;
        }

        .section-title {
            font-size: var(--font-size-4xl);
            font-weight: 800;
            margin-bottom: var(--spacing-6);
            text-align: center;
            color: var(--gray-900);
        }

        .section-subtitle {
            font-size: var(--font-size-xl);
            color: var(--gray-600);
            text-align: center;
            margin-bottom: var(--spacing-8);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 768px) {

            .team-grid,
            .values-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Fixed Header -->
    <header class="header">
        <div class="header-content">
            <div class="logo">
                <i class="fas fa-plane"></i>
                <span>TicketReserve</span>
            </div>

            <nav class="nav">
                <a href="index.php" class="nav-link">Home</a>
                <a href="about.php" class="nav-link active">About</a>
                <a href="contact.php" class="nav-link">Contact</a>
                <a href="booking/index.php" class="nav-link">Book Tickets</a>
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
        <section class="about-hero p-8">
            <div class="container">
                <div class="about-content text-center">
                    <h1 class="section-title text-white mb-6">
                        About <span class="text-highlight">TicketReserve</span>
                    </h1>
                    <p class="section-subtitle text-white opacity-90">
                        We're revolutionizing the way people book travel tickets with our cutting-edge technology and
                        customer-first approach.
                    </p>
                </div>
            </div>
        </section>

        <!-- Mission & Vision -->
        <section class="p-8">
            <div class="container">
                <div class="mission-vision">
                    <div class="grid grid-2">
                        <div class="mission-card">
                            <div class="value-icon mb-4">
                                <i class="fas fa-bullseye"></i>
                            </div>
                            <h3 class="mb-4">Our Mission</h3>
                            <p class="opacity-90">
                                To provide seamless, secure, and efficient ticket booking experiences that connect
                                people to their destinations with confidence and ease.
                            </p>
                        </div>
                        <div class="vision-card">
                            <div class="value-icon mb-4">
                                <i class="fas fa-eye"></i>
                            </div>
                            <h3 class="mb-4">Our Vision</h3>
                            <p class="text-gray-600">
                                To become the leading platform for travel ticket reservations, setting industry
                                standards for innovation, security, and customer satisfaction.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Values -->
        <section class="p-8 bg-white">
            <div class="container">
                <h2 class="section-title">Our Core Values</h2>
                <p class="section-subtitle">
                    The principles that guide everything we do
                </p>

                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="mb-3">Security First</h4>
                        <p class="text-gray-600">We prioritize the security of your data and transactions above
                            everything else.</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4 class="mb-3">Customer Focus</h4>
                        <p class="text-gray-600">Every decision we make is centered around providing the best experience
                            for our customers.</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4 class="mb-3">Innovation</h4>
                        <p class="text-gray-600">We continuously innovate to bring you the latest technology and
                            features.</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4 class="mb-3">Trust & Transparency</h4>
                        <p class="text-gray-600">We believe in building lasting relationships through honesty and
                            transparency.</p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4 class="mb-3">Excellence</h4>
                        <p class="text-gray-600">We strive for excellence in every aspect of our service and platform.
                        </p>
                    </div>

                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="mb-3">Community</h4>
                        <p class="text-gray-600">We're building a community of travelers who trust and support each
                            other.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="p-8 bg-gray-50">
            <div class="container">
                <h2 class="section-title">Meet Our Team</h2>
                <p class="section-subtitle">
                    The passionate people behind TicketReserve
                </p>

                <div class="team-grid">
                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h4 class="mb-2">John Smith</h4>
                        <p class="text-primary-color font-medium mb-2">CEO & Founder</p>
                        <p class="text-gray-600">Visionary leader with 15+ years in travel technology.</p>
                    </div>

                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h4 class="mb-2">Sarah Johnson</h4>
                        <p class="text-primary-color font-medium mb-2">CTO</p>
                        <p class="text-gray-600">Tech expert driving our platform innovation.</p>
                    </div>

                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h4 class="mb-2">Mike Davis</h4>
                        <p class="text-primary-color font-medium mb-2">Head of Operations</p>
                        <p class="text-gray-600">Ensuring smooth operations and customer satisfaction.</p>
                    </div>

                    <div class="team-member">
                        <div class="team-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h4 class="mb-2">Lisa Chen</h4>
                        <p class="text-primary-color font-medium mb-2">Head of Design</p>
                        <p class="text-gray-600">Creating beautiful and intuitive user experiences.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="p-8 bg-primary-color">
            <div class="container">
                <div class="text-center text-white">
                    <h2 class="section-title text-white mb-6">Ready to Experience the Future?</h2>
                    <p class="section-subtitle text-white opacity-90 mb-8">
                        Join thousands of satisfied customers who trust TicketReserve for their travel needs.
                    </p>
                    <div class="flex justify-center gap-6 flex-wrap">
                        <a href="booking/index.php" class="btn btn-white btn-lg">
                            <i class="fas fa-rocket"></i>
                            Start Booking
                        </a>
                        <a href="contact.php" class="btn btn-outline-white btn-lg">
                            <i class="fas fa-envelope"></i>
                            Get in Touch
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
                <i class="fas fa-plane"></i>
                <span>TicketReserve System</span>
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
        document.addEventListener('DOMContentLoaded', function () {
            const mobileToggle = Utils.$('.mobile-menu-toggle');
            const nav = Utils.$('.nav');

            if (mobileToggle && nav) {
                Utils.on(mobileToggle, 'click', function () {
                    mobileToggle.classList.toggle('active');
                    nav.classList.toggle('mobile-open');
                });
            }

            Utils.on(window, 'scroll', function () {
                const header = Utils.$('.header');
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, observerOptions);

            Utils.$$('.value-card, .team-member').forEach(item => {
                observer.observe(item);
            });
        });
    </script>
</body>

</html>