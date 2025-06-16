<?php
$page_title = "Our Staff | Nancholi Youth Organization (NAYO)";
ob_start(); // Start output buffering
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Staff Page Custom Styles */
        .staff-page {
            padding-top: 0;
        }
        
        .staff-card {
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
        }
        
        .staff-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }
        
        .staff-card:hover .staff-image img {
            transform: scale(1.1);
        }
        
        .linkedin:hover {
            color: #0a66c2 !important;
            transform: scale(1.2);
        }
        
        @media (max-width: 768px) {
            .staff-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)) !important;
                gap: 1.5rem !important;
            }
            
            .page-header h1 {
                font-size: 2.2rem !important;
            }
            
            .page-header p {
                font-size: 1.2rem !important;
            }
        }
        
        @media (max-width: 480px) {
            .staff-grid {
                grid-template-columns: 1fr !important;
            }
            
            .page-header h1 {
                font-size: 1.8rem !important;
            }
            
            .page-header p {
                font-size: 1rem !important;
            }
        }
    </style>
</head>
<body>
<?php include_once 'includes/header.php'; ?>

    <main class="staff-page">
        <section class="page-header">
            <h1 style="color: var(--primary-color);">Our Staff</h1>
            <p>Meet the dedicated professionals who make our mission possible.</p>
        </section>

        <!-- Staff Section -->
        <section class="staff-section section-padding" style="background-color: #f7f7f7; padding: 4rem 0;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
                <div class="staff-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem; padding: 0 10px;">
                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/george-nedi.jpg" alt="George Nedi" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">George Nedi</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Executive Director</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>George Nedi brings over 20 years of experience and expertise to Nancholi Youth Organization. Currently serving as NAYO's Executive Director, George holds a Master's degree in Business Administration and has helped position Nancholi Youth Organisation as one the leading Non-governmental Organisations in Malawi.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://www.linkedin.com/feed/update/urn:li:activity:7340310731629768704/" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/watson-shuzi.jpg" alt="Watson Shuzi" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Watson Shuzi</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Head of Programs</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Watson Shuzi has a background in public health and community development. He is one of the founding members and has been instrumental in developing NAYO's health programs since its inception in 2004.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/Patson.jpg" alt="Patson Gondwe" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Patson Gondwe</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Head of Finance</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Patson Gondwe is a Chartered Accountant and currently serves as the Head of Finance at Nancholi Youth Organisation. He joined the organisation in 2019 and has since brought a wealth of financial expertise and strategic insight to the team.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://www.linkedin.com/in/patson-gondwe-531326107" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/moses-mageza.jpg" alt="Moses Mageza" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Moses Mageza</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Human Resource Manager</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Moses Mageza is the Human Resource Manager at Nancholi Youth Organisation. As one of the founding members of the organization, our shared vision and passion leads to one common goal. He has over 10 years of experience in Human Resource management. With a background in human resource management, he ensures that the organization has the right talent and maintains a positive work environment.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/mloiso.JPG" alt="Mloiso M Katete" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Mloiso M Katete</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Programs Manager</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Mloiso M. Katete is a specialist in youth and community development, with a strong focus on designing sustainable and impactful engagement initiatives. Holding a degree in Community Development, he brings both academic knowledge and practical experience to his work.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/Chifuniro.jpg" alt="Chifuniro Masamba" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Chifuniro Masamba</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Media and Communications Officer</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Chifuniro Masamba is a Communication Specialist trained under Malawi Institute of Journalism and Malawi University of Applied Sciences. He has a Diploma in Journalism and pending Business Communication Degree.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://www.linkedin.com/in/chifuniro-masamba-7696061b4/" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/Annie.jpg" alt="Annie Magoli" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Annie Magoli</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Project Officer</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Annie Magoli is a Project Officer at Nancholi Youth Organization, where she has been serving since 2017. She holds a Diploma in Community Development and is passionate about grassroots engagement and empowering communities through sustainable development initiatives.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/Rabecca.jpg" alt="Rabecca Nanungu" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Rabecca Nanungu</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Project Officer</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Rebecca Nanungu is a Project Officer at Nancholi Youth Organization. She joined the organization in 2019 and holds an Advanced Diploma in Nutrition and Food Security. Her work focuses on promoting sustainable nutrition practices and improving food security in local communities.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/Tamanda.jpg" alt="Tamanda Moyo" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Tamanda Moyo</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Field Officer</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Tamanda Moyo is a Field Officer at Nancholi Youth Organization, having joined the team in July 2024. She holds a Postgraduate Diploma in Public Health and is committed to improving community health outcomes through hands-on support and field-based initiatives.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/Philip.jpg" alt="Philip Puluputu" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Philip Puluputu</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Field Officer</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Phillip Puluputu is a Field Officer who has been with Nancholi Youth Organization since 2016. He holds diplomas in Community Development, Child Development, and Psychosocial Counselling. He is currently pursuing a Bachelor of Social Science in Social Work at the prestigious University of Malawi, further strengthening his commitment to community service and development.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/in/phillip-puluputu-iii-143b2a2a4" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/Chikumbutso.jpg" alt="Chikumbutso Chimphamba Nyanyaliwa" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Chikumbutso Chimphamba Nyanyaliwa</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Service Provider</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Chikumbutso Chimphamba Nyanyaliwa joined Nancholi Youth Organisation on 4th October 2021. She holds a Diploma in Nursing and Midwifery as well as a Diploma in Management and Leadership for Change. She currently serves as a Service Provider, bringing valuable healthcare and leadership skills to the team.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/in/nancholi-youth-organisation-nayo-478a38141" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="staff-card" style="background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease, box-shadow 0.3s ease; height: 100%; display: flex; flex-direction: column;">
                        <div class="staff-image" style="width: 100%; height: 250px; overflow: hidden;">
                            <img src="<?php echo $base_url; ?>/images/staff/EDGAR.jpg" alt="Edgar Mpatula" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                        </div>
                        <div class="staff-info" style="padding: 1.5rem; text-align: center; flex-grow: 1; display: flex; flex-direction: column;">
                            <div>
                                <h3 style="margin: 0 0 0.5rem 0; font-size: 1.25rem; color: #333;">Edgar Mpatula</h3>
                                <p style="color: var(--primary-color); font-weight: 600; margin: 0 0 1rem 0; font-size: 0.9rem;">Driver</p>
                                <div class="staff-bio" style="margin-bottom: 1rem; font-size: 0.9rem; line-height: 1.5; color: #555; text-align: left; flex-grow: 1;">
                                    <p>Edgar Mpatula has been a dedicated Driver for Nancholi Youth Organisation since 2013. He plays an essential role in reaching remote communities, helping ensure vital services and support are delivered where they are needed most.</p>
                                </div>
                            </div>
                            <div class="staff-social" style="display: flex; justify-content: center; gap: 1rem; padding: 0.5rem 0; margin-top: auto;">
                                <a href="https://mw.linkedin.com/company/nancholi-youth-organisation-nayo" target="_blank" class="linkedin" style="color: #006b41; font-size: 1.2rem; transition: color 0.3s ease;">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include_once 'includes/footer.php'; ?>
    
    <script>
        // Add any custom JavaScript for the staff page here
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
            
            // Add animation to staff cards on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.staff-card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                card.style.transitionDelay = `${index * 0.1}s`;
                observer.observe(card);
            });
        });
    </script>
</body>
</html>
<?php
ob_end_flush(); // End output buffering and send to browser
?>
