<footer id="content-info" class="container row" role="contentinfo">
 <nav class="impressum span8">
  <?php            if (has_nav_menu('impressum')) :
            wp_nav_menu(array('theme_location' => 'impressum', 'menu_class' => 'nav nav-pills'));
          endif;
   ?>
 </nav>

<form role="search" method="get" id="searchform" class="navbar-search pull-right form-search" action="<?php echo home_url('/'); ?>">
  <label class="hide" for="s"><?php _e('Search for:', 'roots'); ?></label>
  <input type="text" value="<?php if (is_search()) { echo get_search_query(); } ?>" name="s" id="s" class="search-query" placeholder="<?php _e('Pretraži', 'roots'); ?> <?php bloginfo('name'); ?>">
 <!---  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'roots'); ?>" class="btn"> -->
</form>
</footer>
<footer class"row">
  <p class="pull-right">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
</footer>
<?php if (GOOGLE_ANALYTICS_ID) : ?>
<script>
  var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>
<?php wp_footer(); ?>
