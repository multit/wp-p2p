<?php get_header(); ?>


<?php setup_postdata($post); 





?>


  <article>
    <div class="row">
  
        
        <div class="columns medium-2">
          <div class="first-row-padded">
            <?php get_template_part( 'share-template', get_post_format() );  ?>            
            </div>
            <?php the_post_thumbnail( 'medium', array( 'class' => 'staff-big-image' ) ); ?>
        </div>
        
        <!-- begin colonna articolo -->
        <div class="columns medium-6">
          <div class="first-row-padded">
          <h3 style="color:#AC9865">ICGH Staff members</h3>
          <h1 ><?php the_title(); ?></h1>
          </div>       
          <?php the_content( ); ?>      

        </div>

        <div class="columns medium-3 show-for-medium-up">

        <div class="first-row-padded"></div>       
        <div class="right-column">
            <h2 style="color:#AC9865" class="">Projects</h2><br >
              

              <?php 
              $progetti = wp_get_object_terms( $post->ID, 'progetto' );
              foreach ( $progetti as $progetto ) : ?>        
                      <a href="<?php echo esc_url( get_term_link( $progetto->term_id, 'progetto' )) ?>">
                        <h4 style="color:<?php echo $rl_category_color; ?>">
                          <?php echo $progetto->name ?></h4>
                        </a>
              <?php endforeach; ?>


            
            </p>            
        </div>
        </div>
        
       </article>
       <!-- end colonna articolo -->

        
                
    </div>
   
  </article>


<?php get_footer(); ?>