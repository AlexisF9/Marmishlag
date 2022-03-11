<?php get_header(); ?>

<?php if (have_posts()) : ?>
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
                </div>
            </div>
        <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
