<?php

require_once('nova-theme/nova_config.php');
require_once('nova-core2/nova_core.php');

foreach (glob(get_stylesheet_directory() . '/nova-theme/models/*.php') as $filename) {
    include $filename;
}

require_once('nova-theme/nova_settings.php');

// Register Menus
function nova_menus() {
    register_nav_menus( array(
        'primary'   => 'Primary Menu'
    ));
}
add_action('after_setup_theme', 'nova_menus');

// Initialize sidebar widget
function sidebar_widget_init() {
    register_sidebar(array(
        'name'          => 'Main Sidebar',
        'id'            => 'main-sidebar',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'sidebar_widget_init');

// Add Styles and Scripts
function nova_scripts() {
    wp_enqueue_style('google-fonts-open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800');
    wp_enqueue_style('nova-style', get_template_directory_uri() . '/css/main.css');
    
    if (!file_exists(get_stylesheet_directory() . '/css/custom.css')) {
        ob_start();
        require(get_stylesheet_directory() . '/nova-theme/nova_custom_style.php');
        $css = ob_get_clean();
        file_put_contents(get_stylesheet_directory() . '/css/custom.css', $css, LOCK_EX);
    }
    wp_enqueue_style('nova-custom-style', get_template_directory_uri() . '/css/custom.css');
    
    wp_enqueue_script('nova-script', get_template_directory_uri() . '/js/main.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'nova_scripts');

// Set $content_width variable
if (!isset($content_width)) $content_width = 1200;

?>