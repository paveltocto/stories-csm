<?php get_header(); ?>


<div class="col-md-12">
    <div class="content-post-single">
        <?php if (have_posts()) : ?>
            <div class="posts">
                <?php while (have_posts()) : the_post(); ?>
                    <header class="page-header">
                        <a href="'<?php echo home_url(); ?> '">Regresar</a>
                        <h2 class="page-title"><?php the_title() ?></h2>
                        <time class="entry-date published updated">
                            <?php the_time(get_option('date_format')); ?>
                        </time>
                    </header>
                    <figure>
                        <?php the_post_thumbnail('post-thumb'); ?>
                    </figure>
                    <div class="content-post-single-description">
                        <?php the_content() ?>
                        <?php if (comments_open() || get_comments_number()) : ?>
                            <div class="comments-wrapper">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>

            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer() ?>
