<?php

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
