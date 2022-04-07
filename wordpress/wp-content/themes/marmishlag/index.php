<?php get_header(); ?>

<?php
$query = new WP_Query([
	'post_type' => 'recette',
	'posts_per_page'=>4,
	'paged' => get_query_var('paged') ? get_query_var('paged') : 1
])
?>

<div class="content">

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

    <?php if ($query->have_posts()) : ?>
        <div class="listPosts">
            <?php while ($query->have_posts()) : ?>
                <?php $query->the_post(); ?>
                <div class="card">
                    <a href="<?php the_permalink(); ?>">
                        <div style='background-image: url("<?php the_post_thumbnail_url(); ?>")' class="card-img-top" alt="..." ></div>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="dateRecette">Publié le <?= get_the_date(); ?></p>
                        <p class="card-type"><?php the_terms(get_the_ID(), 'type'); ?></p>
                        <?php //<p class="card-text">the_excerpt(); </p>?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?= MarmishlagPaginateLinks($query) ?>

    <?php endif; ?>
</div>

<?php get_footer(); ?>
