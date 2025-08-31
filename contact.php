<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - TicketReserve System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
    <style>
        .contact-hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: var(--white);
            position: relative;
            overflow: hidden;
            padding: var(--spacing-16) 0;
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }

        .contact-content {
            position: relative;
            z-index: 2;
        }

        .contact-form-card {
            background: var(--white);
            border-radius: var(--radius-2xl);
            padding: var(--spacing-8);
            box-shadow: var(--shadow-xl);
            margin-top: -50px;
            position: relative;
            z-index: 3;
        }

        .contact-info-card {
            background: var(--gray-50);
            border-radius: var(--radius-xl);
            padding: var(--spacing-6);
            border: 1px solid var(--gray-200);
            transition: all var(--transition-normal);
        }

        .contact-info-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .contact-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: var(--spacing-4);
            color: var(--white);
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: var(--spacing-6);
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: var(--spacing-2);
            font-size: var(--font-size-base);
        }

        .form-input,
        .form-textarea {
            width: 100%;
            padding: var(--spacing-4);
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-lg);
            font-size: var(--font-size-base);
            transition: all var(--transition-fast);
            background: var(--white);
            color: var(--gray-800);
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--spacing-8);
        }

        .faq-section {
            background: var(--gray-50);
        }

        .faq-item {
            background: var(--white);
            border-radius: var(--radius-lg);
            margin-bottom: var(--spacing-4);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .faq-question {
            background: var(--gray-50);
            padding: var(--spacing-4) var(--spacing-6);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all var(--transition-fast);
            font-weight: 600;
            color: var(--gray-700);
        }

        .faq-question:hover {
            background: var(--gray-100);
        }

        .faq-question i {
            transition: transform var(--transition-fast);
        }

        .faq-question.active i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: var(--spacing-4) var(--spacing-6);
            border-top: 1px solid var(--gray-200);
            display: none;
            color: var(--gray-600);
        }

        .faq-answer.show {
            display: block;
        }

        .text-highlight {
            color: var(--white);
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

        .map-container {
            background: var(--gray-100);
            border-radius: var(--radius-xl);
            padding: var(--spacing-6);
            text-align: center;
            border: 2px dashed var(--gray-300);
        }

        .map-placeholder {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, var(--gray-200) 0%, var(--gray-300) 100%);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-500);
            font-size: var(--font-size-lg);
        }

        .btn-white {
            background: var(--white);
            color: var(--primary-color);
            border: 2px solid var(--white);
        }

        .btn-white:hover {
            background: var(--gray-50);
            color: var(--primary-dark);
        }

        .btn-outline-white {
            background: transparent;
            color: var(--white);
            border: 2px solid var(--white);
        }

        .btn-outline-white:hover {
            background: var(--white);
            color: var(--primary-color);
        }

        .bg-primary-color {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }

        .bg-gray-50 {
            background: var(--gray-50);
        }

        .text-gray-600 {
            color: var(--gray-600);
        }

        .text-gray-700 {
            color: var(--gray-700);
        }

        .text-gray-900 {
            color: var(--gray-900);
        }

        .text-white {
            color: var(--white);
        }

        .text-primary-color {
            color: var(--primary-color);
        }

        .opacity-90 {
            opacity: 0.9;
        }

        .space-y-6>*+* {
            margin-top: var(--spacing-6);
        }

        .space-y-4>*+* {
            margin-top: var(--spacing-4);
        }

        .grid-2 {
            grid-template-columns: repeat(2, 1fr);
        }

        .w-full {
            width: 100%;
        }

        .max-w-3xl {
            max-width: 48rem;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .text-2xl {
            font-size: var(--font-size-2xl);
        }

        .text-4xl {
            font-size: var(--font-size-4xl);
        }

        .text-sm {
            font-size: var(--font-size-sm);
        }

        .font-bold {
            font-weight: 700;
        }

        .font-medium {
            font-weight: 500;
        }

        .text-center {
            text-align: center;
        }

        .flex {
            display: flex;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .gap-4 {
            gap: var(--spacing-4);
        }

        .gap-6 {
            gap: var(--spacing-6);
        }

        .mb-2 {
            margin-bottom: var(--spacing-2);
        }

        .mb-4 {
            margin-bottom: var(--spacing-4);
        }

        .mb-6 {
            margin-bottom: var(--spacing-6);
        }

        .mb-8 {
            margin-bottom: var(--spacing-8);
        }

        .mt-2 {
            margin-top: var(--spacing-2);
        }

        .p-8 {
            padding: var(--spacing-8);
        }

        .transition {
            transition: all var(--transition-normal);
        }

        .hover\:text-primary-color:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .contact-form-card {
                margin-top: -30px;
                padding: var(--spacing-6);
            }

            .grid-2 {
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
                <a href="about.php" class="nav-link">About</a>
                <a href="contact.php" class="nav-link active">Contact</a>
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
        <section class="contact-hero">
            <div class="container">
                <div class="contact-content text-center">
                    <h1 class="section-title text-white mb-6">
                        Get in <span class="text-highlight">Touch</span>
                    </h1>
                    <p class="section-subtitle text-white opacity-90">
                        We're here to help! Reach out to us for any questions, support, or feedback.
                    </p>
                </div>
            </div>
        </section>

        <!-- Contact Form & Info -->
        <section class="p-8">
            <div class="container">
                <div class="contact-form-card">
                    <div class="contact-grid">
                        <!-- Contact Form -->
                        <div>
                            <h3 class="text-2xl font-bold mb-6">Send us a Message</h3>
                            <form id="contactForm" class="space-y-6">
                                <div class="grid grid-2 gap-4">
                                    <div class="form-group">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-input" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-input" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" class="form-input" required>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-input">
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Subject *</label>
                                    <select class="form-input" required>
                                        <option value="">Select a subject</option>
                                        <option value="booking">Booking Support</option>
                                        <option value="technical">Technical Issue</option>
                                        <option value="payment">Payment Question</option>
                                        <option value="refund">Refund Request</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="feedback">Feedback</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Message *</label>
                                    <textarea class="form-textarea" placeholder="Tell us how we can help you..."
                                        required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg w-full">
                                    <i class="fas fa-paper-plane"></i>
                                    Send Message
                                </button>
                            </form>
                        </div>

                        <!-- Contact Information -->
                        <div>
                            <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                            <div class="space-y-6">
                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <h4 class="font-bold mb-2">Our Location</h4>
                                    <p class="text-gray-600">123 Travel Street<br>City Center, State 12345<br>United
                                        States</p>
                                </div>

                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <h4 class="font-bold mb-2">Phone Numbers</h4>
                                    <p class="text-gray-600">
                                        <strong>Main:</strong> +1 (555) 123-4567<br>
                                        <strong>Support:</strong> +1 (555) 987-6543<br>
                                        <strong>Emergency:</strong> +1 (555) 999-8888
                                    </p>
                                </div>

                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <h4 class="font-bold mb-2">Email Addresses</h4>
                                    <p class="text-gray-600">
                                        <strong>General:</strong> info@ticketreserve.com<br>
                                        <strong>Support:</strong> support@ticketreserve.com<br>
                                        <strong>Sales:</strong> sales@ticketreserve.com
                                    </p>
                                </div>

                                <div class="contact-info-card">
                                    <div class="contact-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <h4 class="font-bold mb-2">Business Hours</h4>
                                    <p class="text-gray-600">
                                        <strong>Monday - Friday:</strong> 8:00 AM - 8:00 PM<br>
                                        <strong>Saturday:</strong> 9:00 AM - 6:00 PM<br>
                                        <strong>Sunday:</strong> 10:00 AM - 4:00 PM<br>
                                        <strong>24/7 Emergency Support Available</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <section class="p-8 bg-gray-50">
            <div class="container">
                <h2 class="section-title">Find Us</h2>
                <p class="section-subtitle">
                    Visit our office or explore our location
                </p>

                <div class="map-container">
                    <div class="map-placeholder">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt text-4xl mb-4"></i>
                            <p>Interactive Map Coming Soon</p>
                            <p class="text-sm mt-2">123 Travel Street, City Center, State 12345</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section p-8">
            <div class="container">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">
                    Quick answers to common questions
                </p>

                <div class="max-w-3xl mx-auto">
                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>How can I get help with my booking?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>You can contact our support team through phone, email, or live chat. We're available 24/7
                                to help with any booking-related issues.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>What payment methods do you accept?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>We accept all major credit cards, bank transfers, mobile money, and cash payments. All
                                transactions are secure and encrypted.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>How do I request a refund?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>To request a refund, please contact our support team with your order reference number.
                                We'll process your request within 3-5 business days.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>Can I change my booking details?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Yes, you can modify your booking up to 24 hours before departure. Please contact our
                                support team for assistance with changes.</p>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question" onclick="toggleFaq(this)">
                            <span>What if I lose my ticket?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>No worries! You can retrieve and re-print your ticket using your order reference number
                                on our website or by contacting our support team.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="p-8 bg-primary-color">
            <div class="container">
                <div class="text-center text-white">
                    <h2 class="section-title text-white mb-6">Ready to Book Your Next Trip?</h2>
                    <p class="section-subtitle text-white opacity-90 mb-8">
                        Experience seamless booking with our modern platform.
                    </p>
                    <div class="flex justify-center gap-6 flex-wrap">
                        <a href="booking/index.php" class="btn btn-white btn-lg">
                            <i class="fas fa-rocket"></i>
                            Start Booking
                        </a>
                        <a href="about.php" class="btn btn-outline-white btn-lg">
                            <i class="fas fa-info-circle"></i>
                            Learn More
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

            // Contact form handling
            const contactForm = Utils.$('#contactForm');
            if (contactForm) {
                Utils.on(contactForm, 'submit', function (e) {
                    e.preventDefault();

                    // Show success message
                    const submitBtn = contactForm.querySelector('button[type="submit"]');
                    const originalText = submitBtn.innerHTML;

                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
                    submitBtn.disabled = true;

                    setTimeout(() => {
                        alert('Thank you for your message! We\'ll get back to you soon.');
                        contactForm.reset();
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }, 2000);
                });
            }

            // Animate elements on scroll
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

            Utils.$$('.contact-info-card, .faq-item').forEach(item => {
                observer.observe(item);
            });
        });

        // FAQ toggle function
        function toggleFaq(element) {
            const answer = element.nextElementSibling;
            const isActive = element.classList.contains('active');

            // Close all other FAQs
            Utils.$$('.faq-question').forEach(q => {
                q.classList.remove('active');
                q.nextElementSibling.classList.remove('show');
            });

            // Toggle current FAQ
            if (!isActive) {
                element.classList.add('active');
                answer.classList.add('show');
            }
        }
    </script>
</body>

</html>