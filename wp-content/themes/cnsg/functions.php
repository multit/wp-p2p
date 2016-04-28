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



add_theme_support( 'post-thumbnails' );

// Aggiunto per far funzionare il pplugin Simple Page Ordering
add_post_type_support( 'post', 'page-attributes' );

// Include i walkers per i menu 
require get_template_directory() . '/inc/custom-walkers.php';
require get_template_directory() . '/inc/custom-menu-walkers.php';

// Utilities
// Param $articolo = object|int $post
// Utilizza il plugin Custom Fields
// Ritorna un oggetto con colore e nome della categoria

function get_dettagli_categoria( $articolo ) {

	$terms = get_the_terms( $articolo, "categorie_progetto" );
	$rl_res = $terms[0]->taxonomy . '_' .  $terms[0]->term_id;
	$rl_category_color = get_field('colore_della_categoria',$rl_res );

	$cat = array('colore' => $rl_category_color, 'nome_categoria' => $terms[0]->name );
	return $cat;

}



?>