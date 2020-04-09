<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ('1' === $comments_number) {
                /* translators: %s: Post title. */
                printf(_x('Un comentario en &ldquo;%s&rdquo;', 'comments title', 'stories_csm'), get_the_title());
            } else {
                printf(
                /* translators: 1: Number of comments, 2: Post title. */
                    _nx(
                        '%1$s comentario en &ldquo;%2$s&rdquo;',
                        '%1$s comentarios en &ldquo;%2$s&rdquo;',
                        $comments_number,
                        'comments title',
                        'stories_csm'
                    ),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style' => 'ul',
                    'short_ping' => true,
                    'avatar_size' => 30,
                    'callback' => 'my_comments_callback'
                )
            );
            ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'stories_csm'); ?></p>
    <?php endif; ?>


    <?php


    comment_form();
 ?>

</div><!-- .comments-area -->
