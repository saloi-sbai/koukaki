<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() .'/css/theme.css');
    wp_enqueue_style('header', get_stylesheet_directory_uri() .'/sass/header.css');
    wp_enqueue_style('fleurs', get_stylesheet_directory_uri() . '/sass/fleurs.css');
    wp_enqueue_style('commun', get_stylesheet_directory_uri() . '/sass/commun.css');
    // wp_enqueue_style('banner', get_stylesheet_directory_uri() . '/sass/banner.css');

    // wp_enqueue_style('section-histoire' ,get_stylesheet_directory_uri().'/sass/sectionHistoire.scss');
}

// Get customizer options form parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option( 'theme_mods_' . get_template(), $value );
        return $old_value; // prevent update to child theme mods
    }, 10, 2 );
    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );
}