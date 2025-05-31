<?php
/**
 * News Index Page
 * 
 * Displays a list of news articles with pagination
 */

// Include necessary files
require_once __DIR__ . '/../includes/cms_functions.php';

// Set page title
$page_title = 'Latest News - NAYO';

// Get current page number
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10; // Number of articles per page
$offset = ($page - 1) * $per_page;

// Get all articles
$all_articles = get_news_articles();

// Debug: Check the structure of the first article
if (!empty($all_articles)) {
    error_log('First article data: ' . print_r($all_articles[0], true));
}

$total_articles = count($all_articles);
$total_pages = ceil($total_articles / $per_page);

// Get articles for current page
$articles = array_slice($all_articles, $offset, $per_page);

// Include header
require_once __DIR__ . '/../includes/header.php';
?>

<main class="news-index">
    <!-- Hero Section -->
    <section class="news-hero">
        <div class="hero-content">
            <h1>NAYO News</h1>
            <p>Stay updated with the latest news and updates from Nancholi Youth Organisation.</p>
        </div>
    </section>

    <div class="container py-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>/" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">News</li>
            </ol>
        </nav>

        <!-- News List -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <?php if (!empty($articles)): ?>
                    <div class="news-list">
                        <?php foreach ($articles as $article): 
                            // Ensure we have valid data
                            $article = is_array($article) ? $article : [];
                            
                            // Safely get and validate each field
                            $title = isset($article['title']) && is_string($article['title']) 
                                ? htmlspecialchars($article['title'], ENT_QUOTES, 'UTF-8') 
                                : 'Untitled Article';
                                
                            $slug = isset($article['slug']) && is_string($article['slug']) 
                                ? htmlspecialchars($article['slug'], ENT_QUOTES, 'UTF-8') 
                                : '';
                                
                            $category = isset($article['category']) && is_string($article['category'])
                                ? htmlspecialchars($article['category'], ENT_QUOTES, 'UTF-8')
                                : 'News';
                                
                            $date = isset($article['date']) && !empty($article['date']) 
                                ? date('d-M-Y', strtotime($article['date'])) 
                                : date('d-M-Y');
                                
                            $excerpt = isset($article['excerpt']) && is_string($article['excerpt'])
                                ? htmlspecialchars($article['excerpt'], ENT_QUOTES, 'UTF-8')
                                : '';
                        ?>
                            <article class="news-item mb-5">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-navy me-3"><?php echo $category; ?></span>
                                    <span class="text-muted small"><?php echo $date; ?></span>
                                </div>
                                <?php if (!empty($slug)): ?>
                                    <h2 class="h4 mb-3">
                                        <a href="<?php echo $base_url; ?>/news/<?php echo $slug; ?>" class="text-decoration-none text-dark">
                                            <?php echo $title; ?>
                                        </a>
                                    </h2>
                                <?php else: ?>
                                    <h2 class="h4 mb-3"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($excerpt)): ?>
                                    <p class="mb-3"><?php echo $excerpt; ?></p>
                                <?php endif; ?>
                                <?php if (!empty($slug)): ?>
                                    <a href="<?php echo $base_url; ?>/news/<?php echo $slug; ?>" class="text-navy text-decoration-none fw-bold">
                                        Read more <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                <?php endif; ?>
                            </article>
                            <hr class="my-4">
                        <?php endforeach; ?>
                    </div>

                    <!-- Pagination -->
                    <?php if ($total_pages > 1): ?>
                        <nav aria-label="News pagination" class="mt-5">
                            <ul class="pagination justify-content-center">
                                <?php if ($page > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo ($page - 1); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo; Previous</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>">
                                            <?php echo $i; ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>

                                <?php if ($page < $total_pages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo ($page + 1); ?>" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="alert alert-info">
                        No news articles found. Please check back later.
                    </div>
                <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</main>

<?php
// Include footer
require_once __DIR__ . '/../includes/footer.php';
?>
