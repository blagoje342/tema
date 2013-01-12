  
    <nav id="podmenu" role="navigation">
      <?php
        if (has_nav_menu('secondary_navigation')) :
          wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-pills'));
        endif;
      ?>
    </nav>
