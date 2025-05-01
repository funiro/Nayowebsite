<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Nancholi Youth Organization</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .contact-page {
            padding: 4rem 2rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .contact-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .contact-header h1 {
            color: #2c3e50;
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .contact-header p {
            color: #34495e;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            margin-bottom: 4rem;
        }

        .contact-info {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .contact-info h2 {
            color: #2c3e50;
            margin-bottom: 2rem;
        }

        .info-section {
            margin-bottom: 2rem;
        }

        .info-section i {
            color: #2c3e50;
            font-size: 1.5rem;
            margin-right: 1rem;
        }

        .info-section h3 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .info-section p {
            color: #6c757d;
            margin: 0;
        }

        .contact-form {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2c3e50;
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
            outline: none;
        }

        .submit-btn {
            background: #2c3e50;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background: #34495e;
            transform: translateY(-2px);
        }

        .success-message, .error-message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
            text-align: center;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        @media (max-width: 768px) {
            .contact-page {
                padding: 2rem 1rem;
            }

            .contact-header h1 {
                font-size: 2.5rem;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .contact-info {
                padding: 1.5rem;
            }

            .contact-form {
                padding: 2rem;
            }
        }
    </style>
    <script src="js/main.js" defer></script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Nancholi Youth Organization (NAYO)",
      "alternateName": "NAYO",
      "url": "https://nayomalawi.org/",
      "logo": "https://nayomalawi.org/images/logo.png",
      "description": "NAYO is a leading NGO in Malawi providing healthcare services, youth development programs, HIV/AIDS care, palliative care, and educational support in Blantyre and surrounding areas.",
      "email": "info@nayomalawi.org",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "P.O. Box 1624",
        "addressLocality": "Blantyre",
        "addressCountry": "MW"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "General Inquiries",
        "email": "info@nayomalawi.org"
      }
    }
    </script>
</head>
<body>
    <header>
        <nav class="main-nav">
            <div class="logo">
                <a href="index.php" class="logo-link">
                    <img src="images/logo.png" alt="NAYO Logo" class="logo-img">
                    <span class="tagline">One Heart,<br>One Community</span>
                </a>
            </div>
            <button class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links">
                <li><a href="index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">PROJECTS</a>
                    <ul class="dropdown-menu">
                        <li><a href="art.php">ART</a></li>
                        <li><a href="antenatal.php">ANTENATAL CARE</a></li>
                        <li><a href="palliative.php">PALLIATIVE CARE</a></li>
                        <li><a href="student.php">STUDENT SUPPORT</a></li>
                        <li><a href="outreach.php">OUTREACH PROGRAMS</a></li>
                        <li><a href="youth.php">YOUTH FRIENDLY SERVICES</a></li>
                    </ul>
                </li>
                <li><a href="events.php">EVENTS</a></li>
                <li><a href="index.html#staff">STAFF</a></li>
                <li><a href="volunteer.php">VOLUNTEER</a></li>
                <li><a href="https://www.every.org/nancholi-youth-organization?search_meta=" class="donate-btn">Donate</a></li>
            </ul>
        </nav>
    </header>

    <main class="contact-page">
        <div class="contact-container">
            <div class="contact-header">
                <h1>Get in Touch</h1>
                <p>We're here to help! Whether you have questions, want to collaborate, or just want to say hello, we'd love to hear from you.</p>
            </div>

            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Our Contact Information</h2>
                    <div class="info-section">
                        <i class="fas fa-envelope"></i>
                        <h3>Email</h3>
                        <p>info@nayomalawi.org</p>
                    </div>
                    <div class="info-section">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Location</h3>
                        <p>P.O. Box 1624<br>Blantyre, Malawi</p>
                    </div>
                    <div class="info-section">
                        <i class="fas fa-clock"></i>
                        <h3>Office Hours</h3>
                        <p>Monday - Friday<br>9:00 AM - 5:00 PM</p>
                    </div>
                    <div class="info-section">
                        <i class="fas fa-phone"></i>
                        <h3>Phone</h3>
                        <p>+265 1 755 000</p>
                    </div>
                </div>

                <div class="contact-form">
                    <h2>Send us a Message</h2>
                    <form id="contact-form" action="php/contact_form_handler.php" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Include footer -->
    <?php include 'includes/footer.php'; ?>

    <script>
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = form.querySelector('.submit-btn');
        const successMessage = document.createElement('div');
        const errorMessage = document.createElement('div');

        successMessage.className = 'success-message';
        errorMessage.className = 'error-message';

        submitBtn.innerHTML = 'Sending...';
        submitBtn.disabled = true;

        fetch('php/contact_form_handler.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams(new FormData(form))
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                successMessage.textContent = 'Thank you! Your message has been sent successfully.';
                form.reset();
            } else {
                errorMessage.textContent = 'There was an error sending your message. Please try again.';
            }
            
            form.insertBefore(successMessage, form.firstChild);
            form.insertBefore(errorMessage, form.firstChild);
            
            setTimeout(() => {
                successMessage.style.display = 'block';
                errorMessage.style.display = 'block';
            }, 100);

            setTimeout(() => {
                successMessage.style.display = 'none';
                errorMessage.style.display = 'none';
            }, 5000);
        })
        .catch(error => {
            errorMessage.textContent = 'There was an error sending your message. Please try again.';
            form.insertBefore(errorMessage, form.firstChild);
            setTimeout(() => {
                errorMessage.style.display = 'block';
            }, 100);
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        })
        .finally(() => {
            submitBtn.innerHTML = 'Send Message';
            submitBtn.disabled = false;
        });
    });
    </script>
</body>
</html>
