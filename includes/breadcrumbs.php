<?php
/**
 * Generate breadcrumb navigation
 * 
 * @param array $items Array of items in format ['url' => 'page-url', 'text' => 'Page Name']
 * @param string $home_text Text for home link (default: 'Home')
 * @param string $separator Separator between items (default: '&raquo;')
 * @return string HTML for breadcrumb navigation
 */
function generate_breadcrumbs($items = [], $home_text = 'Home', $separator = '&raquo;') {
    // Start the breadcrumb HTML
    $html = '<nav aria-label="Breadcrumb" class="breadcrumb-nav">';
    $html .= '<ol itemscope itemtype="https://schema.org/BreadcrumbList">';
    
    // Add home link
    $html .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
    $html .= '<a href="' . $GLOBALS['base_url'] . '" itemprop="item">';
    $html .= '<span itemprop="name">' . htmlspecialchars($home_text) . '</span>';
    $html .= '</a>';
    $html .= '<meta itemprop="position" content="1" />';
    $html .= '</li>';
    
    $position = 2;
    
    // Add each breadcrumb item
    foreach ($items as $item) {
        $html .= '<li class="separator">' . $separator . '</li>';
        $html .= '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">';
        
        if (isset($item['url'])) {
            $html .= '<a href="' . htmlspecialchars($item['url']) . '" itemprop="item">';
            $html .= '<span itemprop="name">' . htmlspecialchars($item['text']) . '</span>';
            $html .= '</a>';
        } else {
            $html .= '<span itemprop="name">' . htmlspecialchars($item['text']) . '</span>';
        }
        
        $html .= '<meta itemprop="position" content="' . $position++ . '" />';
        $html .= '</li>';
    }
    
    $html .= '</ol>';
    $html .= '</nav>';
    
    return $html;
}

// Add breadcrumb CSS if not already included
echo '<style>
.breadcrumb-nav {
    padding: 1rem 0;
    font-size: 0.9rem;
    color: #666;
}

.breadcrumb-nav ol {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
}

.breadcrumb-nav li {
    display: inline-block;
    margin: 0;
    padding: 0;
}

.breadcrumb-nav a {
    color: var(--primary-color);
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb-nav a:hover {
    color: #005a3c;
    text-decoration: underline;
}

.breadcrumb-nav .separator {
    margin: 0 0.5rem;
    color: #999;
}

.breadcrumb-nav [aria-current="page"] {
    color: #666;
    font-weight: 500;
}

@media (max-width: 768px) {
    .breadcrumb-nav {
        font-size: 0.85rem;
        padding: 0.75rem 0;
    }
    
    .breadcrumb-nav .separator {
        margin: 0 0.3rem;
    }
}
</style>';
?>
