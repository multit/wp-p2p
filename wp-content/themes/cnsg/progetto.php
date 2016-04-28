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


$terms = get_the_terms( $post, "categorie_progetto" );
$rl_res = $terms[0]->taxonomy . '_' .  $terms[0]->term_id;
$rl_category_color = get_field('colore_della_categoria',$rl_res );



?>






<article>


<!-- 
 ________  ________  ___       ________  ________   ________   ________          ________  _______   ________   _________  ________  ________  ___       _______      
|\   ____\|\   __  \|\  \     |\   __  \|\   ___  \|\   ___  \|\   __  \        |\   ____\|\  ___ \ |\   ___  \|\___   ___|\   __  \|\   __  \|\  \     |\  ___ \     
\ \  \___|\ \  \|\  \ \  \    \ \  \|\  \ \  \\ \  \ \  \\ \  \ \  \|\  \       \ \  \___|\ \   __/|\ \  \\ \  \|___ \  \_\ \  \|\  \ \  \|\  \ \  \    \ \   __/|    
 \ \  \    \ \  \\\  \ \  \    \ \  \\\  \ \  \\ \  \ \  \\ \  \ \   __  \       \ \  \    \ \  \_|/_\ \  \\ \  \   \ \  \ \ \   _  _\ \   __  \ \  \    \ \  \_|/__  
  \ \  \____\ \  \\\  \ \  \____\ \  \\\  \ \  \\ \  \ \  \\ \  \ \  \ \  \       \ \  \____\ \  \_|\ \ \  \\ \  \   \ \  \ \ \  \\  \\ \  \ \  \ \  \____\ \  \_|\ \ 
   \ \_______\ \_______\ \_______\ \_______\ \__\\ \__\ \__\\ \__\ \__\ \__\       \ \_______\ \_______\ \__\\ \__\   \ \__\ \ \__\\ _\\ \__\ \__\ \_______\ \_______\
    \|_______|\|_______|\|_______|\|_______|\|__| \|__|\|__| \|__|\|__|\|__|        \|_______|\|_______|\|__| \|__|    \|__|  \|__|\|__|\|__|\|__|\|_______|\|_______|
                                                                                                                                                                      
                                                                                                                                                                      
                                                                                                                                                                      
 -->


<?php 

  $categories = get_the_terms( $post, "categorie_progetto" );
 ?>
<div class="row">
  <div class="articolo columns medium-10 medium-push-1 large-6 large-push-2">
    

    <div>
            <h3 style="color:<?php echo $rl_category_color; ?>"><?php echo $categories[0]->name; ?></h3>
            <h1><?php the_title(); ?></h1>
    </div>

        <div>
            <h3 class="excerpt"><?php echo get_the_excerpt(); ?></h3>
            
      </div>

             <?php the_content( ); ?>
             <h3><?php //print_r($post); ?></h3>

  </div>





  <!-- 
 ________  ________  ___       ________  ________   ________   ________          ________  ___  ________   ___  ________  _________  ________  ________     
|\   ____\|\   __  \|\  \     |\   __  \|\   ___  \|\   ___  \|\   __  \        |\   ____\|\  \|\   ___  \|\  \|\   ____\|\___   ___|\   __  \|\   __  \    
\ \  \___|\ \  \|\  \ \  \    \ \  \|\  \ \  \\ \  \ \  \\ \  \ \  \|\  \       \ \  \___|\ \  \ \  \\ \  \ \  \ \  \___|\|___ \  \_\ \  \|\  \ \  \|\  \   
 \ \  \    \ \  \\\  \ \  \    \ \  \\\  \ \  \\ \  \ \  \\ \  \ \   __  \       \ \_____  \ \  \ \  \\ \  \ \  \ \_____  \   \ \  \ \ \   _  _\ \   __  \  
  \ \  \____\ \  \\\  \ \  \____\ \  \\\  \ \  \\ \  \ \  \\ \  \ \  \ \  \       \|____|\  \ \  \ \  \\ \  \ \  \|____|\  \   \ \  \ \ \  \\  \\ \  \ \  \ 
   \ \_______\ \_______\ \_______\ \_______\ \__\\ \__\ \__\\ \__\ \__\ \__\        ____\_\  \ \__\ \__\\ \__\ \__\____\_\  \   \ \__\ \ \__\\ _\\ \__\ \__\
    \|_______|\|_______|\|_______|\|_______|\|__| \|__|\|__| \|__|\|__|\|__|       |\_________\|__|\|__| \|__|\|__|\_________\   \|__|  \|__|\|__|\|__|\|__|
                                                                                   \|_________|                   \|_________|                              
                                                                                                                                                            
                                                                                                                                                            
