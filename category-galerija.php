


	   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="gallery_group span3 ">
		<span class="shadow">
	       <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
	        </span> 

	           <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
</div>
	   <?php endwhile; else: ?>
	    <p><?php _e('Galerije nisu pronađene.'); ?></p>
	 <?php endif; ?>

