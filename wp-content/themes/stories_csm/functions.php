<?php

function stories_csm_setup()
{

    add_theme_support('post-thumbnails');
    add_image_size( 'featured-post-thumb', 340, 210, true );
    add_image_size( 'featured-post-thumb-feature', 560, 400, true );
    add_image_size( 'post-thumb', 1200, 400 );

    add_theme_support('menus');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'stories_csm')
    ));


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
            'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);


    add_theme_support('post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ));

    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'stories_csm_setup');

function stories_csm_widgets_init()
{
    register_sidebar(array(
        'name' => __('Widget Area', 'stories_csm'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'stories_csm'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'stories_csm_widgets_init');


function stories_csm_scripts()
{
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );

/*     wp_enqueue_script('stories_csm_html5shiv', get_template_directory_uri() . '/js/ie/html5shiv.js', array(), '1.0');
    wp_script_add_data('stories_csm_html5shiv', 'conditional', 'lte IE 8');

    wp_enqueue_style('stories_csm_main', get_stylesheet_directory_uri() . '/css/main.css', array(), '1.0');

    wp_enqueue_style('stories_csm-ie9', get_stylesheet_directory_uri() . '/css/ie9.css', array(), '1.0');
    wp_style_add_data('stories_csm-ie9', 'conditional', 'lte IE 9');

    wp_enqueue_style('stories_csm-ie8', get_stylesheet_directory_uri() . '/css/ie8.css', array(), '1.0');
    wp_style_add_data('stories_csm-ie8', 'conditional', 'lte IE 8');

    wp_enqueue_script('stories_csm_jquery_script', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0', true);

    wp_enqueue_script('stories_csm_skel_script', get_template_directory_uri() . '/js/skel.min.js', array(), '1.0', true);

    wp_enqueue_script('stories_csm_main_script', get_template_directory_uri() . '/js/main.js', array('stories_csm_jquery_script', 'stories_csm_skel_script'), '1.0', true);

    wp_enqueue_script('stories_csm_respond_script_ie8', get_template_directory() . '/js/ie/respond.min.js', array(), '1.0', true);
    wp_script_add_data('stories_csm_respond_script_ie8', 'conditional', 'lte IE 8');

    wp_enqueue_script('stories_csm_util_script', get_template_directory_uri() . '/js/util.js', array('stories_csm_jquery_script', 'stories_csm_skel_script'), '1.0', true);
 */
}

add_action('wp_enqueue_scripts', 'stories_csm_scripts');

function modify_read_more_link() {
    return '<a class="more-link button" href="' . get_permalink() . '">More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


if (!class_exists('Favorite_Post_Widget')) {
    require_once(__DIR__ . '/Favorite_Post_Widget.php');
}