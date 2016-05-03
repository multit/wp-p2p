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



      <h5><b>Project Main Area:</b><br /><?php echo get_field('aree_del_progetto'); ?></h5>
      <h5><b>Timeline: </b><br />
      <?php echo $data_inizio_proj->format('M Y'); ?> - <?php echo $data_fine_proj->format('M Y'); ?>
      </h5>      
      <h5><b>Geographic Regions: </b><br /><?php echo $aree_p//echo get_field('regioni_geografiche'); ?></h5>
      <h5><b>Keywords: </b></h5>

      <?php //echo $categories[0]->name; ?>
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



<div class="columns large-7 large-push-2 medium-12 main-proj-column">
  <h3 class="proj_main_goal"><?php echo get_field('main_goal',$post->ID); ?></h3>
  

 <div id="mappina" class="mappina_progetto"></div> 
  <?php echo killer_datamap("mappina", $aree_proj, $rl_category_color ); ?>
  <div class="mappina_titolo"><h5><b>Project Intervention Areas</b></h5></div>   
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




    <div class="columns large-2 large-pull-7 medium-4">



        
        <h2>Coordinators</h2>        
        <ul class="staff-list">
        
        <?php foreach ( $coordinators as $person ) : ?>
        
            <li>
                <?php 
                  // echo get_the_post_thumbnail( $person->ID, 'thumbnail',  array( 'class' => 'staff-mini-image' ) ); 
                  $thumb = get_the_post_thumbnail( $person->ID, 'thumbnail',  array( 'class' => 'staff-mini-image' ) ); 
                  if ( $thumb == "" ) {
                    echo '<img src="https://pbs.twimg.com/profile_images/682452187545337856/Znwroimx.jpg" alt="" class="staff-mini-image" />';
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
            </li>
        <?php endforeach; ?>

        </ul>

        
        <h2>Project Staff</h2>
        <ul class="staff-list">
        
        <?php foreach ( $staff_members as $person ) : ?>
        
            <li>    
                <a href="<?php echo get_permalink($person->ID); ?>">
                  <h5 style="color:<?php echo $rl_category_color; ?>">
                    <?php echo $person->post_title ?></h5></a>              
            </li>
        <?php endforeach; ?>

        </ul>

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


  <div class="columns large-3 medium-8">


    <?php ?>

  
          <!-- Colonna Pubblicazioni -->
          <?php if (!empty($pubblicazioni)): ?>                     
            <h2 >Publications</h2>
            <?php  
              set_query_var( 'docs', $pubblicazioni );
              get_template_part( 'views/doc-template', get_post_format() ); 
            ?>               
          <?php endif; ?>
          
          <!-- Colonna Documenti -->
          <?php if (!empty($documenti)): ?>                     
            <h2 >Documents</h2>
            <?php  
              set_query_var( 'docs', $documenti );
              get_template_part( 'views/doc-template', get_post_format() ); 
            ?>               
          <?php endif; ?>       
             



    </div>     

 <!-- row End    -->
</div>

</article>
