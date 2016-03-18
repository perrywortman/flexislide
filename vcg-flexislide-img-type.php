<?php

// Our contants
define('CPT_NAME', 'FlexiSlide');
define('CPT_SINGLE', 'Slider Image');
define('CPT_TYPE', 'slider-image');

 
// Add thumbnail support
add_theme_support('post-thumbnails', array('slider-image'));


// Creates FlexiSlide CPT  
function vcg_fs_register() {  
    $args = array(  
        'label' => __(CPT_NAME),  
        'singular_label' => __(CPT_SINGLE),  
        'public' => true,  
        'show_ui' => true,
        'menu_icon' => 'dashicons-slides',  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'thumbnail', 'custom-fields')  
       );     
    register_post_type(CPT_TYPE , $args );  
}  
add_action('init', 'vcg_fs_register');