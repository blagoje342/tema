<?php 
 $args_dogadjaji= array(
	'post_type' => 'event',
	'posts_per_page' => '5'); 

 query_posts($args_dogadjaji);


  if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Nema rezultata po traženom kriterijumu.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" class="span9" <?php post_class(); ?>>
    <header class="alignleft">
	<span class='datum'>
      <?php echo get_the_date('d.m.Y'); ?>
	</span>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </br>
    </header>
  </article>
<?php endwhile; ?>

