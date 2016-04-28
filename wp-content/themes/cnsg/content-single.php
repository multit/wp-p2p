<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<section id="single-article" class="single_article">


    <div class="row">
        <div class="columns large-9"> 

        <div class="row">
            <article>
        <!-- begin colonna articolo -->
        <div class="columns medium-8">
        <p class="categoria"><?php echo the_category( ); ?></p>
        <p class="titolo big"><?php the_title(); ?></p>
        <p class="data"><?php the_date( ); ?></p>
            <?php the_content( ); ?>
        
        </div>
        <div class="columns medium-4 show-for-medium-up">
            
            <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'single-article-featured' ) ); ?>
            
            <p class="key-autore"><b>Author</b><br ><?php the_author( ); ?></p>
            <p class="key-keywords"><b>Keywords</b><br ><?php the_tags( ); ?></p>
        </div>
        
       </article> </div> 
       <!-- end colonna articolo -->
         </div>   

        <div class="columns large-3 show-for-large-up sidecolumn">
            <p class="titolino">Related <b>news</b></p>

Spazio news correlate
<p class="titolino">Fast Facts <b>news</b></p>
			<?php killer_charts_tag (1,3);  ?>
        </div> 
                
    </div>
   




</article>




</section>
