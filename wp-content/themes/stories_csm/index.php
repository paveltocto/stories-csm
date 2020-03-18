<?php get_header(); ?>


<div class="col-md-8">
<section class="content-posts">
    <?php if ( is_home() && ! is_front_page() ) : ?>
        <header class="page-header">
            <h1 class="page-title"><?php single_post_title(); ?></h1>
        </header>
    <?php else : ?>
        <header class="page-header">
            <h2 class="page-title"><?php _e( 'Mis Historias', 'stories_scm' ); ?></h2>
        </header>
    <?php endif; ?>

    <?php if (have_posts()) : ?>
        <div class="posts">
            <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="image">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('storiescsm-post-thumb-feature'); ?>
                    <?php endif; ?>
                    <div class="post-entry-information">
                        <h3><?php the_title() ?></h3>
                        <time class="entry-date published updated">
                            <?php the_time( get_option( 'date_format' ) ); ?>
                        </time>
                    </div>
                </a>
            </article>
            <?php endwhile; ?>
        </div>
        <?php echo bootstrap_pagination(); ?>
    <?php endif; ?>
</section>

</div>
<?php get_sidebar(); ?>

<div class="fondo"></div>

<?php get_footer() ?>
