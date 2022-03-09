<?php get_header(); ?>

<div class="content">

    <div class="category">
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

    <?php if (have_posts()) : ?>
        <div class="listPosts">
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
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
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire plus</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?= MarmishlagPaginateLinks() ?>

    <?php endif; ?>

</div>

<?php get_footer(); ?>

