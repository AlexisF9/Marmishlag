<?php get_header(); ?>

<div class="content">

    <?php if (is_user_logged_in()) : ?>
        <?php $currentUser = wp_get_current_user(); ?>
        <h2>Bienvenue <?= $currentUser->user_login ?> !</h2>

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
                            <option value="<?= $term->id ?>"><?= $term->name ?></option>
                        <?php
                    }
	            ?>
            </select>

            <label for="post_img">Miniature</label>
            <input type="file" name="post_img" id="post_img" multiple="false"/>

            <input type="hidden" name="action" value="upload_recette"/>
            <?php wp_nonce_field('upload_recette', 'upload_recette_nonce') ?>

            <button type="submit">Poster</button>
        </form>
        </br>
    <?php endif; ?>

	<?php
	$query = new WP_Query([
		'post_type' => 'recette',
		'posts_per_page'=>4,
		'paged' => get_query_var('paged') ? get_query_var('paged') : 1
	])
	?>

    <div class="category">
        <?php get_search_form(); ?>

        <h3>Catégories</h3>
        <?php
        $terms = get_terms(['taxonomy' => 'type']);
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
                    <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <?php if (get_post_meta(get_the_ID(), 'wphetic_sponso', true)) : ?>
                            <div class="alert" role="alert">
                                Contenu Sponsorisé
                            </div>
                        <?php endif; ?>
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p><small><?php the_terms(get_the_ID(), 'type'); ?></small></p>
                        <p class="card-text"><?php the_excerpt(); ?></p>
	                    <?php if (is_user_logged_in()) : ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
	                    <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?= MarmishlagPaginateLinks($query) ?>

    <?php endif; ?>
</div>
<?php get_footer(); ?>

