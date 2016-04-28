<article>
    <div class="row">

<?php //print_r($post) ?>
      <div class="columns medium-3 show-for-medium-up">            
            <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'single-article-featured' ) ); ?>            
            <p class="key-autore"><b>Author</b><br ><?php echo get_the_author($post->ID); ?></p>
            <p class="key-keywords"><b>Keywords</b><br ><?php the_tags(""); ?></p>
        </div>


        <div class="columns medium-9">
        <p class="categoria"><?php echo the_category( ); ?></p>
        <p class="titolo big"><?php the_title(); ?></p>
        <p class="data"><?php the_date( ); ?></p>
            <?php the_content( ); ?>        
        </div>


    </div> <!-- end row -->
</article>