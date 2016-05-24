<?php get_header(); ?>

<?php
  //get_template_part( 'mobile', get_post_format() );  
  get_template_part( 'mobile');
?>


<?php
  if ( is_front_page() ) {
    get_template_part( 'views/hp-template.01' );
  }
?>





<?php get_footer(); ?>