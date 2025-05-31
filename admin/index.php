<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../includes/cms_functions.php';

// Ensure user is logged in
require_login();

// Get content type (news or events)
$type = isset($_GET['type']) && in_array($_GET['type'], ['news', 'events']) ? $_GET['type'] : 'news';
$action = $_GET['action'] ?? 'list';
$slug = $_GET['slug'] ?? null;

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'save_article':
                $data = [
                    'title' => $_POST['title'] ?? '',
                    'date' => $_POST['date'] ?? date('Y-m-d'),
                    'author' => $_POST['author'] ?? 'NAYO Team',
                    'excerpt' => $_POST['excerpt'] ?? '',
                    'image' => $_POST['image'] ?? '',
                    'content' => $_POST['content'] ?? '',
                    'tags' => isset($_POST['tags']) ? explode(',', $_POST['tags']) : []
                ];
                
                if (isset($_POST['slug'])) {
                    $data['slug'] = $_POST['slug'];
                }
                
                if (save_article($data)) {
                    header('Location: ?type=news&saved=1');
                    exit;
                } else {
                    $error = 'Error saving article';
                }
                break;
        }
    }
}

// Handle delete action
if ($action === 'delete' && $slug) {
    if (delete_article($slug)) {
        header('Location: ?type=news&deleted=1');
        exit;
    } else {
        $error = 'Error deleting article';
    }
}

