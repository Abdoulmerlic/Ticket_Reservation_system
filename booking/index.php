<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Ticket - TicketReserve System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="../assets/css/main.css">

    <!-- Additional styles for booking page -->
    <style>
        /* Booking specific styles */
        .booking-hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            position: relative;
            overflow: hidden;
        }

        .booking-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }

        .order-ref-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-xl);
            padding: var(--spacing-6);
            text-align: center;
            margin: var(--spacing-6) 0;
        }

        .order-ref-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--white);
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            margin: var(--spacing-4) 0;
            padding: var(--spacing-4);
            background: rgba(255, 255, 255, 0.2);
            border-radius: var(--radius-lg);
            display: inline-block;
        }

        .action-buttons {
            display: flex;
            gap: var(--spacing-4);
            justify-content: center;
            flex-wrap: wrap;
            margin-top: var(--spacing-8);
        }

        .feature-highlights {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: var(--spacing-6);
            margin-top: var(--spacing-8);
        }

        .feature-item {
            background: var(--white);
            padding: var(--spacing-6);
            border-radius: var(--radius-xl);
            text-align: center;
            box-shadow: var(--shadow-md);
            transition: all var(--transition-normal);
            border: 1px solid var(--gray-200);
        }

        .feature-item:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .feature-item i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: var(--spacing-4);
        }

        .retrieve-section {
            background: var(--gray-50);
            border-radius: var(--radius-xl);
            padding: var(--spacing-8);
            margin-top: var(--spacing-8);
        }

        .search-form {
            display: flex;
            gap: var(--spacing-4);
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: var(--spacing-6);
        }

        .search-input {
            min-width: 300px;
            padding: var(--spacing-4);
            border: 2px solid var(--gray-300);
            border-radius: var(--radius-lg);
            font-size: var(--font-size-base);
            transition: all var(--transition-fast);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .faq-section {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: var(--spacing-8);
            margin-top: var(--spacing-8);
            box-shadow: var(--shadow-md);
        }

        .faq-item {
            border: 1px solid var(--gray-200);
            border-radius: var(--radius-lg);
            margin-bottom: var(--spacing-4);
            overflow: hidden;
        }

        .faq-question {
            background: var(--gray-50);
            padding: var(--spacing-4) var(--spacing-6);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all var(--transition-fast);
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
        }

        .faq-answer.show {
            display: block;
        }

        .loading-animation {
            text-align: center;
            padding: var(--spacing-8);
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 4px solid var(--gray-200);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto var(--spacing-4);
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .success-animation {
            animation: successPulse 0.6s ease-in-out;
        }

        @keyframes successPulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .search-form {
                flex-direction: column;
                align-items: stretch;
            }

            .search-input {
                min-width: auto;
            }

            .feature-highlights {
                grid-template-columns: 1fr;
            }

            .order-ref-number {
                font-size: 1.5rem;
                padding: var(--spacing-3);
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
                <a href="../index.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    Home
                </a>
                <a href="index.php" class="nav-link active">
                    <i class="fas fa-ticket-alt"></i>
                    Book Tickets
                </a>
                <a href="faqs.php" class="nav-link">
                    <i class="fas fa-question-circle"></i>
                    FAQs
                </a>
            </nav>

            <div class="flex items-center gap-4">
                <a href="../admin/login.php" class="btn btn-secondary">
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
        <!-- Booking Hero Section -->
        <section class="booking-hero p-8">
            <div class="container">
                <div class="text-center text-white">
                    <h1 class="mb-4">
                        <i class="fas fa-ticket-alt"></i>
                        Welcome to Ticket Booking
                    </h1>
                    <p class="text-xl mb-6 opacity-90">
                        Your journey begins here. Book your tickets with ease and confidence.
                    </p>

                    <div class="order-ref-card">
                        <h3 class="mb-4">
                            <i class="fas fa-hashtag"></i>
                            Your Order Reference
                        </h3>
                        <div class="order-ref-number">
                            <?php echo isset($_SESSION['ORDERREF']) ? $_SESSION['ORDERREF'] : 'Generating...'; ?>
                        </div>
                        <p class="opacity-90">Keep this reference number safe for future use</p>
                    </div>

                    <div class="action-buttons">
                        <a href="booking.php" class="btn btn-primary btn-lg">
                            <i class="fas fa-rocket"></i>
                            Start Booking
                        </a>
                        <a href="../admin/login.php" class="btn btn-secondary btn-lg">
                            <i class="fas fa-user-shield"></i>
                            Admin Access
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Loading Section -->
        <section class="p-8 bg-white">
            <div class="container">
                <div id="err001" class="loading-animation">
                    <div class="loading-spinner"></div>
                    <h3 class="mb-4">Generating Your Order...</h3>
                    <p class="text-gray-600">Creating a unique order reference for your booking. Please wait a moment.
                    </p>
                    <div id="proceed"></div>
                </div>

                <!-- Feature Highlights -->
                <div class="feature-highlights">
                    <div class="feature-item">
                        <i class="fas fa-rocket"></i>
                        <h4 class="mb-2">Fast Booking</h4>
                        <p class="text-gray-600">Complete your reservation in minutes</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <h4 class="mb-2">Secure</h4>
                        <p class="text-gray-600">Bank-level security for your data</p>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-mobile-alt"></i>
                        <h4 class="mb-2">Mobile Ready</h4>
                        <p class="text-gray-600">Works perfectly on all devices</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Retrieve Ticket Section -->
        <section class="p-8 bg-gray-50">
            <div class="container">
                <div class="retrieve-section">
                    <h3 class="text-center mb-6">
                        <i class="fas fa-search"></i>
                        Lost Your Ticket?
                    </h3>
                    <p class="text-center text-gray-600 mb-6">
                        Enter your order reference number to retrieve and re-print your ticket.
                    </p>

                    <form onsubmit="return ordval(this)" class="search-form">
                        <div class="relative">
                            <input type="text" id="refinput" class="search-input" placeholder="Enter Order Reference"
                                required>
                            <i
                                class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <button id="printbtn" class="btn btn-primary">
                            <i class="fas fa-print"></i>
                            Re-print Ticket
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="p-8 bg-white">
            <div class="container">
                <div class="faq-section">
                    <h3 class="text-center mb-8">
                        <i class="fas fa-question-circle"></i>
                        Frequently Asked Questions
                    </h3>

                    <div class="faq-list">
                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>What is an Order Reference?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>An Order Reference Number is a unique system-generated number that identifies your
                                    ticket as well as booking information.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>Can I retrieve or re-print a lost ticket?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Yes! It's possible to retrieve your ticket. Just provide the Order Reference number
                                    above and the system will validate and re-print your ticket.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>How long does booking take?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>The entire booking process typically takes 3-5 minutes. You'll receive instant
                                    confirmation once payment is processed.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question" onclick="toggleFaq(this)">
                                <span>What payment methods are accepted?</span>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>We accept various payment methods including bank transfers, mobile money, and cash
                                    payments. All transactions are secure and encrypted.</p>
                            </div>
                        </div>
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
                <a href="../index.php">
                    <i class="fas fa-home"></i>
                    Home
                </a>
                <a href="../about.php">
                    <i class="fas fa-info-circle"></i>
                    About
                </a>
                <a href="../contact.php">
                    <i class="fas fa-envelope"></i>
                    Contact
                </a>
                <a href="index.php">
                    <i class="fas fa-ticket-alt"></i>
                    Book Tickets
                </a>
                <a href="../admin/login.php">
                    <i class="fas fa-user-shield"></i>
                    Admin
                </a>
            </nav>
        </div>
    </footer>

    <?php
    function generate_order()
    {
        //These are just Random Letters forming a transaction ID
        $order_ref = "";
        $char = array('O', 'T', 'R', 'S', 'A', 'C', 'B', 'E');
        $num = rand(11, 99);
        $num2 = rand(12, 89);
        $num3 = rand(13, 92);
        shuffle($char);
        //now the final
        $order_ref = $char[0] . $char[3] . $num . $char[1] . $num2 . $char[2] . $num3 . $char[4];
        //assignming to user
        $_SESSION['ORDERREF'] = $order_ref;
    }

    if (!isset($_SESSION['ORDERREF']) || empty($_SESSION['ORDERREF'])) {
        generate_order();
    }
    ?>

    <!-- Scripts -->
    <script src="../assets/js/utils.js"></script>
    <script src="order_validate.js"></script>
    <script>
        // Initialize functionality
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile menu toggle
            const mobileToggle = Utils.$('.mobile-menu-toggle');
            const nav = Utils.$('.nav');

            if (mobileToggle && nav) {
                Utils.on(mobileToggle, 'click', function () {
                    mobileToggle.classList.toggle('active');
                    nav.classList.toggle('mobile-open');
                });
            }

            // Header scroll effect
            Utils.on(window, 'scroll', function () {
                const header = Utils.$('.header');
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > 100) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Loading animation
            setTimeout(function () {
                const loadingSection = Utils.$('#err001');
                const proceedDiv = Utils.$('#proceed');

                if (loadingSection && proceedDiv) {
                    loadingSection.classList.add('success-animation');
                    loadingSection.innerHTML = `
                        <div class="text-center">
                            <i class="fas fa-check-circle text-6xl text-green-500 mb-4"></i>
                            <h3 class="mb-4 text-green-600">Ready to Book!</h3>
                            <p class="text-gray-600 mb-6">Your order reference has been generated successfully.</p>
                            <div class="flex justify-center gap-4 flex-wrap">
                                <a href="booking.php" class="btn btn-primary">
                                    <i class="fas fa-rocket"></i>
                                    Start Booking
                                </a>
                                <a href="../admin/login.php" class="btn btn-secondary">
                                    <i class="fas fa-user-shield"></i>
                                    Admin Access
                                </a>
                            </div>
                        </div>
                    `;
                }
            }, 3000);

            // Animate feature items on scroll
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

            Utils.$$('.feature-item').forEach(item => {
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