<?php 
 $args_novosti = array(
	'cat' => 'Novosti',
	'posts_per_page' => '6'); 

 query_posts($args_novosti);


  if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Nema rezultata po traženom kriterijumu.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?> naslovne_vesti" <?php post_class(); ?>>
    <header id="novosti_naslov" class="alignleft">
	<span class='datum'>
      <?php echo get_the_date('d.m.Y'); ?> - 
	</span>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </header>
   </br>
   <p><?php the_excerpt(); ?></p>
   <footer>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
<?php endwhile; 
// Reset query
wp_reset_query();
?>
