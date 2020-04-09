<?php
if ( ! defined('ABSPATH')) exit;  // if direct access



add_action('ssb_settings_tabs_content_options','ssb_settings_tabs_content_options');

function ssb_settings_tabs_content_options(){

    $settings_tabs_field = new settings_tabs_field();

    $social_share_button_settings = get_option( 'social_share_button_settings' );

    $max_button_count = $social_share_button_settings['max_button_count'];
    $display_more_button = $social_share_button_settings['display_more_button'];
    $display_total_count = $social_share_button_settings['display_total_count'];
    $count_format = $social_share_button_settings['count_format'];
    $sharing_media = $social_share_button_settings['sharing_media'];

    if(empty($sharing_media)) {
        $class_social_share_button_functions = new class_social_share_button_functions();
        $sharing_media = $class_social_share_button_functions->social_share_button_sites();


    }








    //$screen = get_current_screen();



    ?>




    <div class="section">
        <div class="section-title">General Option</div>
        <p class="description section-description">Set some basic option to get start.</p>

        <?php

        $args = array(
            'id'		=> 'max_button_count',
            'parent' => 'social_share_button_settings',
            'title'		=> __('Max button display','social-share-button'),
            'details'	=> __('Display max button count.','social-share-button'),
            'type'		=> 'text',
            'value'		=> $max_button_count,
            'default'		=> 4,
        );

        $settings_tabs_field->generate_field($args);

        $args = array(
            'id'		=> 'display_more_button',
            'parent' => 'social_share_button_settings',
            'title'		=> __('Display more buttons','social-share-button'),
            'details'	=> __('Display or hide more buttons.','social-share-button'),
            'type'		=> 'select',
            'value'		=> $display_more_button,
            'default'		=> 'no',
            'args'		=> array(
                'no'=>__('No','social-share-button'),
                'yes'=>__('Yes','social-share-button'),



            ),
        );

        $settings_tabs_field->generate_field($args);



        $args = array(
            'id'		=> 'display_total_count',
            'parent' => 'social_share_button_settings',
            'title'		=> __('Display total count','social-share-button'),
            'details'	=> __('Display or hide total count.','social-share-button'),
            'type'		=> 'select',
            'value'		=> $display_total_count,
            'default'		=> 'no',
            'args'		=> array(
                'no'=>__('No','social-share-button'),
                'yes'=>__('Yes','social-share-button'),



            ),
        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'		=> 'count_format',
            'parent' => 'social_share_button_settings',
            'title'		=> __('Count format','social-share-button'),
            'details'	=> __('Full format will display whole number(4000) and short format will display as 4k (i.e 4000).','social-share-button'),
            'type'		=> 'select',
            'value'		=> $count_format,
            'default'		=> 'full',
            'args'		=> array(
                'full'=>__('Full','social-share-button'),
                'short'=>__('Short','social-share-button'),

            ),
        );

        $settings_tabs_field->generate_field($args);




        $sharing_media_fields = array(

            array(
                'id'		=> 'title',
                'title'		=> __('Site name','social-share-button'),
                'details'	=> __('Write site name here.','social-share-button'),
                'type'		=> 'text',
                'value'		=> '',
                'default'		=> '',
                'placeholder'		=> '',
            ),

            array(
                'id'		=> 'id',
                'title'		=> __('Unique ID','social-share-button'),
                'details'	=> __('Write site id here.','social-share-button'),
                'type'		=> 'text',
                'value'		=> '',
                'default'		=> '',
                'placeholder'		=> '',
            ),

            array(
                'id'		=> 'share_url',
                'title'		=> __('Share URL','social-share-button'),
                'details'	=> __('Add share url.','social-share-button'),
                'type'		=> 'text',
                'value'		=> '',
                'default'		=> '',
                'placeholder'		=> '',
            ),

            array(
                'id'		=> 'icon',
                'title'		=> __('Site icon','social-share-button'),
                'details'	=> __('Add site icon. you can use any icon font, like <a href="https://fontawesome.com/icons">fontawesome</a> ex: <code> &lt;i class="fab fa-twitter"></i></code> ','social-share-button'),
                'type'		=> 'textarea',
                'value'		=> '',
                'default'		=> '',
                'placeholder'		=> '',
            ),

            array(
                'id'		=> 'visible',
                'title'		=> __('Is visible?','social-share-button'),
                'details'	=> __('Check if you want to visible this media.','social-share-button'),
                'type'		=> 'checkbox',
                'value'		=> '',
                'default'		=> 'yes',
                'args'		=> array(
                    'yes'=>__('Yes','social-share-button'),
                    'no'=>__('No','social-share-button'),

                ),
            ),



        );


        $sharing_media_fields = apply_filters('social_share_button_sharing_media_fields', $sharing_media_fields);




        $args = array(
            'id'		=> 'sharing_media',
            'parent' => 'social_share_button_settings',
            'title'		=> __('Sharing media','text-domain'),
            'details'	=> __('Add or customize social media sites.','text-domain'),
            'collapsible'=>true,
            'type'		=> 'repeatable',
            'limit'		=> 10,
            'title_field'		=> 'title',
            'value'		=> $sharing_media,
            'fields'    => $sharing_media_fields,
        );

        $settings_tabs_field->generate_field($args);










        ?>


    </div>
    <?php

}







