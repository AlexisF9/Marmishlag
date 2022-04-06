<?php

$sage_includes = [
	'lib/setup.php',     // Theme setup
	'lib/assets.php',    // Style + JS
	'lib/query.php',     // Query
	'lib/post.php',      // Post
	'lib/paginate.php' // Pagination
];

foreach ($sage_includes as $file) {
	if (!$filepath = locate_template($file))
		trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);

	require_once $filepath;
}
unset($file, $filepath);








