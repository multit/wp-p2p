<?php 

define('CPT_NAME', "HP Slider Images");
define('CPT_SINGLE', "HP Slider Image");
define('CPT_TYPE', "slider-image");
 
add_theme_support('post-thumbnails', array('slider-image'));


function slide_format_register() {  
    $args = array(  
        'label' => __(CPT_NAME),  
        'singular_label' => __(CPT_SINGLE),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail')  
       );  
   
    register_post_type(CPT_TYPE , $args );  
}  
 
add_action('init', 'slide_format_register');

?>