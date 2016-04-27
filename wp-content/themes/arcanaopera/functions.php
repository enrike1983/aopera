<?php
function foundationpress_sidebar_widgets() {
    register_sidebar(array(
        'id' => 'sidebar-widgets',
        'name' => __('Sidebar widgets', 'FoundationPress'),
        'description' => __('Drag widgets to this sidebar container.', 'FoundationPress'),
        'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
        'after_widget' => '</div></article>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
    register_sidebar(array(
        'id' => 'footer-widgets',
        'name' => __('Footer widgets', 'FoundationPress'),
        'description' => __('Drag widgets to this footer container', 'FoundationPress'),
        'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h6>',
        'after_title' => '</h6>'
    ));
}
add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );


// Add menu support
add_theme_support('menus');
// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
add_theme_support('post-thumbnails');
// set_post_thumbnail_size(150, 150, false);
// rss thingy
add_theme_support('automatic-feed-links');
// Add post formarts support: http://codex.wordpress.org/Post_Formats
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));