<?php 


$staff = get_posts( array(
  'connected_type' => 'staff_to_progetto',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
  'suppress_filters' => false
) );


$documenti = get_posts( array(
  'connected_type' => 'documento_to_progetto',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
  'suppress_filters' => false
) );


$pubblicazioni = get_posts( array(
  'connected_type' => 'pubblicazione_to_progetto',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
  'suppress_filters' => false
) );

$coordinators = get_posts( array(
  'connected_type' => 'coordinator_to_progetto',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
  'suppress_filters' => false
) ); 

$staff_members = get_posts( array(
  'connected_type' => 'staff_to_progetto',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
  'suppress_filters' => false
) );

// Date progetto
$data_inizio_proj = get_field('data_inizio_progetto', false, false);
$data_fine_proj = get_field('data_fine_progetto', false, false);
$data_inizio_proj = new DateTime($data_inizio_proj);
$data_fine_proj = new DateTime($data_fine_proj);

// Aree geografiche
$aree_p  = get_field('aree_geografiche');
$aree_proj = explode(",", $aree_p);

//Colore e icone di categoria vedi functions.php
$categoria = get_dettagli_categoria( $post->ID );
$rl_category_color = $categoria['colore'];  
$categorie_progetto = $categoria['categorie'];
$icona_cat_progetto = $categoria['icona_categoria'];

// Keywords
$keywords = get_terms( 'keywords', 'orderby=count&hide_empty=0' );


?>




<article>


<div class="row">
  <div class="columns large-2 large-push-0 medium-12"><?php 
            set_query_var( 'rl_category_color', $rl_category_color );
            get_template_part( 'views/share-template', get_post_format() );  
            ?>
  </div>
  <div class="columns large-7 large-push-0 medium-12"><h1><?php the_title(); ?></h1></div>

  <div class="columns large-3 large-push-0 medium-12">
      
  </div>
</div>


<div class="row">

<!--
  ######   #######  ##        #######  ##    ## ##    ##    ###        ######  ######## ##    ## ######## ########     ###    ##       ######## 
##    ## ##     ## ##       ##     ## ###   ## ###   ##   ## ##      ##    ## ##       ###   ##    ##    ##     ##   ## ##   ##       ##       
##       ##     ## ##       ##     ## ####  ## ####  ##  ##   ##     ##       ##       ####  ##    ##    ##     ##  ##   ##  ##       ##       
##       ##     ## ##       ##     ## ## ## ## ## ## ## ##     ##    ##       ######   ## ## ##    ##    ########  ##     ## ##       ######   
##       ##     ## ##       ##     ## ##  #### ##  #### #########    ##       ##       ##  ####    ##    ##   ##   ######### ##       ##       
##    ## ##     ## ##       ##     ## ##   ### ##   ### ##     ##    ##    ## ##       ##   ###    ##    ##    ##  ##     ## ##       ##       
 ######   #######  ########  #######  ##    ## ##    ## ##     ##     ######  ######## ##    ##    ##    ##     ## ##     ## ######## ######## */
-->



<div class="columns large-8 large-push-2 medium-12 main-proj-column">
  <h3 class="proj_main_goal"><?php echo get_field('main_goal',$post->ID); ?></h3>
  


<h2>Project Geographical Areas</h2>
 <div id="mappina" class="mappina_progetto columns  "></div>

  <!--  mapp.js -->
  <?php 
      $state_codes = "ciao bello";
      // echo killer_datamap("mappina", $aree_proj, $rl_category_color ); 
      zooming_datamap($aree_proj);
  ?>



  <?php the_content( ); ?>

</div>


<!-- 
 ######   #######  ##        #######  ##    ## ##    ##    ###        ######  #### ##    ## ####  ######  ######## ########     ###    
