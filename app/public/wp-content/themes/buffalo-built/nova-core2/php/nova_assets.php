<?php

/*
 * NOVA
 * Stylesheets and Scripts
 */

// Add Styles and Scripts
function nova_core_scripts() {
    wp_enqueue_style('nova-core-frontend-styles', get_template_directory_uri() . '/nova-core2/css/nova-core-frontend-styles.css');
    
    wp_enqueue_script('dl-menu-modernizr', get_template_directory_uri() . '/nova-core2/js/lib/modernizr.dlmenu.js', array('jquery'));
    wp_enqueue_script('dl-menu-script', get_template_directory_uri() . '/nova-core2/js/lib/jquery.dlmenu.js', array('jquery'));
    wp_enqueue_script('owl-carousel-script', get_template_directory_uri() . '/nova-core2/js/lib/owl.carousel.min.js', array('jquery'));
    wp_enqueue_script('nova-core-frontend-script', get_template_directory_uri() . '/nova-core2/js/nova-core-frontend-script.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'nova_core_scripts');

// Add Admin Styles
function nova_core_admin_styles() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_style('nova-core-admin-styles', get_template_directory_uri() . '/nova-core2/css/nova-core-admin-styles.css');
}
add_action('admin_print_styles', 'nova_core_admin_styles');

// Add Admin Scripts
function nova_core_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('nova-core-admin-script', get_template_directory_uri() . '/nova-core2/js/nova-core-admin-script.js', array('jquery', 'jquery-ui-sortable'));
}
add_action('admin_print_scripts', 'nova_core_admin_scripts');

?>