<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : ?>
			<?php the_post(); ?>
            <div class="single-img" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                <div class="filter"></div>
                <h2 class="card-title"><?php the_title(); ?></h2>
            </div>
            <div class="singleContent">
                <div class="single">
                    <div class="single-infos">
                        <div class="single-category">
                            <h4>Catégories :</h4>
                            <p><?php the_terms(get_the_ID(), 'type'); ?></p>
                        </div>
                        <div class="single-description">
                            <h4>Déscription :</h4>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                </div>

                <?php
                if (is_user_logged_in()) {
                    comments_template();
                }
                ?>
            </div>
		<?php endwhile; ?>
	<?php endif; ?>


<?php get_footer(); ?>
