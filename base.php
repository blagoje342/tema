<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

  <?php
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

	    <?php get_template_part('templates/oblaci'); ?>

	    <?php get_template_part('templates/page', 'carousel'); ?>
	    <?php get_template_part('templates/page', 'submenu'); ?>

  <div id="wrap" class="container" role="document">
    <div id="content" class="row">
      <div id="main" class="<?php echo roots_main_class(); ?>" role="main">

	   <hr>

	    <?php include roots_template_path(); ?>

	<?php if (roots_display_sidebar()) : ?>
      </div>
      <aside id="sidebar" class="<?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php get_template_part('templates/sidebar'); ?>
      </aside>
      <?php endif; ?>
    </div><!-- /#content -->
  </div><!-- /#wrap -->
<img src="<?php get_theme_root_uri(); ?> /wordpress/assets/logo-med.png" class="logo-med">
<div class="footer-color">
  <?php get_template_part('templates/footer'); ?>
</div>


</body>
</html>
