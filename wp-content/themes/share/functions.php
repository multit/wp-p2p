<?php 

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




function wpdocs_theme_name_scripts() {

  // Attenzione con questo modernizr è una versione custom con SVG, per ora
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-custom.js', array() );

  // Aggiunti nell'header (default)
  wp_enqueue_script( 'what-input', get_template_directory_uri() . '/bower_components/what-input/what-input.js', array('jquery','jquery-masonry') );
  wp_enqueue_script( 'foundation-sites-js', get_template_directory_uri() . '/bower_components/foundation-sites/dist/foundation.min.js', array('what-input') );
  wp_enqueue_script( 'scrollify', get_template_directory_uri() . '/bower_components/jquery-scrollspy/jquery-scrollspy.js', array('jquery') );  
  wp_enqueue_script( 'gsap', get_template_directory_uri() . '/bower_components/gsap/src/minified/TweenMax.min.js', array('jquery') );
  

  // Styles

  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/bower_components/font-awesome/css/font-awesome.min.css', array() );
  //wp_enqueue_style( 'libs', get_template_directory_uri() . 'css/libraries.min.css', array() );
  wp_enqueue_style( 'foundation', get_template_directory_uri() . '/bower_components/foundation-sites/dist/foundation.min.css', array() );
  wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/css/flaticon.css', array() );
  wp_enqueue_style( 'app', get_template_directory_uri() . '/css/app.css', array() );
  wp_enqueue_style( 'app_override', get_template_directory_uri() . '/css/app_override.css', array() );

  // Aggiunti nel footer, param true alla fine
  wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', array(),'',true );

}

add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
add_theme_support( 'post-thumbnails' );

// Aggiunto per far funzionare il pplugin Simple Page Ordering
add_post_type_support( 'post', 'page-attributes' );

// Include i walkers per i menu 
require get_template_directory() . '/inc/custom-walkers.php';
require get_template_directory() . '/inc/custom-menu-walkers.php';



/*
 ######  ##     ##  ######  ########  #######  ##     ##    ########   #######   ######  ######## 
##    ## ##     ## ##    ##    ##    ##     ## ###   ###    ##     ## ##     ## ##    ##    ##    
##       ##     ## ##          ##    ##     ## #### ####    ##     ## ##     ## ##          ##    
##       ##     ##  ######     ##    ##     ## ## ### ##    ########  ##     ##  ######     ##    
##       ##     ##       ##    ##    ##     ## ##     ##    ##        ##     ##       ##    ##    
##    ## ##     ## ##    ##    ##    ##     ## ##     ##    ##        ##     ## ##    ##    ##    
 ######   #######   ######     ##     #######  ##     ##    ##         #######   ######     ##    */


// Registrazione di quattro custom types
// 1. progetto
// 2. documento
// 3. staff
// 4. pubblicazione_to_progetto


// 1. Menu Progetti

add_action('init', 'registra_custom_post');

