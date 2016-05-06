<?php get_header(); ?>

<div class="row">
  <div class="columns small-12 medium-9" id="colonna-articolo">
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();
      //get_template_part( 'content', get_post_format() );
      get_template_part( 'article' );
    // End the loop.
    endwhile;
    ?>

  </div>

  <div class="columns small-12 medium-3" id="colonna-side">
      <div class="titolino">
        <span class="random_colored">Related </span><b class="random_colored">Articles</b>
      </div>      
  </div>
</div><!-- .row -->



<section id="staff">
  <div class="row">
    <div class="section-title titolino"><span class="random_colored">Fast </span><b class="random_colored">Facts</b></div> 
  </div>
  <div class="row">
    <p><?php killer_charts_tag (4,4); ?></p>
  </div>  
</section>

<?php get_footer(); ?>
