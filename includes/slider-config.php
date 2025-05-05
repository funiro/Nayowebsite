<?php
// Slider configuration
$slider_images = [
    [
        'image' => '/images/hero-1.jpg',
        'alt' => 'Hero Image 1',
        'text' => [
            'welcome' => 'WELCOME TO',
            'title' => 'NANCHOLI YOUTH ORGANIZATION'
        ]
    ],
    [
        'image' => '/images/hero-2.jpg',
        'alt' => 'Hero Image 2',
        'text' => [
            'welcome' => 'WELCOME TO',
            'title' => 'NANCHOLI YOUTH ORGANIZATION'
        ]
    ],
    [
        'image' => '/images/hero-3.jpg',
        'alt' => 'Hero Image 3',
        'text' => [
            'welcome' => 'WELCOME TO',
            'title' => 'NANCHOLI YOUTH ORGANIZATION'
        ]
    ],
    [
        'image' => '/images/hero-4.jpg',
        'alt' => 'Hero Image 4',
        'text' => [
            'welcome' => 'WELCOME TO',
            'title' => 'NANCHOLI YOUTH ORGANIZATION'
        ]
    ],
    [
        'image' => '/images/hero-5.jpg',
        'alt' => 'Hero Image 5',
        'text' => [
            'welcome' => 'WELCOME TO',
            'title' => 'NANCHOLI YOUTH ORGANIZATION'
        ]
    ],
    [
        'image' => '/images/hero-6.jpg',
        'alt' => 'Hero Image 6',
        'text' => [
            'welcome' => 'WELCOME TO',
            'title' => 'NANCHOLI YOUTH ORGANIZATION'
        ]
    ]
];

// Function to generate slider HTML
function generateSliderHTML($slider_images) {
    $html = '<div class="hero-slider">';
    foreach ($slider_images as $slide) {
        $html .= '<div class="hero-slide">';
        $html .= '<img src="' . $slide['image'] . '" alt="' . $slide['alt'] . '">';
        $html .= '<div class="hero-overlay"></div>';
        $html .= '<div class="hero-text">';
        $html .= '<span class="welcome-text">' . $slide['text']['welcome'] . '</span>';
        $html .= '<h1>' . $slide['text']['title'] . '</h1>';
        $html .= '</div>';
        $html .= '</div>';
    }
    $html .= '</div>';
    
    // Add navigation dots
    $html .= '<div class="slider-dots">';
    for ($i = 0; $i < count($slider_images); $i++) {
        $html .= '<span class="slider-dot' . ($i === 0 ? ' active' : '') . '"></span>';
    }
    $html .= '</div>';
    
    // Add navigation buttons
    $html .= '<button class="slider-nav prev-slide"><i class="fas fa-chevron-left"></i></button>';
    $html .= '<button class="slider-nav next-slide"><i class="fas fa-chevron-right"></i></button>';
    
    return $html;
}
?>
