<?php

/*
Plugin Name: Custom Post Type & Custom Taxonomy
Plugin URI: https://www.youtube.com/watch?v=zL19uMsnpSU&ab_channel=cameronbarnett
Description: Ajoute le custom post type "recette" et la taxonomy "type"
*/

function create_post_tax(){
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
		'menu_position' => 1,
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
}
add_action( 'init', 'create_post_tax');

