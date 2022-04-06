<?php

function tg_include_custom_post_types_in_search_results( $query ) {
	if ( !$query->is_main_query() && !is_admin() && isset($_GET['s'])) {
		$query->set('s' , $_GET['s']);
	}
	return $query;
}
add_action( 'pre_get_posts', 'tg_include_custom_post_types_in_search_results' );