add_action('ssb_settings_tabs_content_style','ssb_settings_tabs_content_style');

function ssb_settings_tabs_content_style(){

    $settings_tabs_field = new settings_tabs_field();
    $social_share_button_settings = get_option( 'social_share_button_settings' );

    $theme = $social_share_button_settings['theme'];



    ?>
    <div class="section">
        <div class="section-title">Choose style</div>
        <p class="description section-description">Customize the share buttons.</p>

        <?php



        $args = array(
            'id'		=> 'theme',
            'parent' => 'social_share_button_settings',
            'title'		=> __('Choose themes','social-share-button'),
            'details'	=> __('Choose share button theme','social-share-button'),
            'type'		=> 'radio_image',
            'value'		=> $theme,
            'default'		=> 'theme5',
            'width'		=> '350px',
            'args'		=> array(

                'theme1'=>array('name'=>'theme1','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme1.png'),
                'theme2'=>array('name'=>'theme1','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme2.png'),
                'theme3'=>array('name'=>'theme1','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme3.png'),
                'theme4'=>array('name'=>'theme1','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme4.png'),
                'theme5'=>array('name'=>'theme5','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme5.png'),
                'theme6'=>array('name'=>'theme6','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme6.png'),
                'theme7'=>array('name'=>'theme7','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme7.png'),
                'theme8'=>array('name'=>'theme8','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme8.png'),
                'theme9'=>array('name'=>'theme9','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme9.png'),
                'theme10'=>array('name'=>'theme10','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme10.png'),
                'theme11'=>array('name'=>'theme11','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme11.png'),
                'theme12'=>array('name'=>'theme12','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme12.png'),
                'theme13'=>array('name'=>'theme13','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme13.png'),
                'theme14'=>array('name'=>'theme14','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme14.png'),
                'theme15'=>array('name'=>'theme15','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme15.png'),
                'theme16'=>array('name'=>'theme16','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme16.png'),
                'theme17'=>array('name'=>'theme17','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme17.png'),
                'theme18'=>array('name'=>'theme18','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme18.png'),
                'theme19'=>array('name'=>'theme19','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme19.png'),
                'theme20'=>array('name'=>'theme20','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme20.png'),
                'theme21'=>array('name'=>'theme21','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme21.png'),
                'theme22'=>array('name'=>'theme22','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme22.png'),
                'theme23'=>array('name'=>'theme23','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme23.png'),
                'theme24'=>array('name'=>'theme24','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme24.png'),
                'theme25'=>array('name'=>'theme25','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme25.png'),
                'theme26'=>array('name'=>'theme26','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme26.png'),
                'theme27'=>array('name'=>'theme27','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme27.png'),
                'theme28'=>array('name'=>'theme28','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme28.png'),
                'theme29'=>array('name'=>'theme29','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme29.png'),
                'theme30'=>array('name'=>'theme30','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme30.png'),
                'theme31'=>array('name'=>'theme31','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme31.png'),
                'theme32'=>array('name'=>'theme32','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme32.png'),
                'theme33'=>array('name'=>'theme33','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme33.png'),
                'theme34'=>array('name'=>'theme34','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme34.png'),
                'theme35'=>array('name'=>'theme35','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme35.png'),
                'theme36'=>array('name'=>'theme36','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme36.png'),
                'theme37'=>array('name'=>'theme37','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme37.png'),
                'theme38'=>array('name'=>'theme38','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme38.png'),



//
//                'theme6'=>array('name'=>'theme6','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme6.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme7'=>array('name'=>'theme7','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme7.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme8'=>array('name'=>'theme8','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme8.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme9'=>array('name'=>'theme9','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme9.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme10'=>array('name'=>'theme10','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme10.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme11'=>array('name'=>'theme11','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme11.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme12'=>array('name'=>'theme12','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme12.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme13'=>array('name'=>'theme13','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme13.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme14'=>array('name'=>'theme14','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme14.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),
//                'theme15'=>array('name'=>'theme15','thumb'=>social_share_button_plugin_url.'assets/admin/images/theme15.png', 'disabled'=>true, 'pro_msg'=>'Only in pro'),






            ),
        );

        $settings_tabs_field->generate_field($args);

        ?>


    </div>
    <?php

}


