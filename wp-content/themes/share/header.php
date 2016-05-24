<!doctype html>
<html class="no-js" lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share! Foundation</title>
    
     

    <?php wp_head(); ?>

  </head>
  <body>
    
    



<header class="show-for-medium-up">  <!-- header -->

<!-- Site mega map -->
    <div id="fullscreen-mega-map" class="fullscreen-mega-map-inactive">
        <div class="row">

        <?php     
            get_template_part( 'views/fullscreen-mega-map', get_post_format() );     
        ?>

    </div></div>
<!-- End Site mega map -->
    
    
    
    <!-- Site popup map -->
    <div id="projects_map" class="show-for-medium-up">
    <div class="row ">
        <div class="columns small-12 sitemap">
         <b>Project Areas</b>   


        <!-- // Menu con wp_nav_menu() & Menu_Principale_Walker extends Walker  -->

        <?php 
        $args = array (
            'menu' => 'Menu Categorie',
            'depth' => 3,
            'container' => false,
            'link_before' => '<h3>',
            'link_after' => '</h3>',
            'menu_class' => 'medium-block-grid-3 large-block-grid-6',
            'walker' => new Menu_Principale_Walker()
        );
        wp_nav_menu($args);

        ?>

        
       </div> </div></div>
     <!-- End Site popoup map -->

        <div class="menutop"><!-- menutop -->
            <div class="row hp-menu-top-butta">   
                <?php get_template_part( 'inc/hp-menu-top' ); ?>                
            </div>
        </div> <!-- End menutop -->

    <?php  
            // Menu Revolving
            set_query_var( 'post', $post );
            get_template_part( 'views/revolving-menu', get_post_format() ); 
     ?>      








</header> <!-- end header -->