<!-- 

 _____ ______   ________  ________  ___  ___       _______    
|\   _ \  _   \|\   __  \|\   __  \|\  \|\  \     |\  ___ \     
\ \  \\\__\ \  \ \  \|\  \ \  \|\ /\ \  \ \  \    \ \   __/|    
 \ \  \\|__| \  \ \  \\\  \ \   __  \ \  \ \  \    \ \  \_|/__  
  \ \  \    \ \  \ \  \\\  \ \  \|\  \ \  \ \  \____\ \  \_|\ \ 
   \ \__\    \ \__\ \_______\ \_______\ \__\ \_______\ \_______\
    \|__|     \|__|\|_______|\|_______|\|__|\|_______|\|_______|
                                                                                                                                
 -->



<div class="off-canvas-wrap show-for-small-only" data-offcanvas>
  <div class="inner-wrap">

    <a class="left-off-canvas-toggle" href="#" ><i class="fa fa-bars"></i></a>

    <!-- Off Canvas Menu -->
    <aside class="left-off-canvas-menu">


    <ul class="off-canvas-list left-menu-mobile">


      <li class=""><a href="#mission"><h3>Mission</h3></a></li>
      <li class=""><a href="#staff"><h3>Staff</h3></a></li>
      <li class="has-submenu"><a href="#"><h3>Progetti</h3></a>
        <ul class="left-submenu">
          <li class="back"><a href="#"><h3>Back</h3></a></li>
        <?php 
        $args = array (
            'menu' => 'Menu Categorie',
            'depth' => 3,
            'container' => false,
            'items_wrap' => '%3$s',
            // 'menu_class' => 'off-canvas-list left-menu-mobile cazzon',
            'link_before' => '<h3>',
            'link_after' => '</h3>',
            //'walker' => new Menu_Principale_Mobile_Walker()
        );
        wp_nav_menu($args);
        ?>
        </ul></li>
        <li class=""><a href="#news"><h3>News</h3></a></li>
        <li class=""><a href="#search"><h3>Search</h3></a></li>

    </ul> 






    </aside>

    <!-- main content goes here -->

        <div class="row show-for-small-only ">
          <a href="index.html">

            <div class="columns text-center logo logo_small">
                <p>
                    Italian Center For<br><b>Global Health</b>
                </p>
                <p class="logo_payoff">fightin health inequalities worldwide</p>
            </div>
          </a>
        </div>



    <!-- end main content goes here -->

    <!-- close the off-canvas menu -->
    <a class="exit-off-canvas"></a>

  </div>
</div>




<!--
  _______   ________   ________          _____ ______   ________  ________  ___  ___       _______      
|\  ___ \ |\   ___  \|\   ___ \        |\   _ \  _   \|\   __  \|\   __  \|\  \|\  \     |\  ___ \     
\ \   __/|\ \  \\ \  \ \  \_|\ \       \ \  \\\__\ \  \ \  \|\  \ \  \|\ /\ \  \ \  \    \ \   __/|    
 \ \  \_|/_\ \  \\ \  \ \  \ \\ \       \ \  \\|__| \  \ \  \\\  \ \   __  \ \  \ \  \    \ \  \_|/__  
  \ \  \_|\ \ \  \\ \  \ \  \_\\ \       \ \  \    \ \  \ \  \\\  \ \  \|\  \ \  \ \  \____\ \  \_|\ \ 
   \ \_______\ \__\\ \__\ \_______\       \ \__\    \ \__\ \_______\ \_______\ \__\ \_______\ \_______\
    \|_______|\|__| \|__|\|_______|        \|__|     \|__|\|_______|\|_______|\|__|\|_______|\|_______|
                                                                                                       
                                                                                                       
                                                                                                       -->