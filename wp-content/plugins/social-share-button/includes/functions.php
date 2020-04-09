<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/
if ( ! defined('ABSPATH')) exit;  // if direct access 

function social_share_button_number_short($number){

    $short_value = $number;

    if($number>1000000000000){
        $short_value = round(($number/1000000000000),1).'t+';
    }
    else if($number>1000000000){
        $short_value = round(($number/1000000000),1).'b+';
    }
    else if($number>1000000){
        $short_value = round(($number/1000000),1).'m+';
    }
    else if($number>1000){
        $short_value = round(($number/1000),1).'k+';
    }

    return $short_value;

}


function social_share_button_filter_buttons_before_extra($html){


    $social_share_button_settings = get_option( 'social_share_button_settings' );
    $display_args = $social_share_button_settings['display_args'];
    $display_total_count = $social_share_button_settings['display_total_count'];
    $count_format = $social_share_button_settings['count_format'];


   // var_dump('Hello');

	$social_share_button_tc_text = get_option('social_share_button_tc_text' ,'Total Share');
	$social_share_button_tc_themes = get_option('social_share_button_tc_themes');

	if($display_total_count == 'yes'){

		$share_count = get_post_meta( get_the_ID(), 'social_share_button_share_count', true );
		$total_count = 0;
		//var_dump($share_count);
		if(!empty($share_count)){
			foreach($share_count as $key=>$count){
				$total_count +=$count;
			}
		}


        if($count_format=='short'){


            $total_count = social_share_button_number_short($total_count);
        }


		$html.= '<span class="total-share '.$social_share_button_tc_themes.'">';
		$html.= '<i class="total-count-text">'.$social_share_button_tc_text.'</i> ';
		$html.= '<i class="total-count">'.$total_count.'</i> ';
		$html.= '</span>';


	}



	return $html;

}
add_filter('social_share_button_filter_buttons_before','social_share_button_filter_buttons_before_extra');







	
	
	function social_share_button_open_graph(){
		
		$data = '';
		
		if(is_singular()){
			
			$data.= '<meta property="og:title" content="'.get_the_title(get_the_ID()).'" />';
			$data.= '<meta property="og:url" content="'.get_permalink(get_the_ID()).'" />';
			
			if(has_post_thumbnail()){
				
				$team_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
				$team_thumb_url = $team_thumb['0'];
				
				$data.= '<meta property="og:image" content="'.$team_thumb_url.'" />';
	
				}
								
			
			}
		

		
		echo $data;
		
		
		}
	add_action('wp_head','social_share_button_open_graph');




function social_share_button_filter_the_content($content){


    $social_share_button_settings = get_option( 'social_share_button_settings' );
    $display_args = $social_share_button_settings['display_args'];


	$html = '';
	$social_share_button = do_shortcode('[social_share_button]');


	if(empty($display_args)){

        $display_args[] = array(
			'location' =>  'content',
			'position' =>  'after',
			'posttype' =>  'post',
			'page_type' =>  'single'
		);
	}

	//var_dump();





	$posttype = get_post_type( get_the_ID() );

	if( is_archive() ) $page_type = 'archive';
    elseif( is_singular() ) $page_type = 'single';
    elseif( is_home() ) $page_type = 'home';
	else $page_type = 'none';

	$count = 0;


	foreach($display_args as $key=>$button_info){

		$location = $button_info['location'];

		if($location=='content'){
			if ( $page_type == $button_info['page_type'] ){
				if ($posttype == $button_info['posttype']){
					$check = $posttype.'_'.$count;

					if( $button_info['position'] == 'before') $html .= $social_share_button;
					if ( $check == $button_info['posttype'].'_0' ) $html .= $content;
					if( $button_info['position'] == 'after' ) $html .= $social_share_button;

					$count++;
				}
				//else return $content;
			}
		}




	}
	if ( empty($html) ) return $content;
	else return $html;
}

add_filter('the_content','social_share_button_filter_the_content');





function social_share_button_filter_the_title($content){
    $social_share_button_settings = get_option( 'social_share_button_settings' );
    $display_args = $social_share_button_settings['display_args'];


	$html = '';
	//$social_share_button = do_shortcode('[social_share_button]');




	if(empty($display_args)){

        $display_args[] = array(
			'location' =>  'content',
			'position' =>  'after',
			'posttype' =>  'post',
			'page_type' =>  'single'
		);
	}

	$posttype = get_post_type( get_the_ID() );

	if( is_archive() ) $page_type = 'archive';
    elseif( is_singular() ) $page_type = 'single';
    elseif( is_home() ) $page_type = 'home';
	else $page_type = 'none';

	$count = 0;


	foreach($display_args as $key=>$button_info){
		$location = $button_info['location'];
		if($location=='post_title'){
			if ( $page_type == $button_info['page_type'] ){
				if ($posttype == $button_info['posttype']){

					$social_share_button = do_shortcode('[social_share_button]');
					$check = $posttype.'_'.$count;
					if( $button_info['position'] == 'before') $html .= $social_share_button;
					if ( $check == $button_info['posttype'].'_0' ) $html .= $content;
					if( $button_info['position'] == 'after' ) $html .= $social_share_button;

					$count++;
				}
			}
		}
	}
	if ( empty($html) ) return $content;
	else return $html;
}

add_filter('the_excerpt','social_share_button_filter_the_title');

















function social_share_button_ajax_update_count(){
		$current_site_id = sanitize_text_field($_POST['site_id']);
		$post_id = (int)sanitize_text_field($_POST['post_id']);
		
		$social_share_button_sites = get_option( 'social_share_button_sites' );
		$share_count = get_post_meta( $post_id, 'social_share_button_share_count', true );


		do_action('social_share_button_update_count', $post_id, $current_site_id);

		foreach($social_share_button_sites as $site_key=>$site_info){
				$site_id = $site_info['id'];
				if($current_site_id == $site_id){
						$social_share_button_share_count[$site_id] = (int)$share_count[$site_id]+1;

					}
				else{
						$social_share_button_share_count[$site_id] = (int)$share_count[$site_id];
					}
			}


		// update count
		update_post_meta( $post_id, 'social_share_button_share_count', $social_share_button_share_count );

		
		die();
	}



add_action('wp_ajax_social_share_button_ajax_update_count', 'social_share_button_ajax_update_count');
add_action('wp_ajax_nopriv_social_share_button_ajax_update_count', 'social_share_button_ajax_update_count');
	

