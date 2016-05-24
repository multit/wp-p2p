<!-- ########## Loader gif ########## -->

<div id="loader" style="display:none">
    <img id="ajax-loader" src="<?php bloginfo('template_directory'); ?>/images/ajax-loader01.gif" alt="">
</div>



<!-- area logo-area -->
<div id="logo-area">



<section id="hp-logo">
  <div class="row share-logo expanded <?php ( is_home() )  ? print 'animated' : print 'not-home' ?>">          
      <h1 class="random_colored share-animated-entry <?php (is_home())  ? print 'logo-animato' :'' ?>">
        SHARE!
      </h1>
      <h3 style="font-size:0.9em">GLOBAL HEALTH FOUNDATION</h3>   
 </div> 
</section>



</div>
<!-- end logo-area -->
        

<div class="row show-for-medium-up">
    <div id="logo-spacer" class="test   <?php (is_home())  ? print 'animated' : print 'not home' ?>">&nbsp;</div>
</div>






<section id="hp-slider">
  <?php 
            $bigslides = get_post(251);
            $output = do_shortcode($bigslides->post_content);
            // echo $output;
  ?>
</section>





 

<section id="new-hp-slides">
  
<div class="row">

  <div class="column small-12 hp-slide" id="slide01">
  <div class="hp-slide-gradient"></div>
  <div class="hp-transp-slide-title">
    <h2>Share Focus On</h2>
    <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elitut labore</h1>
    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderitsunt in culpa qui officia deserunt mollit anim id est laborum
  </div>
  </div>

</div>


<div class="row hp-slide-box">
  <div class="columns small-12 large-6" id="slide02"><div class="hp-slide-gradient"></div></div>
  <div class="columns small-12 large-6">immagine3</div>
</div>

<div class="row hp-slide-box">  
  <div class="columns small-12 large-6">immagine3</div>
  <div class="columns small-12 large-6" id="slide03"><div class="hp-slide-gradient"></div></div>
</div>







</section>














<section id="news">
<div class="row">

    <div id="hp-news-container" class="grid js-masonry" data-masonry-options='{ "itemSelector": ".hp-news", "animated":true}'> 

    <?php  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

              
             <div class="hp-news columns small-12 medium-4 large-3">

                    <?php
                      // Settiamo alcune variabili
                      $categorie = get_the_terms( $post->ID, "projects" );

                      $parent = get_term($categorie[0]->parent,"projects" );
                      if ($parent->term_id) {
                          $rl_res = $parent->taxonomy . '_' .  $parent->term_id;
                          $rl_category_color = get_field('colore_della_categoria',$rl_res );
                          $nome_categoria = $parent->name;
                      } else {
                          $rl_res = $categorie[0]->taxonomy . '_' .  $categorie[0]->term_id;
                          $rl_category_color = get_field('colore_della_categoria',$rl_res );
                          $nome_categoria = $categorie[0]->name;
                      }
                      

                    ?>
                    <!--  <div class="hp-news-bar" style="background-color:<?php echo $rl_category_color; ?>"></div> -->
                     <div class="hp-news-occhiello" style="color:<?php echo $rl_category_color; ?>;"><?php echo $nome_categoria ?></div>
                     <div class="hp-titolo-box"><a class="" href="<?php the_permalink(); ?>">
                      <h2 class="random_color"><?php echo the_title(); ?></h1></a></div>
                     <div class="hp-news-dateinfo closed"><?php echo get_the_date(); ?>
                        <i class="fa fa-bars info-expander" id="" panel="info-panel-<?php the_ID(); ?>" ></i>
                        <div class="hp-news-info" id="info-panel-<?php the_ID(); ?>">
                            <b>keywords: </b><?php the_tags(""); ?><br />
                            <b>region: </b><a href="<?php get_term_link( the_field('regione_geografica') ); ?>"><?php the_field('regione_geografica') ?></a>
                        </div>            
                     </div>
                     <div class="hp-news-testo"><?php echo get_the_content('continua'); ?></div>
                 


             </div>  <!-- End div Item -->

            <?php endwhile; ?>


      <?php else : ?>
                  Nessuna news presente.
      <?php endif; ?>

    </div>
</div> <!-- end for masonry news-->

</div>
</section> <!-- End News Section -->




