<?php

get_header();

if ( is_user_logged_in() ) {
	$currentUser = wp_get_current_user();


	$args = array(
		'post_type'      => 'recette',
		'author'         => $currentUser->ID,
		'order'          => 'ASC',
		'posts_per_page' => - 1 // no limit
	);

	$query = new WP_Query( $args );

	$current_user_posts = get_posts( $args );
	$total              = count( $current_user_posts );

	?>

    <h2>Bienvenue sur ton profil <?= $currentUser->user_login ?> !</h2>
    <h3>Vous avez <?= $total; ?> recettes :</h3>
    <ul>
	    <?php while ($query->have_posts()) : ?>
		    <?php $query->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <li><a href="<?= get_delete_post_link(get_the_ID()) ?>">Supprimer</a></li>
        <?php endwhile; ?>
    </ul>

<?php

} else {
	wp_redirect( home_url() );
}

wp_footer();
?>





