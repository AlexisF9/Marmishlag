<?php

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
		wp_set_object_terms($postId, $_POST['post_type'],'type');
		$media = media_handle_upload('post_img', $postId);
		if (!is_wp_error($media)) {
			set_post_thumbnail($postId, $media);
		}
	}

	wp_redirect( home_url() );
});