<?php

/*
Plugin Name: VCG FlexiSlide
Plugin URI: 
Description: A custom slider plugin that uses FlexSlider (https://www.woothemes.com/flexslider/)
Author: Vision Creative Group
Version: 1.0.0
Author URI: https://visioncreativegroup.com
*/


// Our Constants
define( 'VCG_FS_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define( 'VCG_FS_NAME', 'VCG FlexiSlide' );
define( 'VCG_FS_VERSION', '1.0.0' );


// Load CPT file
require_once( 'vcg-flexislide-img-type.php' );


// Enqueue our script and styles
function vcg_fs_load_scripts() {
	wp_enqueue_script( 'flexislide', VCG_FS_PATH . 'jquery.flexslider-min.js', array( 'jquery' ) );
	wp_enqueue_style( 'flexislide', VCG_FS_PATH . 'flexslider.css' );
}
add_action( 'wp_enqueue_scripts', 'vcg_fs_load_scripts' );


// Load our script in the head - Adjust FlexSlider properties here if needed
function vcg_fs_script() {
	print '<script type="text/javascript" charset="utf-8">jQuery(document).ready(function(){ jQuery(".flexslider").flexslider({
			animation: "slide",
			animationSpeed: 1000,
			slideshowSpeed: 5000,
			reverse: true,
			start: function(){
				jQuery(".flex-caption").show().addClass("bounceInDown");
			},
			end: function(){
				jQuery(".flex-caption").removeClass("bounceInDown");
			}
	}); } );</script>';
}
add_action( 'wp_head', 'vcg_fs_script' );


// Fetch and wrap our CPT in FlexSlider markup
function vcg_fs_get_slider() {
	$slider = '<div class="flexslider"><ul class="slides">';
    $efs_query = "post_type=slider-image";
    $posts = get_posts( $efs_query );
  
    foreach( $posts as $post ) : setup_postdata( $post );
	    $img = get_the_post_thumbnail( $post->ID, 'full' );
	    $slide_link = get_post_meta( $post->ID, 'image_link', true);
	    $slide_caption = get_post_meta( $post->ID, 'image_caption', true );
		$slider .= '<li><a href='.$slide_link.'>' . $img . '<div class="flex-caption">' . $slide_caption . '</div></a></li>';
	endforeach;
 
    $slider .= '</ul></div>';
    return $slider;
}


// Calls our get_slider function
function vcg_fs_insert_slider( $atts, $content = null ) {
	$slider = vcg_fs_get_slider();
	return $slider;
}


// Creates our shortcode
add_shortcode( 'vcg_fs_slider', 'vcg_fs_insert_slider' );



function vcg_fs_slider() {
	print vcg_fs_get_slider();
}