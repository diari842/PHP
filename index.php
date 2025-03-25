<?php


add_action('widgets_init', 'dstheme_sidebars');
function dstheme_sidebars(){
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'sidebar-blog',
            'description' => 'This is the Blog Sidebar. You can add your widgets here.',
            'before_widget' => '<div class = "widget-title">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class = "widget-title">',
            'after_title' => '</h4>'
        )
    );
} 

register_sidebar(
    array(
        'name' => 'Blog Sidebar',
        'id' => 'sidebar-blog',
        'description' => 'This is the Blog Sidebar. You can add your widgets here.',
        'before_widget' => '<div class = "widget-title">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class = "widget-title">',
        'after_title' => '</h4>'
    )
); 
?>
