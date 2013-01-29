<div id="galerija" class="row">
	   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<span class="gallery_group span3 effect6">
	       <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID); ?>

	           <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
</span>
	   <?php endwhile; else: ?>
	    <p><?php _e('Galerije nisu pronađene.'); ?></p>
	 <?php endif; ?>
</div>
