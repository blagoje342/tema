<?php 
 $args_novosti = array(
	'showposts' => '5'); 

 $novosti_query = new wp_query($args_novosti);

  if ($novosti_query->have_posts()) : ?>

      <?php while ($novosti_query->have_posts()) : $novosti_query->the_post(); ?>
           <span class='datum pull-right'>
            <?php echo get_the_date('d.m.Y'); ?> 
           </span>
           <span class='vest'>
            <a href="<?php the_permalink(); ?>"><?php the_title('<h4>','</h4>'); ?></a>
               <?php the_excerpt(); ?>
           </span>
<hr/>
     <?php endwhile; ?>
      <?php else: ?>
        <div class="alert alert-block fade in">
          <a class="close" data-dismiss="alert">&times;</a>
          <p><?php _e('Nema rezultata po traženom kriterijumu.', 'roots'); ?></p>
        </div>
      <?php endif; 

        // Reset query
        wp_reset_query();
  ?>
