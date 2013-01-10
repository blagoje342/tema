<div id="podmeni" class="navbar navbar-fixed" role="banner">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <nav id="podmenu" class="nav-collapse" role="menu">
        <?php
          if (has_nav_menu('secondary_navigation')) :
            wp_nav_menu(array('theme_location' => 'secondary_navigation', 'menu_class' => 'nav'));
          endif;
        ?>
      </nav>
    </div>
  </div>
</div>
