<?php get_header(); ?>



<div class="row">

    <?php

    while ( have_posts() ) : the_post();
      get_template_part( 'views/lista-progetti' );
    endwhile;
    
    ?>


</div>

<?php get_footer(); ?>