function registra_custom_post() {

  $labels = array(
    'name' => __( 'Progetto', 'progetto' ),
    'singular_name' => __( 'Progetto', 'progetto' ),
    'add_new' => __( 'Add New', 'progetto' ),
    'add_new_item' => __( 'Add New Progetto', 'progetto' ),
    'edit_item' => __( 'Modifica progetto', 'progetto' ),
    'new_item' => __( 'Nuovo progetto', 'progetto' ),
    'view_item' => __( 'View Project', 'progetto' ),
    'search_items' => __( 'Search progetto', 'progetto' ),
    'not_found' => __( 'Nessun progetto found', 'progetto' ),
    'not_found_in_trash' => __( 'No progetto found in Trash','progetto' ),
    'parent_item_colon' => __( 'Parent Progetto:', 'progetto'),
    'menu_name' => __( 'CNSG Progetti', 'progetto' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    //'taxonomies' => array('post_tag'),
    'description' => __( 'Progetti CNSG', 'progetto' ),
    'supports' => array( 'title', 'editor', 'thumbnail','tags' ),
    'public' => true,
    'menu_icon' => 'dashicons-admin-page',
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 2,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
    );

  register_post_type( 'progetto', $args );
  

  // 2. Menu Documenti

  $labels_doc = array(
    'menu_name' => 'CNSG Documenti'
    );
  $args_doc = array(
    'labels' => $labels_doc,
    'hierarchical' => true,
    'description' => __( 'Documenti CNSG', 'documento' ),
    'supports' => array( 'title' ),
    'public' => true,
    'menu_icon' => 'dashicons-admin-page',
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'   
  );
  register_post_type('documento', $args_doc);


  // 3. Menu Pubblicazioni

  $labels_pubblicazione = array(
    'menu_name' => 'CNSG Pubblicazioni'
    );
  $args_pubblicazione = array(
    'labels' => $labels_pubblicazione,
    'hierarchical' => true,
    'description' => __( 'pubblicazione CNSG', 'pubblicazione' ),
    'supports' => array( 'title' ),
    'public' => true,
    'menu_icon' => 'dashicons-admin-page',
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'   
  );
  register_post_type('pubblicazione', $args_pubblicazione);


  // 4. Menu Staff

  $labels_staff = array(
    'menu_name' => 'CNSG Staff'
    );
  $args_staff = array(
    'labels' => $labels_staff,
    'hierarchical' => true,
    'description' => __( 'Staff CNSG', 'staff' ),
    'supports' => array( 'title', 'editor','thumbnail' ),
    'public' => true,
    'menu_icon' => 'dashicons-admin-users',
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 6,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'   
  );
  register_post_type('staff', $args_staff);


  flush_rewrite_rules();

}

/* taxonomy personale 
 ######  ##     ##  ######  ########  #######  ##     ##    ########    ###    ##     ##  #######  ##    ##  #######  ##     ## ##    ## 
##    ## ##     ## ##    ##    ##    ##     ## ###   ###       ##      ## ##    ##   ##  ##     ## ###   ## ##     ## ###   ###  ##  ##  
##       ##     ## ##          ##    ##     ## #### ####       ##     ##   ##    ## ##   ##     ## ####  ## ##     ## #### ####   ####   
##       ##     ##  ######     ##    ##     ## ## ### ##       ##    ##     ##    ###    ##     ## ## ## ## ##     ## ## ### ##    ##    
##       ##     ##       ##    ##    ##     ## ##     ##       ##    #########   ## ##   ##     ## ##  #### ##     ## ##     ##    ##    
##    ## ##     ## ##    ##    ##    ##     ## ##     ##       ##    ##     ##  ##   ##  ##     ## ##   ### ##     ## ##     ##    ##    
 ######   #######   ######     ##     #######  ##     ##       ##    ##     ## ##     ##  #######  ##    ##  #######  ##     ##    ##    
*/
// Crea le categorie dei progetti rinominata projects!!

add_action('init', 'registra_categorie_dei_progetti');
function registra_categorie_dei_progetti() {

  // projects
  $labels = array(
    'name'                  => 'Categorie Progetto',
    'add_new_item'    => 'Nuovo Categoria Progetto',
    'edit_item'     => 'Modifica Categoria Progetto'
  );
  $args = array(
    'hierarchical'          => true,
    'show_tagcloud'   => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_in_menu'    => true,
    'show_admin_column'     => false
  );
  // ATTENZIONE eliminata la tass projects per le news
  register_taxonomy( 'projects', array('post','progetto'), $args );

  // keywords
  $labels = array(
    'name'                  => 'Keywords',
    'add_new_item'    => 'Nuovo Keywords',
    'edit_item'     => 'Modifica Keywords'
  );
  $args = array(
    'hierarchical'          => false,
    'show_tagcloud'         => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_admin_column'     => false
  );
  register_taxonomy( 'keywords', array('post','progetto'), $args );


  // Utilizza anche i tags generici per i progetti (Disabilitata a favore della nuova taxonomy keywords)
  //register_taxonomy_for_object_type('post_tag', 'progetto');
 

  // Riumove i tags da tutte e categorie dei posts
  register_taxonomy('post_tag', array());

}










?>