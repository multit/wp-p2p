	<?php 
/*
    ___       ___       ___       ___       ___       ___            ___       ___       ___       ___       ___       ___       ___       ___   
   /\  \     /\__\     /\  \     /\  \     /\  \     /\  \          /\  \     /\  \     /\  \     /\  \     /\  \     /\__\     /\__\     /\  \  
  /::\  \   /:| _|_   /::\  \   /::\  \   /::\  \   /::\  \        /::\  \   _\:\  \   /::\  \   /::\  \   /::\  \   /:/  /    /:/  /    _\:\  \ 
 /::\:\__\ /::|/\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /::\:\__\      /::\:\__\ /\/::\__\ /:/\:\__\ /::\:\__\ /::\:\__\ /:/__/    /:/__/    /\/::\__\
 \/\::/  / \/|::/  / \:\/:/  / \;:::/  / \:\:\/  / \/\::/  /      \/\:\/__/ \::/\/__/ \:\/:/  / \;:::/  / \:\:\/  / \:\  \    \:\  \    \::/\/__/
   /:/  /    |:/  /   \::/  /   |:\/__/   \:\/  /    /:/  /          \/__/   \:\__\    \::/  /   |:\/__/   \:\/  /   \:\__\    \:\__\    \:\__\  
   \/__/     \/__/     \/__/     \|__|     \/__/     \/__/                    \/__/     \/__/     \|__|     \/__/     \/__/     \/__/     \/__/  

Plugin Name: CNSG Core Plugin
Plugin URI: -
Description: Core Plugin del website Centro Nazionale di Salute Globale
Version: 1.0
Author: Andrea Fiorelli
Author URI: http://www.andreafiorelli.com
License: GPLv2 or later
*/

// Registrazione di quattro custom types
// 1. progetto
// 2. documento
// 3. staff
// 4. pubblicazione


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
		'hierarchical' => true,
		'description' => __( 'Progetti CNSG', 'progetto' ),
		'supports' => array( 'title', 'editor', 'excerpt','thumbnail' ),
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



/* taxonomy personale */

// elimina l'elenco delle categorie dai post normali
add_filter("manage_posts_columns", "my_post_edit_columns" );

function my_post_edit_columns($columns){
    unset($columns['categories']);
    return $columns;
}



// Crea le categorie dei progetti Sospeso!!

add_action('init', 'registra_categorie_default');

function registra_categorie_default() {


	$labels = array(
		'name'                  => 'Categorie Progetto',
		'add_new_item'			=> 'Nuovo Categoria Progetto',
		'edit_item' 			=> 'Modifica Categria Progetto'
	);

	$args = array(
		'hierarchical'          => true,
		'show_tagcloud'			=> false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_in_menu'			=> true,
		'show_admin_column'     => false
	);


	register_taxonomy( 'categorie_progetto', array('post','progetto'), $args );
	//register_taxonomy( 'progetto', array('post','progetto','pubblicazione','documento','staff'), $args );
	// register_taxonomy_for_object_type('progetto', 'post');
	// register_taxonomy_for_object_type('progetto', 'staff');
	// register_taxonomy_for_object_type('progetto', 'documento');
	// register_taxonomy_for_object_type('progetto', 'pubblicazione');



}


// Aggiunta tinyMCE alla descrizione delle categorie
//  per l'uso di TinyMCE vedi: http://www.yourinspirationweb.com/2014/06/04/wordpress-la-funzione-wp_editor-e-luso-avanzato-di-tinymce-editor-per-le-categorie-e-i-riassunti/

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

add_action( 'progetto_edit_form_fields', 'cat_description');
//add_filter('edit_category_form_fields', 'cat_description');
function cat_description($tag)
{
    ?>
        <table class="form-table">
            <tr class="form-field">
                <th scope="row" valign="top"><label for="description"><?php _ex('Description', 'Taxonomy Description'); ?></label></th>
                <td>
                <?php
                    $settings = array('wpautop' => true, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '20', 'textarea_name' => 'description' );
                    //wp_editor(wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8'), 'cat_description', $settings);
                    wp_editor(html_entity_decode(wp_kses_post($tag->description , ENT_QUOTES, 'UTF-8')), 'description_editor', $settings);

                ?>
                <br />
                <span class="description"><?php _e('Descrizione approfondita del progetto'); ?></span>	
				<script type="text/javascript">
			        jQuery(function($) {
			            $('textarea#description').closest('tr.form-field').remove();
			        });
		        </script>

                </td>
            </tr>
        </table>
    <?php
}

//add_action('admin_head', 'remove_default_category_description');
function remove_default_category_description()
{
    global $current_screen;
    if ( $current_screen->id == 'edit-category' )
    {
    ?>
        <script type="text/javascript">
        jQuery(function($) {
            $('textarea#description').closest('tr.form-field').remove();
        });
        </script>
    <?php
    }
}


