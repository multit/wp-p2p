<?php 

// define('CPT_NAME', "Fast Fact Graphs");
// define('CPT_SINGLE', "Grafico");
// define('CPT_TYPE', "chart-post");
 
add_theme_support('post-thumbnails', array('chart-post'));


function killer_charts_format_register() {  

    $labels = array(
        'name' => __( 'Grafico', 'grafico' ),
        'singular_name' => __( 'Grafico', 'grafico' ),
        'add_new' => __( 'Add New', 'grafico' ),
        'add_new_item' => __( 'Add New Grafico', 'grafico' ),
        'edit_item' => __( 'Edit Grafico', 'grafico' ),
        'new_item' => __( 'New Grafico', 'grafico' ),
        'view_item' => __( 'View Grafico', 'grafico' ),
        'search_items' => __( 'Search Grafico', 'grafico' ),
        'not_found' => __( 'No Grafico found', 'grafico' ),
        'not_found_in_trash' => __( 'No Grafico found in Trash','grafico' ),
        'parent_item_colon' => __( 'Parent Grafico:', 'grafico'),
        'menu_name' => __( 'CNSG Grafici', 'grafico' ),
    );


    $args = array(  
        'labels' => $labels,
        'hierarchical' => true,
        'description' => __( 'Grafici CNSG', 'progetto' ),
        'supports' => array( 'title', 'editor', 'excerpt','thumbnail' ),
        'public' => true,
        'menu_icon' => 'dashicons-chart-pie',
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 9,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'rewrite' => true
       );  
   
    register_post_type('grafico' , $args );  
}  
 
add_action('init', 'killer_charts_format_register');





?>