##    ## ##     ## ##       ##     ## ###   ## ###   ##   ## ##      ##    ##  ##  ###   ##  ##  ##    ##    ##    ##     ##   ## ##   
##       ##     ## ##       ##     ## ####  ## ####  ##  ##   ##     ##        ##  ####  ##  ##  ##          ##    ##     ##  ##   ##  
##       ##     ## ##       ##     ## ## ## ## ## ## ## ##     ##     ######   ##  ## ## ##  ##   ######     ##    ########  ##     ## 
##       ##     ## ##       ##     ## ##  #### ##  #### #########          ##  ##  ##  ####  ##        ##    ##    ##   ##   ######### 
##    ## ##     ## ##       ##     ## ##   ### ##   ### ##     ##    ##    ##  ##  ##   ###  ##  ##    ##    ##    ##    ##  ##     ## 
 ######   #######  ########  #######  ##    ## ##    ## ##     ##     ######  #### ##    ## ####  ######     ##    ##     ## ##     ## -->




    <div class="columns large-2 large-pull-8 medium-4">


  
  
 <div style="display:block;">
          
           <h2>Coordinators</h2>        
           <ul class="staff-list">
           
           <?php foreach ( $coordinators as $person ) : ?>
           
               <li>
                <div class="columns small-centered">

                   <?php 
                     $thumb = get_the_post_thumbnail( $person->ID, 'thumbnail',  array( 'class' => 'staff-mini-image' ) ); 
                     if ( $thumb == "" ) {
                       echo '<img src="https://pbs.twimg.com/profile_images/682452187545337856/Znwroimx.jpg" alt="" class="staff-mini-image" />';
                       //echo '<i style="font-size:2em;" class="fa fa-user" aria-hidden="true"></i>';
                     } else {
                       echo $thumb;
                     }
                   ?>                
                   <a href="<?php echo get_permalink($person->ID); ?>">
                     <h5>
                       <?php echo $person->post_title ?></h5>
                     </a>                
                   <h5><?php echo get_field('ruolo',$person->ID); ?><br>
                   <a href="mailto:<?php echo get_field('email',$person->ID); ?>"><b><?php echo get_field('email',$person->ID); ?></b></a>
                   </h5>
                   </div>
               </li>
           <?php endforeach; ?>
   
           </ul>
   
           
           <h2>Staff</h2>
           <ul class="staff-list">
           
           <?php foreach ( $staff_members as $person ) : ?>
           
               <li>    
                   <a href="<?php echo get_permalink($person->ID); ?>">
                     <h5>
                       <?php echo $person->post_title ?></h5></a>              
               </li>
           <?php endforeach; ?>
   
           </ul>
 </div>


</div>

<!-- 
 ######   #######  ##        #######  ##    ## ##    ##    ###       ########  ########  ######  ######## ########     ###    
##    ## ##     ## ##       ##     ## ###   ## ###   ##   ## ##      ##     ## ##       ##    ##    ##    ##     ##   ## ##   
##       ##     ## ##       ##     ## ####  ## ####  ##  ##   ##     ##     ## ##       ##          ##    ##     ##  ##   ##  
##       ##     ## ##       ##     ## ## ## ## ## ## ## ##     ##    ##     ## ######    ######     ##    ########  ##     ## 
##       ##     ## ##       ##     ## ##  #### ##  #### #########    ##     ## ##             ##    ##    ##   ##   ######### 
##    ## ##     ## ##       ##     ## ##   ### ##   ### ##     ##    ##     ## ##       ##    ##    ##    ##    ##  ##     ## 
 ######   #######  ########  #######  ##    ## ##    ## ##     ##    ########  ########  ######     ##    ##     ## ##     ## 