add_action('ssb_settings_tabs_content_display','ssb_settings_tabs_content_display');

function ssb_settings_tabs_content_display(){

    $settings_tabs_field = new settings_tabs_field();

    $social_share_button_settings = get_option( 'social_share_button_settings' );

    $display_args = $social_share_button_settings['display_args'];

    if(empty($display_args)){
        $display_args = array (
            0 =>
                array (
                    'location' => 'none',
                    'position' => 'after',
                    'posttype' => 'post',
                    'page_type' => 'single',
                ),
        );
    }



    ?>



    <div class="section">
        <div class="section-title">Display settings</div>
        <p class="description section-description">Choose where you want to display share buttons.</p>

        <?php


        $post_types = get_post_types( '', 'names' );
        $display_args_fields = array(

            array(
                'id'		=> 'location',
                'title'		=> __('Display on?','social-share-button'),
                'details'	=> __('Choose where you want to display share buttons','social-share-button'),
                'type'		=> 'select',
                'value'		=> '',
                'default'		=> 'yes',
                'args'		=> array(
                    'none'=>__('None','social-share-button'),
                    'content'=>__('Content','social-share-button'),

                ),
            ),

            array(
                'id'		=> 'position',
                'title'		=> __('Position?','social-share-button'),
                'details'	=> __('Choose position where you want to display share buttons','social-share-button'),
                'type'		=> 'select',
                'value'		=> '',
                'default'		=> 'yes',
                'args'		=> array(
                    'none'=>__('None','social-share-button'),
                    'before'=>__('Before','social-share-button'),
                    'after'=>__('After','social-share-button'),
                ),
            ),

            array(
                'id'		=> 'posttype',
                'title'		=> __('Post types?','social-share-button'),
                'details'	=> __('Choose Post types where you want to display share buttons','social-share-button'),
                'type'		=> 'select',
                'value'		=> '',
                'default'		=> 'post',
                'args'		=> $post_types,
            ),

            array(
                'id'		=> 'page_type',
                'title'		=> __('Page type?','social-share-button'),
                'details'	=> __('Choose page type where you want to display share buttons','social-share-button'),
                'type'		=> 'select',
                'value'		=> '',
                'default'		=> 'yes',
                'args'		=> array(
                    'none'=>__('None','social-share-button'),
                    'single'=>__('Single','social-share-button'),
                    'archive'=>__('Archive','social-share-button'),
                    'home'=>__('Home','social-share-button'),
                    'blog'=>__('Blog','social-share-button'),
                ),
            ),







        );


        $display_args_fields = apply_filters('social_share_button_display_args', $display_args_fields);


        $args = array(
            'id'		=> 'display_args',
            'parent' => 'social_share_button_settings',
            'title'		=> __('Display conditions','text-domain'),
            'details'	=> __('Put your display condition where you want to display share button dynamically.','text-domain'),
            'collapsible'=>true,
            'type'		=> 'repeatable',
            'limit'		=> 10,
            'title_field'		=> 'posttype',
            'value'		=> $display_args,
            'fields'    => $display_args_fields,
        );

        $settings_tabs_field->generate_field($args);











        ?>


    </div>
    <?php

}


add_action('ssb_settings_tabs_content_shortcode','ssb_settings_tabs_content_shortcode');

function ssb_settings_tabs_content_shortcode(){

    $settings_tabs_field = new settings_tabs_field();


    ?>
    <div class="section">
        <div class="section-title">Shortcodes</div>
        <p class="description section-description">Simply copy these shortcode and user under post or page content</p>


        <?php
        ob_start();
        ?>

        <div class="copy-to-clipboard">
            <input type="text" value="[social_share_button themes='theme1']"> <span class="copied">Copied</span>
            <p class="description">You can use this shortcode under post content</p>
        </div>


        <div class="copy-to-clipboard">
            <textarea cols="50" rows="2" style="background:#bfefff" onClick="this.select();"><?php echo '<?php echo do_shortcode("[social_share_button'; echo " themes='theme1']"; echo '"); ?>'; ?></textarea> <span class="copied">Copied</span>
            <p class="description">PHP Code, you can use under theme .php files.</p>
        </div>



        <style type="text/css">
             .copy-to-clipboard {
            }

             .copy-to-clipboard .copied {
                display: none;
                background: #e5e5e5;
                padding: 4px 10px;
                line-height: normal;
            }
        </style>

        <script>
            jQuery(document).ready(function ($) {
                $(document).on('click', '.copy-to-clipboard input, .copy-to-clipboard textarea', function () {
                    $(this).focus();
                    $(this).select();
                    document.execCommand('copy');
                    $(this).parent().children('.copied').fadeIn().fadeOut(2000);
                })
            })
        </script>
        <?php
        $html = ob_get_clean();
        $args = array(
            'id' => 'breadcrumb_shortcodes',
            'title' => __('Get shortcode', 'social-share-button'),
            'details' => '',
            'type' => 'custom_html',
            'html' => $html,
        );
        $settings_tabs_field->generate_field($args);






        ob_start();
        ?>


        <div class="">
            <video autoplay="" loop="" class="" style="max-width: 100%; min-height: 505px;"><source type="video/mp4" src="//i.imgur.com/tBpP1jl.mp4"></video>
        </div>



        <?php
        $html = ob_get_clean();
        $args = array(
            'id' => 'breadcrumb_use_shortcodes',
            'title' => __('Where to use shortcode', 'social-share-button'),
            'details' => '',
            'type' => 'custom_html',
            'html' => $html,
        );
        $settings_tabs_field->generate_field($args);













        ?>
    </div>
    <?php

}




