<?php get_header(); ?>

<div class="content">

	<?php if (is_user_logged_in()) : ?>
        <?php $currentUser = wp_get_current_user(); ?>
        <h2 class="welcome">Bienvenue <?= $currentUser->user_login ?> !</h2>
    <?php endif; ?>

    <div class="category">
		<?php get_search_form(); ?>

        <h3>Catégories</h3>
		<?php
		$terms = get_terms([
			'taxonomy' => 'type',
			'hide_empty' => false,
		]);
		foreach ($terms as $term) {
			$active = get_query_var('type') === $term->slug ? 'active' : '';
			echo sprintf('<a href="%s" class="list-group-item %s">%s</a>',
				get_term_link($term), $active, $term->name
			);
		}
		?>
    </div>

	<?php
        $query = new WP_Query([
            'post_type' => 'recette',
            'posts_per_page'=>4,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        ])
	?>

    <?php if ($query->have_posts()) : ?>
        <div class="listPosts">
            <?php while ($query->have_posts()) : ?>
                <?php $query->the_post(); ?>
                <div class="card">
                    <div style='background-image: url("<?php the_post_thumbnail_url(); ?>")' class="card-img-top" alt="..." ></div>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-type"><small>Type : <?php the_terms(get_the_ID(), 'type'); ?></small></p>
                        <?php //<p class="card-text">the_excerpt(); </p>?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Voir la recette</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?= MarmishlagPaginateLinks($query) ?>

    <?php endif; ?>
</div>
<?php wp_footer(); ?>
