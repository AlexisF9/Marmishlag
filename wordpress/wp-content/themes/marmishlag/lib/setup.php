<?php

add_action('after_setup_theme', function() {
	if (!current_user_can('administrator') && !is_admin()) {
		show_admin_bar(false);
	}
});

//add_action( 'init', function() {
//	if ( is_admin() && ! current_user_can('administrator') && ! (defined('DOING_AJAX') && DOING_AJAX )){
//		wp_redirect(home_url());
//		exit;
//	}
//});

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	register_nav_menu( 'custom_header', "C'est le menu dans le header" );
} );

add_filter( 'login_headerurl', function ( $header_url ) {
	return 'https://www.google.fr';
});
