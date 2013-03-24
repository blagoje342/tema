    <nav id="podmenu" class="navbar effect6" role="navigation">
     <div class="navbar-inner">
      <?php
        if (has_nav_menu('secondary_navigation')) :
          wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav nav-pills meni-stavke'));
        endif;
      ?>
     </div>
    </nav>