// Get articles for listing
$articles = get_news_articles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAYO Admin - <?php echo ucfirst($type); ?> Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
    <style>
        :root {
            --nayo-green: #006b41;
            --nayo-light: #f8f9fa;
        }
        body {
            background-color: #f5f5f5;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #2c3e50;
            color: white;
            padding: 0;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.5rem;
            border-left: 4px solid transparent;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: var(--nayo-green);
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }
        .main-content {
            padding: 2rem;
        }
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
        }
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-weight: 600;
        }
        .btn-nayo {
            background-color: var(--nayo-green);
            color: white;
        }
        .btn-nayo:hover {
            background-color: #005a36;
            color: white;
        }
        .table th {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6c757d;
            border-top: none;
        }
        .table td {
            vertical-align: middle;
        }
        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-weight: 600;
        }
        .status-published {
            background-color: #d4edda;
            color: #155724;
        }
        .status-draft {
            background-color: #fff3cd;
            color: #856404;
        }
        .article-image-preview {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        .editor-toolbar {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-bottom: none;
            border-radius: 4px 4px 0 0;
        }
        .CodeMirror, .CodeMirror-scroll {
            min-height: 300px;
            border-radius: 0 0 4px 4px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar p-0">
                <div class="d-flex flex-column h-100">
                    <div class="p-3 text-center border-bottom">
                        <h4 class="mb-0">NAYO Admin</h4>
                    </div>
                    
                    <nav class="nav flex-column mt-3">
                        <a href="?type=news" class="nav-link <?php echo $type === 'news' ? 'active' : ''; ?>">
                            <i class="bi bi-newspaper"></i> News
                        </a>
                        <a href="?type=events" class="nav-link <?php echo $type === 'events' ? 'active' : ''; ?>">
                            <i class="bi bi-calendar-event"></i> Events
                        </a>
                    </nav>
                    
                    <div class="mt-auto p-3 border-top">
                        <a href="?logout" class="nav-link text-danger">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <?php if (isset($_GET['saved'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Article saved successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_GET['deleted'])): ?>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        Article deleted successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($error); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0">
                        <?php echo ucfirst($type); ?> Management
                    </h1>
                    <a href="?type=<?php echo $type; ?>&action=new" class="btn btn-nayo">
                        <i class="bi bi-plus-circle"></i> Add New
                    </a>
                </div>
                
                <?php if ($action === 'edit' || $action === 'new'): ?>
                    <?php
                    $article = null;
                    if ($action === 'edit' && $slug) {
                        $article = get_article($slug);
                        if (!$article) {
                            echo '<div class="alert alert-warning">Article not found.</div>';
                        }
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <?php echo $action === 'new' ? 'Add New Article' : 'Edit Article'; ?>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="?type=<?php echo $type; ?>">
                                <input type="hidden" name="action" value="save_article">
                                <?php if ($article): ?>
                                    <input type="hidden" name="slug" value="<?php echo htmlspecialchars($article['slug']); ?>">
                                <?php endif; ?>
                                
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" 
                                           value="<?php echo htmlspecialchars($article['title'] ?? ''); ?>" required>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Publish Date</label>
                                            <input type="date" class="form-control" id="date" name="date" 
                                                   value="<?php echo htmlspecialchars($article['date'] ?? date('Y-m-d')); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="author" class="form-label">Author</label>
                                            <input type="text" class="form-control" id="author" name="author" 
                                                   value="<?php echo htmlspecialchars($article['author'] ?? 'NAYO Team'); ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="excerpt" class="form-label">Excerpt</label>
                                    <textarea class="form-control" id="excerpt" name="excerpt" rows="2"><?php 
                                        echo htmlspecialchars($article['excerpt'] ?? ''); 
                                    ?></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="image" class="form-label">Featured Image URL</label>
                                    <input type="url" class="form-control" id="image" name="image" 
                                           value="<?php echo htmlspecialchars($article['image'] ?? ''); ?>">
                                    <?php if (!empty($article['image'])): ?>
                                        <div class="mt-2">
                                            <img src="<?php echo htmlspecialchars($article['image']); ?>" 
                                                 alt="Preview" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea id="content" name="content"><?php 
                                        echo htmlspecialchars($article['content'] ?? ''); 
                                    ?></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    <input type="text" class="form-control" id="tags" name="tags" 
                                           value="<?php 
                                               echo htmlspecialchars(
                                                   is_array($article['tags'] ?? []) 
                                                       ? implode(', ', $article['tags']) 
                                                       : ($article['tags'] ?? '')
                                               ); 
                                           ?>"
                                           placeholder="tag1, tag2, tag3">
                                    <div class="form-text">Separate tags with commas</div>
                                </div>
                                
                                <div class="d-flex justify-content-between">
                                    <a href="?type=<?php echo $type; ?>" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-nayo">
                                        <i class="bi bi-save"></i> Save Article
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Articles List -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>All <?php echo $type; ?></span>
                            <a href="?type=<?php echo $type; ?>&action=new" class="btn btn-sm btn-nayo">
                                <i class="bi bi-plus-circle"></i> Add New
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($articles)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center py-4 text-muted">
                                                No articles found. <a href="?type=<?php echo $type; ?>&action=new">Create one</a>.
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($articles as $article): ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <?php if (!empty($article['image'])): ?>
                                                            <img src="<?php echo htmlspecialchars($article['image']); ?>" 
                                                                 class="article-image-preview me-2" 
                                                                 alt="<?php echo htmlspecialchars($article['title']); ?>">
                                                        <?php endif; ?>
                                                        <div>
                                                            <div class="fw-bold"><?php echo htmlspecialchars($article['title']); ?></div>
                                                            <small class="text-muted">
                                                                <?php echo date('M j, Y', strtotime($article['date'])); ?>
                                                            </small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo htmlspecialchars($article['author']); ?></td>
                                                <td><?php echo date('M j, Y', strtotime($article['date'])); ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="?type=<?php echo $type; ?>&action=edit&slug=<?php echo urlencode($article['slug']); ?>" 
                                                           class="btn btn-outline-primary">
                                                            <i class="bi bi-pencil"></i> Edit
                                                        </a>
                                                        <a href="?type=<?php echo $type; ?>&action=delete&slug=<?php echo urlencode($article['slug']); ?>" 
                                                           class="btn btn-outline-danger" 
                                                           onclick="return confirm('Are you sure you want to delete this article? This cannot be undone.');">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                        <a href="<?php echo $base_url; ?>/news/<?php echo urlencode($article['slug']); ?>" 
                                                           target="_blank" 
                                                           class="btn btn-outline-secondary">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
    <script>
        // Initialize Markdown editor
        const easyMDE = new EasyMDE({
            element: document.getElementById('content'),
            spellChecker: false,
            autofocus: true,
            placeholder: 'Start writing your content here...',
            status: ['lines', 'words', 'cursor'],
            minHeight: '400px',
            toolbar: [
                'bold', 'italic', 'heading', '|',
                'quote', 'unordered-list', 'ordered-list', '|',
                'link', 'image', '|',
                'preview', 'side-by-side', 'fullscreen', '|',
                'guide'
            ]
        });

        // Auto-slugify the title
        document.getElementById('title')?.addEventListener('input', function() {
            const slugInput = document.querySelector('input[name="slug"]');
            if (!slugInput || slugInput.value === '') {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                if (slugInput) slugInput.value = slug;
            }
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>
