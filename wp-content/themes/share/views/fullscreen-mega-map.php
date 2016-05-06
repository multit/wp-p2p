
    <div class="columns small-12 logo logo_large logo-fullscreen-map" style="display:none">
      
        <p class="logo_en">Italian Center For <b>Global Health</b></p>
        <p class="logo_ita">Centro Nazionale <b>per la Salute Globale</b></p>                
        <p class="logo_payoff">fightin health inequalities</p>
    </div>


      <!-- <p class="titolo_mega random_colored">What we do</p> -->
      <div class="fullscreen-mega-map-container">

      
      <ul class="medium-block-grid-3 large-block-grid-3 hp-icons-map" id="menu-menu-progetti">
        <i class="fa fa-times" aria-hidden="true"></i>
      <?php   
      $categorie_progetto = get_terms('projects', array('hide_empty' => false));
      foreach ($categorie_progetto as $cat) { 
        $term_link = get_term_link( $cat);
        $rl_res = $cat->taxonomy . '_' .  $cat->term_id;
        $rl_category_color = get_field('colore_categoria',$rl_res );
        $rl_icona = get_field('icona_categoria',$rl_res );


        ?>
          
          <li class="flaticons-box <?php echo $rl_icona ?>" style="color:<?php echo $rl_category_color ?>">
            
            <a href="<?php echo $term_link ?>"><?php echo $cat->name; ?></a>


          </li>
      <?php } 
      ?>
      </ul>

      </div>