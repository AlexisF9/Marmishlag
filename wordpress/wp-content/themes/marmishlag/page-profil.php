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

    <div class="profilContent">
        <h2 class="welcomeProfil">Bienvenue sur ton profil <?= $currentUser->user_login ?> !</h2>

	    <?php if (is_user_logged_in()) : ?>
            <div class="postForm">
			    <?php $currentUser = wp_get_current_user(); ?>
                <h3>Créer une recette :</h3>
                <form action="<?= admin_url('admin-post.php') ?>" method="post" enctype="multipart/form-data">
                    <label for="recette_title">Titre</label>
                    <input type="text" name="post_title" id="post_title" value=""/>

                    <label for="recette_description">Description</label>
                    <input type="text" name="post_description" id="post_description" value=""/>

                    <label for="post_type">Type</label>
                    <select name="post_type" id="post_type">
					    <?php
					    $terms = get_terms([
						    'taxonomy' => 'type',
						    'hide_empty' => false,
					    ]);
					    foreach ($terms as $term) {
						    ?>
                            <option value="<?= $term->slug ?>"><?= $term->name ?></option>
						    <?php
					    }
					    ?>
                    </select>

                    <label for="post_img">Miniature</label>
                    <input type="file" name="post_img" id="post_img" multiple="false"/>

                    <input type="hidden" name="action" value="upload_recette"/>
				    <?php wp_nonce_field('upload_recette', 'upload_recette_nonce') ?>

                    <button type="submit">Créer ma recette</button>
                </form>
            </div>
	    <?php endif; ?>

        <h3 class="nbrRecette">Vous avez <?= $total; ?> recettes :</h3>

        <div class="listPosts">
		    <?php while ($query->have_posts()) : ?>
			    <?php $query->the_post(); ?>
                <div class="card">
                    <a href="<?php the_permalink(); ?>">
                        <div style='background-image: url("<?php the_post_thumbnail_url(); ?>")' class="card-img-top" alt="..." ></div>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-type"><small><?php the_terms(get_the_ID(), 'type'); ?></small></p>
					    <?php //<p class="card-text">the_excerpt(); </p>?>
                        <a class="deleteBtn" href="<?= get_delete_post_link(get_the_ID()) ?>">Supprimer</a>
                    </div>
                </div>
		    <?php endwhile; ?>
        </div>

    </div>



<?php

} else {
	wp_redirect( home_url() );
}

get_footer();
?>





