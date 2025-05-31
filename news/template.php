<?php
/**
 * Article Template
 * 
 * Displays a single news article
 */

// Function to create URL-friendly slug
if (!function_exists('create_slug')) {
    function create_slug($text) {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, '-');
        $text = strtolower($text);
        return $text ?: 'untitled';
    }
}

// Ensure we have an article
if (!isset($article) || !is_array($article)) {
    header('Location: ' . $base_url . '/news/');
    exit;
}

// Set default values
$article = array_merge([
    'title' => 'Untitled Article',
    'date' => date('Y-m-d'),
    'author' => 'NAYO Team',
    'category' => 'News',
    'excerpt' => '',
    'content' => '',
    'image' => '',
    'image_alt' => '',
    'image_caption' => '',
    'tags' => [],
    'slug' => ''
], $article);

// Ensure we have a valid date
if (empty($article['date'])) {
    $article['date'] = date('Y-m-d');
}

// Ensure we have a valid slug
if (empty($article['slug'])) {
    $article['slug'] = create_slug($article['title']);
}

// Set the page title
$page_title = htmlspecialchars($article['title']) . ' - NAYO News';

// Include header
require_once __DIR__ . '/../includes/header.php';
?>

<main class="news-article">
    <!-- Article Header -->
    <section class="article-header py-5 bg-navy text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge bg-nayo-green me-3"><?php echo htmlspecialchars($article['category']); ?></span>
                        <span class="text-white-50">
                            <i class="far fa-calendar me-1"></i> 
                            <?php echo date('F j, Y', strtotime($article['date'])); ?>
                        </span>
                    </div>
                    <h1 class="display-4 fw-bold mb-3"><?php echo htmlspecialchars($article['title']); ?></h1>
                    <div class="d-flex align-items-center">
                        <div class="author-avatar me-3">
                            <i class="fas fa-user-circle fa-2x text-nayo-green"></i>
                        </div>
                        <div>
                            <div class="text-uppercase small text-nayo-green">Author</div>
                            <div class="text-white"><?php echo htmlspecialchars($article['author']); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <article class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?php if (!empty($article['image'])): ?>
                    <figure class="article-featured-image mb-5">
                        <img src="<?php echo $base_url . htmlspecialchars($article['image']); ?>" 
                             alt="<?php echo htmlspecialchars($article['image_alt']); ?>" 
                             class="img-fluid rounded shadow">
                        <?php if (!empty($article['image_caption'])): ?>
                        <figcaption class="figure-caption text-center mt-2 text-muted">
                            <?php echo htmlspecialchars($article['image_caption']); ?>
                        </figcaption>
                        <?php endif; ?>
                    </figure>
                    <?php endif; ?>

                    <div class="article-content">
                        <?php 
                        // Simple markdown to HTML conversion
                        $content = $article['content'];
                        
                        // Convert headers
                        $content = preg_replace('/##\s+(.+)/', '</p><h2 class="h4 mb-3 mt-5">$1</h2><p>', $content);
                        
                        // Convert lists
                        $content = str_replace("- ", "<li>", $content);
                        $content = str_replace("\n<li>", "</li>\n<li>", $content);
                        $content = str_replace("\n", " ", $content);
                        $content = str_replace("</li> <li>", "</li><li>", $content);
                        $content = str_replace("<p><li>", "<ul class='mb-4'><li>", $content);
                        $content = str_replace("</li></p>", "</li></ul>", $content);
                        
                        // Add paragraph tags
                        $content = '<p>' . $content . '</p>';
                        $content = str_replace('<p></p>', '', $content);
                        $content = str_replace('<p><p>', '<p>', $content);
                        $content = str_replace('</p></p>', '</p>', $content);
                        
                        echo $content;
                        ?>
                    </div>

                    <?php if (!empty($article['tags'])): ?>
                    <div class="article-tags mt-5 pt-4 border-top">
                        <h6 class="mb-3">Tags:</h6>
                        <div class="tag-cloud">
                            <?php foreach ($article['tags'] as $tag): ?>
                                <a href="<?php echo $base_url; ?>/news/tag/<?php echo urlencode(strtolower(str_replace(' ', '-', $tag))); ?>" 
                                   class="btn btn-sm btn-outline-secondary me-2 mb-2">
                                    <?php echo htmlspecialchars($tag); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="article-share mt-5 pt-4 border-top">
                        <h6 class="mb-3">Share this article:</h6>
                        <div class="share-buttons">
                            <?php 
                            $share_url = urlencode((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                            $share_title = urlencode($article['title']);
                            ?>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="btn btn-sm btn-outline-primary me-2 mb-2">
                                <i class="fab fa-facebook-f me-1"></i> Facebook
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="btn btn-sm btn-outline-info me-2 mb-2">
                                <i class="fab fa-twitter me-1"></i> Twitter
                            </a>
                            <a href="https://wa.me/?text=<?php echo $share_title . ' ' . $share_url; ?>" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="btn btn-sm btn-outline-success me-2 mb-2">
                                <i class="fab fa-whatsapp me-1"></i> WhatsApp
                            </a>
                            <a href="mailto:?subject=<?php echo $share_title; ?>&body=Check%20this%20out:%20<?php echo $share_url; ?>" 
                               class="btn btn-sm btn-outline-secondary me-2 mb-2">
                                <i class="far fa-envelope me-1"></i> Email
                            </a>
                        </div>
                    </div>

                    <div class="article-navigation mt-5 pt-4 border-top">
                        <a href="<?php echo $base_url; ?>/news/" class="btn btn-outline-navy">
                            <i class="fas fa-arrow-left me-1"></i> Back to News
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>

<?php
// Include footer
require_once __DIR__ . '/../includes/footer.php';
?>