-->




    <div class="columns medium-5 medium-push-1 large-2 large-pull-6">


        <div class="first-row-padded show-for-large-up ">
            <?php 
            set_query_var( 'rl_category_color', $rl_category_color );
            get_template_part( 'share-template', get_post_format() );  ?>
        </div>




        <h2 style="color:<?php echo $rl_category_color; ?>">Coordinators & Staff</h2>
        
        <ul class="staff-list">
        
        <?php foreach ( $staff as $person ) : ?>
        
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
                
                <a href="<?php echo get_permalink($person->ID); ?>"><h4 style="color:<?php echo $rl_category_color; ?>">
                    <?php echo $person->post_title ?></h4></a>
                
                <h5><?php echo get_field('ruolo',$person->ID); ?><br>
                <a href="mailto:<?php echo get_field('email',$person->ID); ?>"><b><?php echo get_field('email',$person->ID); ?></b></a>

                </h5>
            </li>
        <?php endforeach; ?>
        </ul>




</div>



<!-- 
 ________  ________  ___                   ________  _______   ________  _________  ________  ________     
|\   ____\|\   __  \|\  \                 |\   ___ \|\  ___ \ |\   ____\|\___   ___|\   __  \|\   __  \    
\ \  \___|\ \  \|\  \ \  \                \ \  \_|\ \ \   __/|\ \  \___|\|___ \  \_\ \  \|\  \ \  \|\  \   
 \ \  \    \ \  \\\  \ \  \                \ \  \ \\ \ \  \_|/_\ \_____  \   \ \  \ \ \   _  _\ \   __  \  
  \ \  \____\ \  \\\  \ \  \____  ___       \ \  \_\\ \ \  \_|\ \|____|\  \   \ \  \ \ \  \\  \\ \  \ \  \ 
   \ \_______\ \_______\ \_______|\__\       \ \_______\ \_______\____\_\  \   \ \__\ \ \__\\ _\\ \__\ \__\
    \|_______|\|_______|\|_______\|__|        \|_______|\|_______|\_________\   \|__|  \|__|\|__|\|__|\|__|
                                                                 \|_________|                              
                                                                                                           
                                                                                                            -->




  <div class="columns medium-5  medium-pull-1 large-3 large-push-0">

        <div class="first-row-padded show-for-large-up">
             <?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
        </div>

        <div class="right-column">
       
        

        <?php if (!empty($documenti)): ?>            
        
        <h2 style="color:<?php echo $rl_category_color; ?>">Documents</h2>
        <ul>
            <?php foreach ( $documenti as $doc ) : 
                $file = get_field('file',$doc->ID); 
                $abstract =  get_field('abstract',$doc->ID); 
                ?>
                <li>
                    <a class="pdf-download" href="<?php echo $file['url']; ?>"><?php echo $doc->post_title; ?></a>
                    <div class="pdf-abstract"><?php echo $abstract; ?></div>
                </li>
            <?php endforeach; ?>                
        </ul>
       <?php endif; ?>


        <?php if (!empty($pubblicazioni)): ?>            
       
        <h2 style="color:<?php echo $rl_category_color; ?>">Pubblicazioni</h2>
        <ul>
            <?php foreach ($pubblicazioni as $pubb ) : 
                $file = get_field('file',$pubb->ID); 
                $abstract =  get_field('abstract',$pubb->ID);
                ?>
                <li><a class="pdf-download" href="<?php echo $file['url']; ?>"><?php echo $pubb->post_title; ?></a>
                <div class="pdf-abstract"><?php echo $abstract; ?></div>
                </li>
            <?php endforeach; ?>                
        </ul>
       <?php endif; ?>       









        </div>
   </div>     

</article>