// Rimuove la coonna delle descrizioni che altrimenti sarebbe troppo lunga
// la fuzione usata è manage_{$screen->id}_columns  https://developer.wordpress.org/reference/hooks/manage_screen-id_columns/
// https://wordpress.org/support/topic/remove-description-field-in-admin-edit-category-page
// vedi anche http://glennmessersmith.com/pages/custom_columns.html

function rimuoveColonnaDescrizione($columns)
{	
	unset($columns['description']);
	unset($columns['posts']);
	return $columns;
}
add_filter('manage_edit-progetto_columns','rimuoveColonnaDescrizione');



// Filtro per le tassonometrie personalizzate
// https://progettosplugins.com/post-list-filters-for-custom-taxonomies-in-manage-posts/
// vedi anche http://justintadlock.com/archives/2011/06/27/custom-columns-for-custom-post-types

function progetto_add_taxonomy_filters() {
//   global $typenow;
 
//   // an array of all the taxonomyies you want to display. Use the taxonomy name or slug
//   $taxonomies = array('ambito');
//   // must set this to the post type you want the filter(s) displayed on
//   if( $typenow == 'progetti' ){
 
//     foreach ($taxonomies as $tax_slug) {
//       $tax_obj = get_taxonomy($tax_slug);
//       $tax_name = $tax_obj->labels->name;
//       $terms = get_terms($tax_slug);
//       if(count($terms) > 0) {
//         echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
//         echo "<option value=''>Show All $tax_name</option>";
//         foreach ($terms as $term) { 
//           echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
//         }
//         echo "</select>";
//       }
//     }
//   }
}
add_action( 'restrict_manage_posts', 'progetto_add_taxonomy_filters' );


// Proviamo P2P
// https://github.com/scribu/wp-posts-to-posts/wiki

add_action( 'p2p_init', 'join_projects_to_services' );

function join_projects_to_services(){
	p2p_register_connection_type( array(
		'name' => 'staff_to_progetto',
		'title' => array(
			'from' => 'Progetti in cui è convolto',
    		'to' => 'Staff'
			),		
		'from' => 'staff',
		'to' => 'progetto',
		'to_labels' => array(
		      'singular_name' => __( 'Progetti', 'my-textdomain' ),
		      'search_items' => __( 'Cerca progetto', 'my-textdomain' ),
		      'not_found' => __( 'No items found.', 'my-textdomain' ),
		      'create' => __( 'Create Connections', 'my-textdomain' ),
		  ),
		'from_labels' => array(
		      'singular_name' => __( 'Staff sul progetto', 'my-textdomain' ),
		      'search_items' => __( 'Search persone', 'my-textdomain' ),
		      'not_found' => __( 'No items found.', 'my-textdomain' ),
		      'create' => __( 'Create Connections', 'my-textdomain' ),
		      'new_item' => __( 'Crea nuovo', 'my-textdomain' ),
		      'add_new_item' => __( 'Aggiungi nuovo', 'my-textdomain' )
		  )		

		) );
	p2p_register_connection_type( array(
		'name' => 'documento_to_progetto',
		'title' => array(
			'from' => 'Documenti Correlati',
    		'to' => 'Documenti'
			),				
		'from' => 'documento',
		'to' => 'progetto',
		'from_labels' => array(
		      'singular_name' => __( 'Documenti Correlati', 'my-textdomain' ),
		      'search_items' => __( 'Search Documenti', 'my-textdomain' ),
		      'not_found' => __( 'No items found.', 'my-textdomain' ),
		      'create' => __( 'Create Connections', 'my-textdomain' ),
		      'new_item' => __( 'Crea nuovo', 'my-textdomain' ),
		      'add_new_item' => __( 'Aggiungi nuovo', 'my-textdomain' )
		  )			
		) );	
	p2p_register_connection_type( array(
		'name' => 'pubblicazione_to_progetto',
		'title' => array(
			'from' => 'Progetti Correlati',
    		'to' => 'Pubblicazioni'
			),				
		'from' => 'pubblicazione',
		'to' => 'progetto',
		'admin_column' => 'from',
		'from_labels' => array(
		      'singular_name' => __( 'Pubblicazioni Correlate', 'my-textdomain' ),
		      'search_items' => __( 'Search Pubblicazioni', 'my-textdomain' ),
		      'not_found' => __( 'No items found.', 'my-textdomain' ),
		      'create' => __( 'Create Connections', 'my-textdomain' ),
		      'new_item' => __( 'Crea nuovo', 'my-textdomain' ),
		      'add_new_item' => __( 'Aggiungi nuovo', 'my-textdomain' )
		  )			
		) );	

};







?>