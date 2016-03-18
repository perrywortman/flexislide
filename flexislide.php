<?php

/*
Plugin Name: FlexiSlide
Plugin URI: Not yet published
Description: A custom slider plugin that uses FlexSlider (https://www.woothemes.com/flexslider/)
Author: W. Perry Wortman
Version: 0.1
Author URI: https://perrywortman.com
*/


// Our Constants
define( 'FS_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define( 'FS_NAME', 'VCG FlexiSlide' );
define( 'FS_VERSION', '1.0.0' );


// Load CPT file
require_once( 'flexislide-img-type.php' );


// Enqueue our script and styles
function fs_load_scripts() {
	wp_enqueue_script( 'flexislide', FS_PATH . 'jquery.flexslider-min.js', array( 'jquery' ) );
	wp_enqueue_style( 'flexislide', FS_PATH . 'flexslider.css' );
}
add_action( 'wp_enqueue_scripts', 'fs_load_scripts' );


// Load our script in the head - Adjust FlexSlider properties here if needed
function fs_script() {
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
add_action( 'wp_head', 'fs_script' );


// Fetch and wrap our CPT in FlexSlider markup
function fs_get_slider() {
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
function fs_insert_slider( $atts, $content = null ) {
	$slider = fs_get_slider();
	return $slider;
}


// Creates our shortcode
add_shortcode( 'fs_slider', 'fs_insert_slider' );



function fs_slider() {
	print fs_get_slider();
}