-->


  <div class="columns large-2 medium-8">
        <h2 >Info</h2>
        <h5><b>Project Main Area:</b><br /><?php echo get_field('aree_del_progetto'); ?></h5>
      <h5><b>Timeline: </b><br />
      <?php echo $data_inizio_proj->format('M Y'); ?> - <?php echo $data_fine_proj->format('M Y'); ?>
      </h5>      
      
      <h5><b>Categories:<br /></b>
      <?php 
      foreach ($categorie_progetto as $cat) { 
      $term_link = get_term_link( $cat->term_id,'projects');
        ?>
          <h5><a href="<?php echo $term_link ?>"><?php echo $cat->name; ?></a></5>
      <?php }
       ?>

      </h5>

      <h5><b>Keywords:</b><br />
        <?php  

        if ( ! empty( $keywords ) && ! is_wp_error( $keywords ) ) {
            $count = count( $keywords );
            $i = 0;
            $keywords_list = '<span>';
            foreach ( $keywords as $keyword ) {
                $i++;
                $keywords_list .= '<a href="' . esc_url( get_term_link( $keyword ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $keyword->name ) ) . '">' . $keyword->name . '</a>';
                if ( $count != $i ) {
                    $keywords_list .= ' &middot; ';
                }
                else {
                    $keywords_list .= '</span>';
                }
            }
            echo $keywords_list;
        }

        ?>
      </h5>

<h5><a href="#pubblicazioni" class="fast-scroller" section="#pubblicazioni" ><i class="fa fa-files-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>Publications</b></a></h5>
<h5><a href="#documenti" class="fast-scroller" section="#documenti"><i class="fa fa-files-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>Docs</b></a></h5>


  
</div>     

 <!-- row End    -->
</div>


<div class="row" id="staff" style="display:none;">
  <div class="columns large-10 large-offset-2 end">  
   <h2 class="section-head">Coordinators</h2>        
        <ul class="staff-list">
        
        <?php foreach ( $coordinators as $person ) : ?>
        
         <?php 
                  // echo get_the_post_thumbnail( $person->ID, 'thumbnail',  array( 'class' => 'staff-mini-image' ) ); 
                  $thumb = get_the_post_thumbnail( $person->ID, 'thumbnail',  array( 'class' => 'staff-mini-image' ) ); 
                  if ( $thumb == "" ) {
                    echo '<img src="https://pbs.twimg.com/profile_images/682452187545337856/Znwroimx.jpg" alt="" class="staff-mini-image" />';
                    //echo '<i style="font-size:2em;" class="fa fa-user" aria-hidden="true"></i>';
                  } else {
                    echo $thumb;
                  }
                ?>                
                <a href="<?php echo get_permalink($person->ID); ?>">
                  <h5 style="color:<?php echo $rl_category_color; ?>">
                    <?php echo $person->post_title ?></h5>
                  </a>                
                <h5><?php echo get_field('ruolo',$person->ID); ?><br>
                <a href="mailto:<?php echo get_field('email',$person->ID); ?>"><b><?php echo get_field('email',$person->ID); ?></b></a>
                </h5>
            
        <?php endforeach; ?>

        </ul>
</div></div>


<div class="row" id="staff" style="display:none;">
  <div class="columns large-10 large-offset-2 end">  

        <h2 class="section-head">Project Staff</h2>
        <ul class="staff-list">
        
        <?php foreach ( $staff_members as $person ) : ?>
        
            <li>    
                <a href="<?php echo get_permalink($person->ID); ?>">
                  <h5 style="color:<?php echo $rl_category_color; ?>">
                    <?php echo $person->post_title ?></h5></a>              
            </li>
        <?php endforeach; ?>

        </ul>

</div></div>


<div class="row" id="pubblicazioni">
    <div class="columns large-10 large-offset-2 end">        
            <!-- Colonna Pubblicazioni -->
          <?php if (!empty($pubblicazioni)): ?>                     
            <h2 class="section-head">Publications</h2>
            <?php  
              set_query_var( 'docs', $pubblicazioni );
              get_template_part( 'views/doc-template', get_post_format() ); 
            ?>               
          <?php endif; ?>   
</div></div>


<div id="documenti" class="row">
  <div class="columns large-10 large-push-2 end">
          <!-- Colonna Documenti -->
          <?php if (!empty($documenti)): ?>                     
            <h2 class="section-head">Documents</h2>
            <?php  
              set_query_var( 'docs', $documenti );
              get_template_part( 'views/doc-template', get_post_format() ); 
            ?>               
          <?php endif; ?>  
</div></div>



</article>
