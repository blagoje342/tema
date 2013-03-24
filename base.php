<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=347837145332927";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->

  <?php
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?>

    <div id="holder">
           <div class="container">
                          <?php get_template_part('templates/page', 'carousel'); ?>
                          <?php get_template_part('templates/page', 'submenu'); ?>
           </div>

           <div id="wrap" class="container" role="document">
              <div class="row"> 
                  <span class="span12">
                  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                  </span>
                <div id="main" class="<?php echo roots_main_class(); ?>" role="main">

                  <?php get_template_part('templates/oblaci'); ?>
                  <?php include roots_template_path(); ?>
                 <hr> 
                </div><!-- main -->
              </div><!-- holder -->
            <?php get_template_part('templates/footer'); ?>
          </div><!-- /#wrap -->
    </div><!-- holder -->
  </body>
</html>
