<?php
/**
 * @package bb-loader
 * @version 1.0
 */
/*
Plugin Name: Bb loader
Description: Plugin that loads custom stuffs for Burning Black theme
Author: Eric Antonello
Author URI: http://ericantonello.com
*/

function bb_custom_post_types() {
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' )

        ));

    register_post_type( 'gigs',
        array(
            'labels' => array(
                'name' => __( 'Gigs' ),
                'singular_name' => __( 'Gigs' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' )
        ));

    register_post_type( 'releases',
        array(
            'labels' => array(
                'name' => __( 'Releases' ),
                'singular_name' => __( 'Releases' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' )
        ));

    register_post_type( 'photos',
        array(
            'labels' => array(
                'name' => __( 'Photos' ),
                'singular_name' => __( 'Photos' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' )
        ));

    register_post_type( 'merch',
        array(
            'labels' => array(
                'name' => __( 'Merch' ),
                'singular_name' => __( 'Merch' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' )
        ));
}

add_action( 'init', 'bb_custom_post_types' );