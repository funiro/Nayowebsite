<footer>
    <div class="footer-top">
        <div class="footer-container">
            <div class="footer-columns">
                <div class="footer-column">
                    <div class="footer-logo">
                        <a href="<?php echo $base_url; ?>/index.php">
                            <img src="<?php echo $base_url; ?>/images/logo.png" alt="NAYO Logo" class="footer-logo-img" loading="lazy" onerror="this.onerror=null; this.src='images/logo.png';">
                        </a>
                    </div>
                    <div class="footer-address">
                        <p>Nancholi Youth Organisation (NAYO)</p>
                        <p>P.O. Box 1624, Blantyre, Malawi</p>
                        <p>Email: info@nayomalawi.org</p>
                        <div class="footer-social-top">
                            <a href="https://www.facebook.com/nayomalawi/" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                            <a href="https://x.com/nayo_malawi?t=wtvMMN8hWUn3ZA-5r5GbLg&s=09" target="_blank" rel="noopener noreferrer" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                            <a href="https://www.instagram.com/nayo_malawi/profilecard/?igsh=ZDFnbDdkN2huOHB4" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h4>USEFUL LINKS</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo $base_url; ?>/index.php"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="<?php echo $base_url; ?>/contact.php"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                        <li><a href="<?php echo $base_url; ?>/staff.php"><i class="fas fa-chevron-right"></i> Staff</a></li>
                        <li><a href="<?php echo $base_url; ?>/volunteer.php"><i class="fas fa-chevron-right"></i> Volunteer</a></li>
                        <li><a href="<?php echo $base_url; ?>/contact.php"><i class="fas fa-chevron-right"></i> Donate</a></li>
                        <li><a href="<?php echo $base_url; ?>/board.php"><i class="fas fa-chevron-right"></i> Board Members</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h4>PROGRAMS</h4>
                    <ul class="footer-links">
                        <li><a href="<?php echo $base_url; ?>/art.php"><i class="fas fa-chevron-right"></i> ART</a></li>
                        <li><a href="<?php echo $base_url; ?>/antenatal.php"><i class="fas fa-chevron-right"></i> Antenatal Care</a></li>
                        <li><a href="<?php echo $base_url; ?>/palliative.php"><i class="fas fa-chevron-right"></i> Palliative Care</a></li>
                        <li><a href="<?php echo $base_url; ?>/student.php"><i class="fas fa-chevron-right"></i> Student Support</a></li>
                        <li><a href="<?php echo $base_url; ?>/outreach.php"><i class="fas fa-chevron-right"></i> Outreach Programs</a></li>
                        <li><a href="<?php echo $base_url; ?>/youth.php"><i class="fas fa-chevron-right"></i> Youth Friendly Services</a></li>
                    </ul>
                </div>
            </div>
        </div>
    
    <div class="partners-section" style="background: none !important; padding: 0 !important; margin: 40px 0 0 0 !important; position: relative;">
        <h2 class="partners-heading" style="margin: 0 0 20px 0 !important; padding: 0 !important; background: none !important; color: #ffffff !important; text-transform: uppercase; letter-spacing: 2px; font-size: 2rem; font-weight: 700; line-height: 1.2;">
            OUR PARTNERS
        </h2>
    </div>
    <div class="partners-container-wrapper" style="background: none !important; box-shadow: none !important; border: none !important; outline: none !important; position: relative;">
        <div class="partners-container" style="background: none !important; box-shadow: none !important; border: none !important; outline: none !important; position: relative;">
            <button class="partners-nav prev" id="partners-prev" aria-label="Previous partners">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="partners-scroll-container" id="partners-scroll">
                <style>
                    /* Partners Section */
                    .partners-section {
                        text-align: center;
                        margin: 3rem 0 1.5rem;
                        width: 100%;
                        background: none !important;
                        padding: 0 !important;
                    }
                    .partners-heading {
                        color: #ffffff !important;
                        font-size: 2rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        letter-spacing: 2px;
                        margin: 0 0 2rem 0 !important;
                        padding: 0 !important;
                        line-height: 1.2;
                    }
                    /* Removed link styles as the heading is no longer a link */
                    .partners-container-wrapper {
                        width: 100%;
                        position: relative;
                        margin: 0 auto;
                        padding: 20px 0;
                        background: none !important;
                    }
                    .partner-logo {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        width: 140px;
                        height: 80px;
                        background-color: #f9f9f9;
                        border-radius: 8px;
                        padding: 10px;
                        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                        margin: 0 10px;
                    }
                    .partner-logo img {
                        max-width: 100%;
                        max-height: 100%;
                        object-fit: contain;
                    }
                    .partner-logo:hover {
                        transform: scale(1.05);
                    }
                </style>
                <!-- Official NAYO partners only -->
                <?php
                // Define image paths for both localhost and live server
                $isLocalhost = strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false;
                $imagePath = $isLocalhost ? '/dashboard/nayo-website/images/Partners/' : '/images/Partners/';
                
                $partners = [
                    ['name' => 'Stephen Lewis Foundation', 'url' => 'https://stephenlewisfoundation.org/', 'image' => 'Stephen.png'],
                    ['name' => 'Masana wa Africa', 'url' => 'https://www.masanawaafrika.org/', 'image' => 'Masana+wa+Afrika.png'],
                        ['name' => 'Luena Foundation', 'url' => 'https://luena.org/', 'image' => 'Luena.png'],
                        ['name' => 'NAYO UK Fundraisers', 'url' => 'https://www.givey.com/nayoukschoolfundraiser20232024', 'image' => 'nayouk.png'],
                        ['name' => 'K2 Foundation', 'url' => 'https://k2.foundation/', 'image' => 'k2.png'],
                        ['name' => 'Ministry of Health', 'url' => 'https://www.health.gov.mw/', 'image' => 'Malawi.png'],
                        ['name' => 'UNAIDS', 'url' => 'https://www.unaids.org/', 'image' => 'Unaids.png'],
                        ['name' => 'FOCCAD', 'url' => 'https://foccad.org', 'image' => 'Foccad.jpg'],
                        ['name' => 'COPRED', 'url' => '#', 'image' => 'Copred.png']
                    ];
                    
                    foreach ($partners as $partner): ?>
                        <a href="<?php echo $partner['url']; ?>" target="_blank" class="partner-logo">
                            <img 
                                src="<?php echo $imagePath . $partner['image']; ?>" 
                                alt="<?php echo $partner['name']; ?>" 
                                loading="lazy"
                            >
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="partners-nav next" id="partners-next" aria-label="Next partners" style="background: #f9f9f9 !important; box-shadow: none !important; border: 1px solid #006b41 !important; color: #006b41 !important;">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const partnersScroll = document.getElementById('partners-scroll');
        const prevBtn = document.getElementById('partners-prev');
        const nextBtn = document.getElementById('partners-next');
        const scrollAmount = 300; // Adjust this value to control how much to scroll
        
        if (partnersScroll && prevBtn && nextBtn) {
            // Previous button click handler
            prevBtn.addEventListener('click', function() {
                partnersScroll.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });
            
            // Next button click handler
            nextBtn.addEventListener('click', function() {
                partnersScroll.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
            
            // Hide/show buttons based on scroll position
            const updateButtonVisibility = () => {
                const scrollLeft = partnersScroll.scrollLeft;
                const maxScroll = partnersScroll.scrollWidth - partnersScroll.clientWidth;
                
                // Show/hide previous button
                if (scrollLeft <= 10) {
                    prevBtn.style.opacity = '0.5';
                    prevBtn.style.cursor = 'default';
                } else {
                    prevBtn.style.opacity = '1';
                    prevBtn.style.cursor = 'pointer';
                }
                
                // Show/hide next button
                if (scrollLeft >= maxScroll - 10) {
                    nextBtn.style.opacity = '0.5';
                    nextBtn.style.cursor = 'default';
                } else {
                    nextBtn.style.opacity = '1';
                    nextBtn.style.cursor = 'pointer';
                }
            };
            
            // Initial check
            updateButtonVisibility();
            
            // Update on scroll
            partnersScroll.addEventListener('scroll', updateButtonVisibility);
        }
    });
    </script>

    <div class="footer-bottom">
        <div class="footer-container">
            <div class="footer-slogan">
                <a href="<?php echo $base_url; ?>/index.php" class="typewrite" data-period="2000" data-type='[ "One Heart, One Community", "Empowering Youth", "Building Communities", "Changing Lives" ]'><span class="wrap"></span></a>
            </div>
            <script>
            // Typing effect for footer slogan
            var TxtType = function(el, toRotate, period) {
                this.toRotate = toRotate;
                this.el = el;
                this.loopNum = 0;
                this.period = parseInt(period, 10) || 2000;
                this.txt = '';
                this.tick();
                this.isDeleting = false;
            };

            TxtType.prototype.tick = function() {
                var i = this.loopNum % this.toRotate.length;
                var fullTxt = this.toRotate[i];

                if (this.isDeleting) {
                    this.txt = fullTxt.substring(0, this.txt.length - 1);
                } else {
                    this.txt = fullTxt.substring(0, this.txt.length + 1);
                }

                this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

                var that = this;
                var delta = 200 - Math.random() * 100;

                if (this.isDeleting) { delta /= 2; }

                if (!this.isDeleting && this.txt === fullTxt) {
                    delta = this.period;
                    this.isDeleting = true;
                } else if (this.isDeleting && this.txt === '') {
                    this.isDeleting = false;
                    this.loopNum++;
                    delta = 500;
                }

                setTimeout(function() {
                    that.tick();
                }, delta);
            };

            window.onload = function() {
                var elements = document.getElementsByClassName('typewrite');
                for (var i=0; i<elements.length; i++) {
                    var toRotate = elements[i].getAttribute('data-type');
                    var period = elements[i].getAttribute('data-period');
                    if (toRotate) {
                      new TxtType(elements[i], JSON.parse(toRotate), period);
                    }
                }
                // INJECT CSS
                var css = document.createElement("style");
                css.type = "text/css";
                css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid rgba(255,255,255,0.7); }";
                document.body.appendChild(css);
            };
            </script>

            <div class="footer-copyright">
                <div class="copyright">&copy; 2025 Nancholi Youth Organisation. All rights reserved.</div>
            </div>
            </div>
        </div>
    </div>
</footer>

<!-- Mobile Menu JavaScript -->
<script src="<?php echo $base_url; ?>/js/mobile-menu.js?ver=1.0"></script>
