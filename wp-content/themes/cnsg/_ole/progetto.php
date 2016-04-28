<?php get_header(); ?>




<?php 

// Settaggio di alcune variabili iniziali


    wp_reset_postdata();  
    setup_postdata($post);
    $categories = get_the_category();

    if ( ! empty( $categories ) ) {  
    foreach( $categories as $category ) {
        $categoria .= esc_html( $category->name );
        $categoria_parent = get_category ($category->category_parent);  // id della categoria genitore
        $categoriaID = $category->term_id;
        }
    }

    if(function_exists('rl_color')){
        $rl_category_color = rl_color($categoria_parent->term_id);
    } else  {
        $rl_category_color = '#ccc';
    }

    // print_r($categoria_parent);
    // Spinge la variabile come post ai vari templati caricat con get_template_part
    set_query_var( 'rl_category_color', $rl_category_color );

?>







<article class="show-for-medium-up">


<!-- 
 ________  ________  ___       ________  ________   ________   ________          ________  _______   ________   _________  ________  ________  ___       _______      
|\   ____\|\   __  \|\  \     |\   __  \|\   ___  \|\   ___  \|\   __  \        |\   ____\|\  ___ \ |\   ___  \|\___   ___|\   __  \|\   __  \|\  \     |\  ___ \     
\ \  \___|\ \  \|\  \ \  \    \ \  \|\  \ \  \\ \  \ \  \\ \  \ \  \|\  \       \ \  \___|\ \   __/|\ \  \\ \  \|___ \  \_\ \  \|\  \ \  \|\  \ \  \    \ \   __/|    
 \ \  \    \ \  \\\  \ \  \    \ \  \\\  \ \  \\ \  \ \  \\ \  \ \   __  \       \ \  \    \ \  \_|/_\ \  \\ \  \   \ \  \ \ \   _  _\ \   __  \ \  \    \ \  \_|/__  
  \ \  \____\ \  \\\  \ \  \____\ \  \\\  \ \  \\ \  \ \  \\ \  \ \  \ \  \       \ \  \____\ \  \_|\ \ \  \\ \  \   \ \  \ \ \  \\  \\ \  \ \  \ \  \____\ \  \_|\ \ 
   \ \_______\ \_______\ \_______\ \_______\ \__\\ \__\ \__\\ \__\ \__\ \__\       \ \_______\ \_______\ \__\\ \__\   \ \__\ \ \__\\ _\\ \__\ \__\ \_______\ \_______\
    \|_______|\|_______|\|_______|\|_______|\|__| \|__|\|__| \|__|\|__|\|__|        \|_______|\|_______|\|__| \|__|    \|__|  \|__|\|__|\|__|\|__|\|_______|\|_______|
                                                                                                                                                                      
                                                                                                                                                                      
                                                                                                                                                                      
 -->

<div class="row">
  <div class="articolo columns medium-10 medium-push-1 large-6 large-push-2">


    <div class="first-row-padded">




      <h3 style="color:<?php echo $rl_category_color; ?>"><?php echo $categoria_parent->name ?></h3>
      <h1><?php the_title(); ?></h1>
    </div>
    <?php the_content(); ?>

<?php

$staff_object = get_field('staff');

//print_r($staff_object);

if( $staff_object ): 

    // override $post
    $post = $staff_object;
    setup_postdata( $post ); 

    ?>


    <?php foreach( $staff_object as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <span>Post Object Custom Field Nome: <?php echo get_the_title($post_object->ID); ?></span>
        </li>
    <?php endforeach; ?>


    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

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

            <?php get_template_part( 'share-template', get_post_format() );  ?>

    </div>

    <div class="colored-box" style="background-color:<?php echo $rl_category_color; ?>"></div>


      <h2>Staff</h2>


        <ul class="staff-list">
        <?php
        $args = array( 'category' => $categoriaID   , 'post_type' => 'staff' );
        $staffMembers = get_posts( $args );
        foreach ( $staffMembers as $post ) : setup_postdata( $post ); 
                

            ?>        
            <li>
                <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'staff-mini-image' ) ); ?>
                <a href="<?php the_permalink(); ?>"><h4 style="color:<?php echo $rl_category_color; ?>"><?php the_title(); ?></h4></a>
                <h5><?php the_field('ruolo'); ?><br>
                <a href="mailto:<?php the_field('email'); ?>"><b><?php the_field('email'); ?></b></a>
                <i><?php  
                    

                ?></i>
                </h5>
            </li>
        <?php endforeach; 
        wp_reset_postdata();?>
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
            <?php the_post_thumbnail( 'thumbnail', array( 'class' => '' ) ); ?>
        </div>

        <div class="right-column">
        <?php
        $args = array( 'category' => $categoriaID, 'post_type' => 'documento' );
        $documenti = get_posts( $args );

        if (!empty($documenti)):  
        ?>    
            <div class="colored-box" style="background-color:<?php echo $rl_category_color; ?>"></div>
            <h2>Documents</h2>
            <ul>
            <?php foreach ( $documenti as $post ) : setup_postdata( $post ); 
                $file = get_field('file'); ?>
                <li><a class="pdf-download" href="<?php echo $file['url']; ?>"><?php echo get_the_title($post->id); ?></a></li>
            <?php endforeach; 

            wp_reset_postdata();?>
        </ul>
       <?php endif; ?>


        <?php
        $args = array( 'category' => $categoriaID, 'post_type' => 'pubblicazione' );
        $documenti = get_posts( $args );

        if (!empty($documenti)):  
        ?>    
            <div class="colored-box" style="background-color:<?php echo $rl_category_color; ?>"></div>
            <h2>Papers</h2>
            <ul>
            <?php foreach ( $documenti as $post ) : setup_postdata( $post );
            $file = get_field('file'); ?>
            <li><a class="pdf-download" href="<?php echo $file['url']; ?>"><?php echo get_the_title($post->id); ?>
                <?php 
                $dimensione = filesize( get_attached_file ( $file['id'] )); 
                echo '<b class="attach_size" >' . size_format($dimensione) . '</b></a>';
                ?>
            </li>

    
            

            <?php endforeach; 

            wp_reset_postdata();?>
        </ul>
       <?php endif; ?>
            </div>

        </div>
        


</div>

</article>




<?php get_footer(); ?>
