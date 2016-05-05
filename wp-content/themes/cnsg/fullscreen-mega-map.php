
    <div class="columns small-12 logo logo_large logo-fullscreen-map">
      <i class="fa fa-times" aria-hidden="true"></i>
        <p class="logo_en">Italian Center For <b>Global Health</b></p>
        <p class="logo_ita">Centro Nazionale <b>per la Salute Globale</b></p>                
        <p class="logo_payoff">fightin health inequalities</p>
    </div>


      <!-- <p class="titolo_mega random_colored">What we do</p> -->
      <div class="fullscreen-mega-map-container">


      <?php   
      $categorie_progetto = get_terms('projects');
      foreach ($categorie_progetto as $cat) { 
        $term_link = get_term_link( $cat);
        ?>
          <h5><a href="<?php echo $term_link ?>"><?php echo $cat->name; ?></a></5>
      <?php } 
      ?>

        </div>