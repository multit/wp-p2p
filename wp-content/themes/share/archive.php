
<?php get_header(); ?>


<article>

<div class="row">
	<div class="columns large-12">

<h1 class="random_colored">
<?php printf( __( '%s', 'cnsg' ), single_cat_title( '', false ) ); ?>
</h1>

	</div>



	



</div>





<div class="row">



    <?php

    while ( have_posts() ) : the_post();
      get_template_part( 'views/lista-progetti' );
    endwhile;
    
    ?>


</div>
</article>
<?php get_footer(); ?>