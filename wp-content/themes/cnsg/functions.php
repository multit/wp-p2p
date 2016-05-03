<?php 

/*
      ___         ___         ___         ___              
     /\__\       /\  \       /\__\       /\__\             
    /:/  /       \:\  \     /:/ _/_     /:/ _/_            
   /:/  /         \:\  \   /:/ /\  \   /:/ /\  \           
  /:/  /  ___ _____\:\  \ /:/ /::\  \ /:/ /::\  \          
 /:/__/  /\__/::::::::\__/:/_/:/\:\__/:/__\/\:\__\         
 \:\  \ /:/  \:\~~\~~\/__\:\/:/ /:/  \:\  \ /:/  /         
  \:\  /:/  / \:\  \      \::/ /:/  / \:\  /:/  /          
   \:\/:/  /   \:\  \      \/_/:/  /   \:\/:/  /           
    \::/  /     \:\__\       /:/  /     \::/  /            
     \/__/       \/__/       \/__/       \/__/             

*/


function wpdocs_theme_name_scripts() {

  // Attenzione con questo modernizr è una versione custom con SVG, per ora
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-custom.js', array() );
  // Aggiunti nell'header (default)
  wp_enqueue_script( 'what-input', get_template_directory_uri() . '/bower_components/what-input/what-input.js', array('jquery','jquery-masonry') );
  wp_enqueue_script( 'foundation-sites-js', get_template_directory_uri() . '/bower_components/foundation-sites/dist/foundation.min.js', array('what-input') );
  wp_enqueue_script( 'scrollify', get_template_directory_uri() . '/bower_components/jquery-scrollspy/jquery-scrollspy.js', array('jquery') );  
  wp_enqueue_script( 'gsap', get_template_directory_uri() . '/bower_components/gsap/src/minified/TweenMax.min.js', array('jquery') );
  // Aggiunti nel footer, parametro true alla fine
  wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array(),'',true );

}

add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
//add_action( 'init', 'wpdocs_theme_name_scripts' );


add_theme_support( 'post-thumbnails' );

// Aggiunto per far funzionare il pplugin Simple Page Ordering
add_post_type_support( 'post', 'page-attributes' );

// Include i walkers per i menu 
require get_template_directory() . '/inc/custom-walkers.php';
require get_template_directory() . '/inc/custom-menu-walkers.php';



/*

Developed by:
    ___       ___       ___       ___       ___       ___            ___       ___       ___       ___       ___       ___       ___       ___   
   /\  \     /\__\     /\  \     /\  \     /\  \     /\  \          /\  \     /\  \     /\  \     /\  \     /\  \     /\__\     /\__\     /\  \  
  /::\  \   /:| _|_   /::\  \   /::\  \   /::\  \   /::\  \        /::\  \   _\:\  \   /::\  \   /::\  \   /::\  \   /:/  /    /:/  /    _\:\  \ 
 /::\:\__\ /::|/\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /::\:\__\      /::\:\__\ /\/::\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /:/__/    /:/__/    /\/::\__\
 \/\::/  / \/|::/  / \:\/:/  / \;:::/  / \:\:\/  / \/\::/  /      \/\:\/__/ \::/\/__/ \:\/:/  / \;:::/  / \:\:\/  / \:\  \    \:\  \    \::/\/__/
   /:/  /    |:/  /   \::/  /   |:\/__/   \:\/  /    /:/  /          \/__/   \:\__\    \::/  /   |:\/__/   \:\/  /   \:\__\    \:\__\    \:\__\  
   \/__/     \/__/     \/__/     \|__|     \/__/     \/__/                    \/__/     \/__/     \|__|     \/__/     \/__/     \/__/     \/__/  

www.andreafiorelli.com

*/


?>