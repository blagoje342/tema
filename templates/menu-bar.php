
<nav id="podmenu" class="navbar navbar-inner nav effect7" role="menu">
        <?php
          if (has_nav_menu('secondary_navigation')) :
            wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'navbar effect7'));
          endif;
        ?>
</nav>
