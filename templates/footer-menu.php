<nav id="footer-menu" role="menu">
        <?php
          if (has_nav_menu('footer_navigation')) :
            wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav'));
          endif;
        ?>
</nav>