<section id="charts">
  <div class="row">
    <div class="section-title titolino"><span class="random_colored">Fast </span><b class="random_colored">Facts</b></div>      
    
    <div class="columns show-for-medium-up">
    <?php 
      // Parametri num colonne, munero dei grafici
      // Attenzione che se il canvas è a visibility=0 da' errore provare con foundation6?
      killer_charts_tag (4,4); ?>
    </div>


  </div>
</section>
    


<section id="mission">
  <div class="row"><div class="columns text-center">
    <div class="section-title titolino"><span class="random_colored">Our </span><b class="random_colored">Mission</b></div> 
    <p class="titolo big">Vivamus fermentum semper porta. Nunc diam velit, adipiscing ut tristique vitae</p>
   <p class="data"> sagittis vel odio. Maecenas convallis ullamcorper ultricies. Curabitur ornare, ligula semper consectetur sagittis, nisi diam iaculis v</p>
    <p>elit, id fringilla sem nunc vel mi. Nam dictum, odio nec pretium volutpat, arcu ante placerat erat, non tristique elit urna et turpis. Quisque mi metus, ornare sit amet fermentum et, tincidunt et orci. Fusce eget orci a orci congue vestibulum. Ut dolor diam, elementum et vestibulum eu, porttitor vel elit. Curabitur venenatis pulvinar tellus gravida ornare. Sed et erat faucibus nunc euismod ultricies ut id justo. Nullam cursus suscipit nisi, et ultrices justo sodales nec. Fusce venenatis facilisis lectus ac semper. Aliquam at massa ipsum. Quisque bibendum purus convallis nulla ultrices ultricies. Nullam aliquam, mi eu aliquam tincidunt, purus velit laoreet tortor, viverra pretium nisi quam vitae mi. Fusce vel volutpat elit. Nam sagittis nisi dui.
      
      Suspendisse lectus leo, consectetur in tempor sit amet, placerat quis neque. Etiam luctus porttitor lorem, sed suscipit est rutrum non. Curabitur lobortis nisl a enim congue semper. Aenean commodo ultrices imperdiet. Vestibulum ut justo vel sapien venenatis tincidunt. Phasellus eget dolor sit amet ipsum dapibus condimentum vitae quis lectus. Aliquam ut massa in turpis dapibus convallis. Praesent elit lacus, vestibulum at malesuada et, ornare et est. Ut augue nunc, sodales ut euismod non, adipiscing vitae orci. Mauris ut placerat justo. Mauris in ultricies enim. Quisque nec est eleifend nulla ultrices egestas quis ut quam. Donec sollicitudin lectus a mauris pulvinar id aliquam urna cursus. Cras quis ligula sem, vel elementum mi. Phasellus non ullamcorper urna.    
        </p></div>
  </div>
</section>

<section id="staff">

</section>



<section id="maps">
  <div class="row">
    <div class="columns large-12"><div class="section-title titolino">
      <span class="random_colored">Global Health </span><b class="random_colored">World Maps</b></div> </div>
  </div>

  <div class="row">
    <div class="columns large-4">
      <p class="titolo big">Our Maps</p>      
    </div>
    <div class="columns large-3"><div class="button float-right">Filtra mappe:&nbsp;&nbsp;<i class="fa fa-bars"></i></div></div>
  </div>



  <div class="row">
    <div class="columns large-4"><p class="hp-news-titolo">Mappa 01</p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur cumque voluptas, molestiae, eos culpa quod sint alias nemo perferendis optio praesentium molestias rem aut eaque repellat fuga velit labore explicabo!</div>
    <div class="columns-large-8"><img src="http://www.andreafiorelli.com/cnsg/wp-content/uploads/2016/04/Untitled-1.jpg" alt=""></div>
  </div>
  <div class="row">
    <div class="columns large-4"><p class="hp-news-titolo">Mappa 02</p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur cumque voluptas, molestiae, eos culpa quod sint alias nemo perferendis optio praesentium molestias rem aut eaque repellat fuga velit labore explicabo!</div>
    <div class="columns-large-8"><img src="http://www.andreafiorelli.com/cnsg/wp-content/uploads/2016/04/Untitled-2.jpg" alt=""></div>
  </div>
  <div class="row">
    <div class="columns large-4"><p class="hp-news-titolo">Mappa 03</p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur cumque voluptas, molestiae, eos culpa quod sint alias nemo perferendis optio praesentium molestias rem aut eaque repellat fuga velit labore explicabo!</div>
    <div class="columns-large-8"><img src="http://www.andreafiorelli.com/cnsg/wp-content/uploads/2016/04/Untitled-3.jpg" alt=""></div>
  </div>


</section>