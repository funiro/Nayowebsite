<?php
session_start();
$page_title = "Volunteer with NAYO | Nancholi Youth Organization";
?>

<?php include_once 'includes/header.php'; ?>
    <style>
        .volunteer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .volunteer-hero {
            text-align: center;
            margin-bottom: 3rem;
        }

        .volunteer-hero h1 {
            color: #2c3e50;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .volunteer-hero p {
            color: #666;
            font-size: 1.2rem;
        }

        .volunteer-form-section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            padding: 2rem;
            margin: 0 auto;
            max-width: 800px;
        }

        .form-container {
            width: 100%;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 600;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2c3e50;
            outline: none;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 0.5rem;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: normal;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }

        .checkbox-group label:hover {
            background-color: #f5f5f5;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin: 0;
            position: relative;
            appearance: none;
            -webkit-appearance: none;
            border: 2px solid #2c3e50;
            border-radius: 4px;
            background-color: white;
            transition: all 0.2s ease;
        }

        .checkbox-group input[type="checkbox"]:checked {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }

        .checkbox-group input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 14px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: #666;
            padding: 0.5rem;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }

        .checkbox-label:hover {
            background-color: #f5f5f5;
        }

        .checkbox-label input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            margin: 0;
            position: relative;
            appearance: none;
            -webkit-appearance: none;
            border: 2px solid #2c3e50;
            border-radius: 4px;
            background-color: white;
            transition: all 0.2s ease;
        }

        .checkbox-label input[type="checkbox"]:checked {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }

        .checkbox-label input[type="checkbox"]:checked::after {
            content: '✓';
            position: absolute;
            color: white;
            font-size: 14px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .checkbox-label a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 600;
        }

        .checkbox-label a:hover {
            text-decoration: underline;
        }

        .submit-btn {
            background-color: #2c3e50;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 2rem auto 0;
            width: 200px;
        }

        .submit-btn:hover {
            background-color: #1a252f;
        }

        .submit-btn:disabled {
            background-color: #95a5a6;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .volunteer-content {
                padding: 1rem;
            }

            .volunteer-form-section {
                padding: 1.5rem;
            }

            .checkbox-group {
                grid-template-columns: 1fr;
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
      },
      "sameAs": [
        "https://www.linkedin.com/company/nancholi-youth-organisation-nayo/",
        "https://www.givey.com/nayoukschoolfundraiser20232024",
        "https://www.every.org/nancholi-youth-organization"
      ]
    }
    </script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main class="volunteer-content">
        <section class="volunteer-hero">
            <h1>Volunteer with NAYO</h1>
            <p>Join our team and make a difference in the lives of youth and communities in Malawi</p>
        </section>

        <section class="volunteer-form-section">
            <div class="form-container">
                <form id="volunteer-form" action="php/volunteer_form_handler.php" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="skills">Skills and Expertise *</label>
                        <textarea id="skills" name="skills" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="availability">Availability (Duration and Time Commitment) *</label>
                        <textarea id="availability" name="availability" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="interests">Areas of Interest *</label>
                        <div class="checkbox-group">
                            <label>
                                <input type="checkbox" name="interests[]" value="Healthcare">
                                <span>Healthcare Services</span>
                            </label>
                            <label>
                                <input type="checkbox" name="interests[]" value="Education">
                                <span>Education Support</span>
                            </label>
                            <label>
                                <input type="checkbox" name="interests[]" value="Youth">
                                <span>Youth Development</span>
                            </label>
                            <label>
                                <input type="checkbox" name="interests[]" value="Community">
                                <span>Community Outreach</span>
                            </label>
                            <label>
                                <input type="checkbox" name="interests[]" value="Administration">
                                <span>Administration</span>
                            </label>
                            <label>
                                <input type="checkbox" name="interests[]" value="Other">
                                <span>Other</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="why_volunteer">Why do you want to volunteer with NAYO? *</label>
                        <textarea id="why_volunteer" name="why_volunteer" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-label">
                            <input type="checkbox" name="terms" required>
                            <span>I agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a> *</span>
                        </label>
                    </div>

                    <button type="submit" class="submit-btn">Submit Application</button>
                </form>
            </div>
        </section>
    </main>

    <!-- Include footer -->`n    <?php include 'includes/footer.php'; ?>

    <script>
    document.getElementById('volunteer-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = form.querySelector('.submit-btn');
        const originalBtnText = submitBtn.textContent;
        
        // Disable submit button and show loading state
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';
        
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                alert(data.message);
                form.reset();
                // Redirect to thank you page
                window.location.href = 'thank-you.html';
            } else {
                // Show error message with debug info
                const errorMessage = data.message + '\n\nDebug Information:\n' + data.debug;
                console.error('Form submission error:', data.debug);
                alert(errorMessage);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('There was an error submitting your form. Please try again.\n\nError details: ' + error.message);
        })
        .finally(() => {
            // Reset button state
            submitBtn.disabled = false;
            submitBtn.textContent = originalBtnText;
        });
    });
    </script>
<!-- Include footer -->`n    <?php include 'includes/footer.php'; ?>`n</body>
</html> 

