<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAYO Admin Portal</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
    <div class="admin-container">
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <img src="images/logo.png" alt="NAYO Logo">
                <h2>Admin Portal</h2>
            </div>
            <nav class="admin-nav">
                <ul>
                    <li class="active"><a href="#dashboard"><i class="fas fa-home"></i> Dashboard</a></li>
                    <li><a href="#events"><i class="fas fa-calendar-alt"></i> Events</a></li>
                    <li><a href="#news"><i class="fas fa-newspaper"></i> News</a></li>
                    <li><a href="#media"><i class="fas fa-images"></i> Media Library</a></li>
                    <li><a href="#settings"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>
            </nav>
        </aside>

        <main class="admin-content">
            <header class="admin-header">
                <div class="admin-search">
                    <input type="text" placeholder="Search...">
                    <i class="fas fa-search"></i>
                </div>
                <div class="admin-user">
                    <span>Admin User</span>
                    <i class="fas fa-user-circle"></i>
                </div>
            </header>

            <section id="dashboard" class="admin-section">
                <h1>Dashboard</h1>
                <div class="dashboard-stats">
                    <div class="stat-card">
                        <i class="fas fa-calendar-alt"></i>
                        <h3>Upcoming Events</h3>
                        <p class="stat-number">5</p>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-newspaper"></i>
                        <h3>News Articles</h3>
                        <p class="stat-number">12</p>
                    </div>
                    <div class="stat-card">
                        <i class="fas fa-image"></i>
                        <h3>Media Files</h3>
                        <p class="stat-number">45</p>
                    </div>
                </div>
            </section>

            <section id="events" class="admin-section">
                <div class="section-header">
                    <h1>Events Management</h1>
                    <button class="btn add-new" onclick="openEventModal()">
                        <i class="fas fa-plus"></i> Add New Event
                    </button>
                </div>
                <div class="content-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Christmas for the Elderly</td>
                                <td>Dec 25, 2025</td>
                                <td>Nancholi Community Center</td>
                                <td><span class="status active">Active</span></td>
                                <td>
                                    <button class="btn-edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="news" class="admin-section">
                <div class="section-header">
                    <h1>News Management</h1>
                    <button class="btn add-new" onclick="openNewsModal()">
                        <i class="fas fa-plus"></i> Add New Article
                    </button>
                </div>
                <div class="content-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Student Support Program Success</td>
                                <td>Dec 10, 2023</td>
                                <td>Education</td>
                                <td><span class="status active">Active</span></td>
                                <td>
                                    <button class="btn-edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- Event Modal -->
    <div id="eventModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeEventModal()">&times;</span>
            <h2>Add New Event</h2>
            <form id="eventForm" class="admin-form">
                <div class="form-group">
                    <label for="eventTitle">Event Title</label>
                    <input type="text" id="eventTitle" required>
                </div>
                <div class="form-group">
                    <label for="eventDate">Event Date</label>
                    <input type="date" id="eventDate" required>
                </div>
                <div class="form-group">
                    <label for="eventTime">Event Time</label>
                    <input type="time" id="eventTime" required>
                </div>
                <div class="form-group">
                    <label for="eventLocation">Location</label>
                    <input type="text" id="eventLocation" required>
                </div>
                <div class="form-group">
                    <label for="eventImage">Event Image</label>
                    <input type="file" id="eventImage" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="eventDescription">Description</label>
                    <textarea id="eventDescription" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="eventHighlights">Event Highlights</label>
                    <textarea id="eventHighlights" rows="3" placeholder="Enter highlights separated by new lines"></textarea>
                </div>
                <button type="submit" class="btn submit-btn">Save Event</button>
            </form>
        </div>
    </div>

    <!-- News Modal -->
    <div id="newsModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeNewsModal()">&times;</span>
            <h2>Add New News Article</h2>
            <form id="newsForm" class="admin-form">
                <div class="form-group">
                    <label for="newsTitle">Article Title</label>
                    <input type="text" id="newsTitle" required>
                </div>
                <div class="form-group">
                    <label for="newsDate">Publication Date</label>
                    <input type="date" id="newsDate" required>
                </div>
                <div class="form-group">
                    <label for="newsCategory">Category</label>
                    <select id="newsCategory" required>
                        <option value="education">Education</option>
                        <option value="health">Health</option>
                        <option value="community">Community</option>
                        <option value="events">Events</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="newsImage">Featured Image</label>
                    <input type="file" id="newsImage" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="newsContent">Content</label>
                    <textarea id="newsContent" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn submit-btn">Publish Article</button>
            </form>
        </div>
    </div>

    <script src="js/admin.js"></script>
<!-- Include footer -->`n    <?php include 'includes/footer.php'; ?>`n</body>
</html> 
