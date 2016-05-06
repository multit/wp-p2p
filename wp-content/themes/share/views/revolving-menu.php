<div class="revolving-menu">


		<?php if ( is_home() || $term ) { ?>
    <div class="row content">
  		<div class="columns small-1"><i class="fa fa-bars fullscreen-map-toggler"></i></div>
      <div class="columns small-10 small-centered revolving-menu-logo">
         <a href="."> 
         		<h3 id="logosx">centro nazionale salute globale</h3>
          	<h3 id="logodx">italian center for global health</h3>  
          </a>
      </div>

      <div class="columns small-1">
          <div id="revolving-menu-logo-iss" class="iss-logo"></div>
      </div>
    </div>


		<?php } else { ?>

    <div class="row content">
  		<div class="columns large-2"><a href="<?php bloginfo(home_url);; ?>"> <h3 class="random_colored">Italian Center For Global Health</h3></a></div>
  		<div class="columns large-8"><h2><?php echo $post->post_title ?></h2></div>
  		<div class="columns large-2"><i class="fa fa-bars fullscreen-map-toggler"></i></div>
  	</div>

		<?php } ?>

</div>