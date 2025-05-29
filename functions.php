<?php
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/form-handler.php';
require_once get_template_directory() . '/inc/custom-fields.php';
require_once get_template_directory() . '/inc/ajax-filters.php';

function citypulse_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', ['search-form', 'comment-form', 'gallery']);
    register_nav_menus([
        'main-menu' => 'Main Menu',
        'footer-menu' => 'Footer Menu'
    ]);
}
add_action('after_setup_theme', 'citypulse_theme_setup');

function citypulse_widgets_init() {
    register_sidebar([
        'name' => 'Sidebar',
        'id' => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'citypulse_widgets_init');
