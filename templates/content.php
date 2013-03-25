

<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Nema rezultata po traženom kriterijumu.', 'roots'); ?></p>
  </div>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
     <span class='pull-right'>
      <?php echo get_the_date('d.m.Y'); ?>
     </span>
      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
    </header>
    <div class="entry-summary">
     <?php the_excerpt(); ?>
    </div>
    <footer>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
  <hr>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav id="post-nav">
    <ul class="pager">
      <?php if (get_next_posts_link()) : ?>
        <li class="previous"><?php next_posts_link(__('&larr; Starije objave', 'roots')); ?></li>
      <?php else: ?>
        <li class="previous disabled"><a><?php _e('&larr; Starije objave', 'roots'); ?></a></li>
      <?php endif; ?>
      <?php if (get_previous_posts_link()) : ?>
        <li class="next"><?php previous_posts_link(__('Novije objave &rarr;', 'roots')); ?></li>
      <?php else: ?>
        <li class="next disabled"><a><?php _e('Novije objave &rarr;', 'roots'); ?></a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>

	<?php if (roots_display_sidebar()) : ?>
      </div>
      <aside id="sidebar" class="<?php echo roots_sidebar_class(); ?>" role="complementary">
        <?php get_template_part('templates/sidebar'); ?>
      </aside>
      <?php endif; ?>
 
      <div>
