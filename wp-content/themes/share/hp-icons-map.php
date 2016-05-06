<div class="row hp-icons-map fullscreen-map-toggler">
    <div class="columns small-12 text-center">
        <!-- <p class="titolo_mega random_colored">What we do</p> -->
        <ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-6 hp-icons-map" >

        <?php
        // $args = array(
        //   'orderby' => 'name',
        //   'parent' => 0,
        //   'hide_empty' => 0,
        //   'exclude' => 1,
        //   'order' => 'ASC'
        //   );
        // $categories = get_categories($args);

        $args = array(
          'orderby' => 'name',
          'parent' => 0,
          'hide_empty' => 0
          );
        $categories = get_terms("progetto", $args);



          foreach($categories as $category) {
            $tt = $category->taxonomy .'_' . $category->term_id;
            $icon = get_field('icona_della_categoria', $tt);
            $color = get_field('colore_della_categoria', $tt);
            
            ?>

            
                <li style="color:<?php echo $color ?>"><i class="<?php echo $icon; ?> hpicons"></i>                    
                <a href="<?php echo get_site_url(); ?>/<?php echo $category->slug ?>"><?php echo $category->name; ?></a>                            
                </li>


            <?php
            // echo '<p> Description:'. $category->description . '</p>';
            // echo '<p> Post Count: '. $category->count . '</p>';  
            } 
        ?>
        </ul>        

    </div>

  
    


</div>      