<!doctype html>
<html class="no-js" lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNSG</title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/libraries.min.css">    
<!--     <link rel="stylesheet" href="<?php //bloginfo('template_directory'); ?>/css/app.min.css"> -->
    
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app_override.css">
     
   <!--  
    <script src=<?php //bloginfo('template_directory'); ?>/scripts/vendor/modernizr.fbe20327.js></script>
   -->

    <?php wp_head(); ?>

  </head>
  <body>
    
    <?php if (is_home()) : ?>
        <div id="loader">
            <img id="ajax-loader" src="<?php bloginfo('template_directory'); ?>/images/ajax-loader01.gif" alt="">
        </div>
     <?php endif; ?>



<header class="show-for-medium-up">  <!-- header -->

<!-- Site mega map -->
    <div id="fullscreen-mega-map" class="fullscreen-mega-map-inactive">
        <div class="row">

        <?php     
            get_template_part( 'fullscreen-mega-map', get_post_format() );     
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
            // 'items_wrap' => '%3$s',
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





        <!-- area logo-area -->
        <div id="logo-area">
                <div class="row show-for-medium-up">
                    <a href="<?php bloginfo('url'); ?>">
                    
                    <div id="menutop-logo" class="iss-logo <?php (is_home())  ? print 'animated' :'' ?>"></div>
                    <div class="columns small-12 logo logo_large <?php (is_home())  ? print 'animated' :'' ?>"  id="logo-animato">
                        <p class="logo_en">Italian Center For <b>Global Health</b></p>
                        <p class="logo_ita">Centro Nazionale <b>per la Salute Globale</b></p>                
                        <p class="logo_payoff">Research and Action to Fight Health Inequalities Worldwide</p>
                    </div>

                    </a>
                </div>
        </div>
        <!-- end logo-area -->
            

        <div class="row show-for-medium-up">
            <div id="logo-spacer" class="<?php (is_home())  ? print 'animated' :'' ?>">&nbsp;</div>
        </div>





      



</header> <!-- end header -->


