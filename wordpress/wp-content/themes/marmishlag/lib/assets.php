<?php

function marmishlag_theme_style() {
	wp_enqueue_style( 'marmishlag-style', get_stylesheet_directory_uri() . '/styles/style.css' );
	wp_enqueue_style( 'marmishlag-style-header', get_stylesheet_directory_uri() . '/styles/header.css' );
	wp_enqueue_style( 'marmishlag-style-single', get_stylesheet_directory_uri() . '/styles/single.css' );
	wp_enqueue_style( 'marmishlag-style-register', get_stylesheet_directory_uri() . '/styles/register.css' );
	wp_enqueue_style( 'marmishlag-style-profil', get_stylesheet_directory_uri() . '/styles/profil.css' );
	wp_enqueue_style( 'marmishlag-style-login', get_stylesheet_directory_uri() . '/styles/login.css' );
}

add_action( 'wp_enqueue_scripts', 'marmishlag_theme_style' );

add_filter( 'nav_menu_css_class', function ( $classes ) {
	$classes[] = 'nav-item';
	return $classes;
} );

add_filter( 'nav_menu_link_attributes', function ( $atts ) {
	$atts['class'] = "nav-link";
	return $atts;
} );

