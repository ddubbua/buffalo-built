<?php

/*
 * NOVA
 * Miscellaneous functions and hooks
 */

// Add Featured Image Support
add_theme_support('post-thumbnails');

// Add Feed Links
add_theme_support('automatic-feed-links');

// Add like_the_content Filter
//
// Has the same actions as the_content but for times when running
// the_content filter conflicts with plugins.
// 
// The only action this does not have is 'prepend_attachment' because
// it was causing attachment pages to show attachments in weird places.
add_filter('like_the_content', 'wptexturize');
add_filter('like_the_content', 'convert_smilies');
add_filter('like_the_content', 'convert_chars');
add_filter('like_the_content', 'wpautop');
add_filter('like_the_content', 'shortcode_unautop');

// Add title for home page
// Workaround for title being blank if the front page is
// a custom home page.
function wp_title_for_home($title) {
    if (empty($title) && (is_home() || is_front_page())) {
        return get_bloginfo() . ' | ' . get_bloginfo('description');
    }
    
    return $title;
}
add_filter('wp_title', 'wp_title_for_home');

// Alters formatting of excerpt_more
function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>