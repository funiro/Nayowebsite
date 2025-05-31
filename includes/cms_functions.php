<?php
// CMS Helper Functions for NAYO Website

/**
 * Get all news articles
 * @param int $limit Number of articles to return (0 for all)
 * @return array Array of articles
 */
function get_news_articles($limit = 0) {
    $articles = [];
    $files = glob(__DIR__ . '/../news/articles/*.md');
    
    foreach ($files as $file) {
        $content = file_get_contents($file);
        $parts = explode("---\n", $content, 3);
        
        if (count($parts) === 3) {
            $yaml = yaml_parse($parts[1]);
            $articles[] = [
                'title' => $yaml['title'] ?? 'Untitled',
                'date' => $yaml['date'] ?? date('Y-m-d'),
                'author' => $yaml['author'] ?? 'NAYO Team',
                'excerpt' => $yaml['excerpt'] ?? '',
                'image' => $yaml['image'] ?? '',
                'content' => $parts[2],
                'slug' => pathinfo($file, PATHINFO_FILENAME)
            ];
        }
    }
    
    // Sort by date (newest first)
    usort($articles, function($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });
    
    return $limit ? array_slice($articles, 0, $limit) : $articles;
}

/**
 * Save an article
 * @param array $data Article data
 * @return bool True on success, false on failure
 */
function save_article($data) {
    $slug = !empty($data['slug']) ? $data['slug'] : create_slug($data['title']);
    $yaml = "---\n";
    $yaml .= "title: " . $data['title'] . "\n";
    $yaml .= "date: " . ($data['date'] ?? date('Y-m-d')) . "\n";
    $yaml .= "author: " . ($data['author'] ?? 'NAYO Team') . "\n";
    $yaml .= "excerpt: " . ($data['excerpt'] ?? '') . "\n";
    if (!empty($data['image'])) $yaml .= "image: " . $data['image'] . "\n";
    if (!empty($data['tags'])) $yaml .= "tags: " . (is_array($data['tags']) ? implode(', ', $data['tags']) : $data['tags']) . "\n";
    $yaml .= "---\n\n";
    $yaml .= $data['content'];
    
    $file = __DIR__ . "/../content/news/{$slug}.md";
    $dir = dirname($file);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    
    return file_put_contents($file, $yaml) !== false;
}

/**
 * Create a URL-friendly slug from a string
 * @param string $text Text to convert to slug
 * @return string URL-friendly slug
 */
function create_slug($text) {
    $text = preg_replace('~[^\\pL\\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\\w]+~', '', $text);
    $text = trim($text, '-');
    $text = strtolower($text);
    return $text ?: 'untitled';
}

/**
 * Get a single article by slug
 * @param string $slug Article slug
 * @return array|null Article data or null if not found
 */
function get_article($slug) {
    $file = __DIR__ . "/../content/news/{$slug}.md";
    
    if (!file_exists($file)) {
        return null;
    }
    
    $content = file_get_contents($file);
    $parts = explode("---\n", $content, 3);
    
    if (count($parts) !== 3) {
        return null;
    }
    
    $yaml = yaml_parse($parts[1]);
    
    return [
        'title' => $yaml['title'] ?? 'Untitled',
        'date' => $yaml['date'] ?? date('Y-m-d'),
        'author' => $yaml['author'] ?? 'NAYO Team',
        'excerpt' => $yaml['excerpt'] ?? '',
        'image' => $yaml['image'] ?? '',
        'content' => $parts[2],
        'slug' => $slug,
        'tags' => $yaml['tags'] ?? []
    ];
}

/**
 * Delete an article
 * @param string $slug Article slug
 * @return bool True on success, false on failure
 */
function delete_article($slug) {
    $file = __DIR__ . "/../content/news/{$slug}.md";
    if (file_exists($file)) {
        return unlink($file);
    }
    return false;
}

/**
 * Parse a markdown article file and return its data
 * @param string $file_path Path to the markdown file
 * @return array|null Article data or null if invalid
 */
function parse_markdown_article($file_path) {
    if (!file_exists($file_path)) {
        return null;
    }
    
    $content = file_get_contents($file_path);
    $parts = explode("---\n", $content, 3);
    
    if (count($parts) !== 3) {
        return null;
    }
    
    $yaml = yaml_parse($parts[1]);
    if ($yaml === false) {
        return null;
    }
    
    // Extract tags if they exist
    $tags = [];
    if (!empty($yaml['tags'])) {
        $tags = is_array($yaml['tags']) ? $yaml['tags'] : array_map('trim', explode(',', $yaml['tags']));
    }
    
    return [
        'title' => $yaml['title'] ?? 'Untitled Article',
        'date' => $yaml['date'] ?? date('Y-m-d'),
        'author' => $yaml['author'] ?? 'NAYO Team',
        'category' => $yaml['category'] ?? 'News',
        'excerpt' => $yaml['excerpt'] ?? '',
        'image' => $yaml['image'] ?? '',
        'image_alt' => $yaml['image_alt'] ?? ($yaml['title'] ?? 'Article Image'),
        'image_caption' => $yaml['image_caption'] ?? '',
        'content' => trim($parts[2]),
        'tags' => $tags,
        'slug' => pathinfo($file_path, PATHINFO_FILENAME)
    ];
}

// Load YAML parser if not already loaded
if (!function_exists('yaml_parse')) {
    function yaml_parse($yaml) {
        $lines = explode("\n", $yaml);
        $data = [];
        
        foreach ($lines as $line) {
            if (strpos($line, ':') !== false) {
                list($key, $value) = explode(':', $line, 2);
                $key = trim($key);
                $value = trim($value);
                
                // Handle array values (tags, etc.)
                if (strpos($value, ',') !== false) {
                    $values = array_map('trim', explode(',', $value));
                    $data[$key] = $values;
                } else {
                    $data[$key] = $value;
                }
            }
        }
        
        return $data;
    }
}
