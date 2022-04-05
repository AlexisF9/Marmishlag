
<?php

	if(have_posts()) {
		while (have_posts()) {
			the_post();
			echo the_title('<h1>', '</h1>');
		}
	}