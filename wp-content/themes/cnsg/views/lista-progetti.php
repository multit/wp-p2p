<div class="columns large-3 end">
	<h3><?php  echo  get_post_type( $post->ID ); ?></h3>
<a href="<?php echo get_post_permalink( ); ?>"><h2><?php echo get_the_title( ); ?></h2></a><br>
<?php echo get_field('main_goal',$post->ID); ?>
<?php 


//$tipo = get_dettagli_categoria( $post->ID );
//$tipo = get_post_type( $post->ID );
//print_r($tipo);
?>


</div>