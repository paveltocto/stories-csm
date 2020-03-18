<?php get_header(); ?>


<div class="col-md-12">


<a href="'<?php echo home_url(); ?> '" >Regresar</a>


<?php if (have_posts()) : ?>
    <section>
        <?php while (have_posts()) : the_post(); ?>
                <header class="main">
                    <h1><?php the_title() ?></h1>
                </header>
                <span class="image main"><?php the_post_thumbnail('post-thumb'); ?></span>
                <?php the_content() ?>
        <?php endwhile; ?>
    </section>

    <?php
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    ?>

<?php endif; ?>
</div>

<?php get_footer() ?>