add_action('ssb_settings_tabs_content_custom_scripts','ssb_settings_tabs_content_custom_scripts');

function ssb_settings_tabs_content_custom_scripts(){

    $settings_tabs_field = new settings_tabs_field();

    $social_share_button_settings = get_option( 'social_share_button_settings' );

    $custom_css = $social_share_button_settings['custom_css'];

    ?>
    <div class="section">
        <div class="section-title">Custom CSS</div>
        <p class="description section-description">Add your own scripts and style css.</p>

        <?php

        $args = array(
            'id'		=> 'custom_css',
            'parent' => 'social_share_button_settings',
            'title'		=> __('Custom CSS','social-share-button'),
            'details'	=> __('Add your own CSS.','social-share-button'),
            'type'		=> 'scripts_css',
            'value'		=> $custom_css,
            'default'		=> '.wp-share-button{}&#10;.wp-share-button a{}&#10;',
        );

        $settings_tabs_field->generate_field($args);









        ?>


    </div>
    <?php

}






add_action('ssb_settings_tabs_content_help_support','ssb_settings_tabs_content_help_support');

function ssb_settings_tabs_content_help_support(){

    $settings_tabs_field = new settings_tabs_field();

    //$breadcrumb_custom_css = get_option( 'breadcrumb_custom_css' );


    ?>
    <div class="section">
        <div class="section-title">Get support & help</div>
        <p class="description section-description">If you have any issue please let us know.</p>



        <?php

        ob_start();
        ?>

        <h3>Try Pro features</h3>
        <a class="button" href="https://www.pickplugins.com/item/breadcrumb-awesome-breadcrumbs-style-navigation-for-wordpress/?ref=dashboard" target="_blank">Buy Now</a>
        <p class="description"></p>



        <?php

        $html = ob_get_clean();
        $args = array(
            'id' => 'breadcrumb_buy',
            'title' => __('Buy Premium', 'social-share-button'),
            'details' => '',
            'type' => 'custom_html',
            'html' => $html,
        );
        //$settings_tabs_field->generate_field($args);

        ?>


        <?php

        ob_start();
        ?>

        <h3>Documentation</h3>
        <a class="button" href="https://www.pickplugins.com/documentation/social-share-button/?ref=dashboard" target="_blank">Documentation</a><p class="description">Before asking, submitting reviews please take a look on our documentation, may help your issue fast.</p>

        <h3>Looking for support?</h3>
        <a class="button" href="https://www.pickplugins.com/forum/?ref=dashboard" target="_blank">Ask Question</a><p class="description">Its free and you can ask any question about our plugins and get support fast.</p>

        <h3>Provide your feedback</h3>

        <a class="button" href="https://wordpress.org/support/plugin/social-share-button/reviews/?filter=5" target="_blank">Submit Reviews</a> <a class="button" href="https://wordpress.org/support/plugin/social-share-button/#new-topic-0" target="_blank">Ask wordpress.org</a><p>We spent thousand+ hours to development on this plugin, please submit your reviews wisely.</p><p>If you have any issue with this plugin please submit our forums or contact our support first.</p><p class="description">Your feedback and reviews are most important things to keep our development on track. If you have time please submit us five star <span style="color: orange"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span> reviews.</p>

        <?php

        $html = ob_get_clean();
        $args = array(
            'id' => 'breadcrumb_support',
            'title' => __('Get support', 'social-share-button'),
            'details' => '',
            'type' => 'custom_html',
            'html' => $html,
        );
        $settings_tabs_field->generate_field($args);

        ?>


    </div>
    <?php

}
