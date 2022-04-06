<?php

if ( current_user_can( 'subscriber' ) && ! is_admin() ) {
	add_filter( 'show_admin_bar', '__return_false' );
}

add_action( 'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		add_theme_support( 'menus' );
		register_nav_menu( 'custom_header', "C'est le menu dans le header" );
	} );

function marmishlag_theme_style() {
	wp_enqueue_style( 'marmishlag-style', get_stylesheet_directory_uri() . '/styles/style.css' );
	wp_enqueue_style( 'marmishlag-style-header', get_stylesheet_directory_uri() . '/styles/header.css' );
	wp_enqueue_style( 'marmishlag-style-single', get_stylesheet_directory_uri() . '/styles/single.css' );
	wp_enqueue_style( 'marmishlag-style-register', get_stylesheet_directory_uri() . '/styles/register.css' );
	wp_enqueue_style( 'marmishlag-style-profil', get_stylesheet_directory_uri() . '/styles/profil.css' );
	wp_enqueue_style( 'marmishlag-style-login', get_stylesheet_directory_uri() . '/styles/login.css' );

}

add_action( 'wp_enqueue_scripts', 'marmishlag_theme_style' );

add_filter( 'login_headerurl',
	function ( $header_url ) {
		return 'https://www.google.fr';
	} );

add_filter( 'nav_menu_css_class', function ( $classes ) {
	$classes[] = 'nav-item';

	return $classes;
} );

add_filter( 'nav_menu_link_attributes', function ( $atts ) {
	$atts['class'] = "nav-link";

	return $atts;
} );

function MarmishlagPaginateLinks( $query ) {
	$paginateLink = paginate_links( [
			'type'  => 'array',
			'total' => $query->max_num_pages
		]
	);
	if ( $paginateLink ) {
		ob_start();
		echo '<nav aria-label="Page navigation example" class="pagination">';
		echo '<ul>';

		foreach ( $paginateLink as $link ) {
			echo sprintf( '<li class="page-item %s">%s</li>',
				str_contains( $link, 'current' ) ? 'active' : '',
				str_replace( 'page-numbers', 'page-link', $link ) );
		}

		echo "</ul>";
		echo "</nav>";

		return ob_get_clean();
	}
}

add_action( 'init', function () {

	register_taxonomy( 'type', [ 'recette' ], [
		'labels'       => [
			'name' => 'Types'
		],
		'public'       => true,
		'hierarchical' => true,
		'show_in_rest' => false,
	] );

	register_post_type( 'recette', [
		'label'         => 'Recettes',
		"has_archive"   => true,
		'public'        => true,
		'hierarchical'  => true,
		'show_in_rest'  => false,
		'menu_icon'     => 'dashicons-media-document',
		'taxonomies'    => [ 'type' ],
		'supports'      => [
			'thumbnail',
			'title',
			'author',
			'comments',
			'editor'
		],
		"capility_type" => "post"
	] );

	flush_rewrite_rules();
} );

function tg_include_custom_post_types_in_search_results( $query ) {
	if ( !$query->is_main_query() && !is_admin() && isset($_GET['s'])) {
		$query->set('s' , $_GET['s']);
	}
	return $query;
}
add_action( 'pre_get_posts', 'tg_include_custom_post_types_in_search_results' );

function add_theme_caps() {
	$role = get_role( 'subscriber' );
	$role->add_cap( 'delete_posts' );
	$role->add_cap( 'delete_published_posts' );
}

add_action( 'admin_init', 'add_theme_caps');

add_action( 'admin_post_nopriv_register', function () {
	if ( ! wp_verify_nonce( $_POST['form'], 'form' ) ) {
		die( 'nonce invalide' );
	}

	wp_insert_user( [
		'user_pass'  => $_POST['password'],
		'user_login' => $_POST['name'],
		'user_email' => $_POST['email']
	] );

	wp_redirect( '/login' );
} );

add_action( 'admin_post_upload_recette', function () {
	$post_args = array (
		'post_title'   => $_POST['post_title'],
		'post_content' => $_POST['post_description'],
		'post_author'  => get_current_user_id(),
		'tax_input'    => [
			'type' => [ $_POST['post_type'] ]
		],
		'post_type'    => 'recette',
		'post_status'  => 'publish'
	);

	$postId = wp_insert_post( $post_args );

	if ($postId) {
		$media = media_handle_upload('post_img', $postId);
		if (!is_wp_error($media)) {
			set_post_thumbnail($postId, $media);
		}
	}

	wp_redirect( home_url() );
});






