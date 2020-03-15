<?php get_header(); ?>



<!-- Section -->
<section>
    <?php if (have_posts()) : ?>
        <div class="posts">
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="image">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('featured-post-thumb'); ?>
                        <?php endif; ?>
                        <?php the_title() ?>
                    </a>
                    <h3><?php the_title() ?></h3>
                    <p><?php the_content() ?> </p>
                </article>
            <?php endwhile; ?>
        </div>
        <div><?php
            the_posts_pagination(array(
                'prev_text' => __('Previous page', 'stories_csm'),
                'next_text' => __('Next page', 'stories_csm'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'stories_csm') . ' </span>',
            ));

            ?></div>
    <?php endif; ?>
</section>


<?php get_footer() ?>
