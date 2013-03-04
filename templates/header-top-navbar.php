<header id="banner" class="navbar navbar-fixed-top" role="banner">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo home_url(); ?>/">
	<img src='assets/brand.png'>
      </a>

<form role="search" method="get" id="searchform" class="navbar-search pull-left form-search" action="<?php echo home_url('/'); ?>">
  <label class="hide" for="s"><?php _e('Search for:', 'roots'); ?></label>
  <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query" placeholder="<?php _e('Pretraži', 'roots'); ?> <?php bloginfo('name'); ?>">
 <!---  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'roots'); ?>" class="btn"> -->
</form>
      <nav id="nav-main" class="nav-collapse" role="navigation">
        <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav pull-right'));
          endif;
        ?>
      </nav>
    </div>
  </div>
</header>
