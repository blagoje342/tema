


	   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    <?php
	     $custom = get_post_custom($post->ID);
	     $adresa = $custom["adresa"][0];
	     $mesto = $custom["mesto"][0];
	     $broj_telefona = $custom["broj_telefona"][0];
	     $fax= $custom["fax"][0];
	     $mejl= $custom["mejl"][0];
	    ?>

	   <div id="smestaj" class="<?php echo roots_main_class(); ?>" role="main">
	     <div class="smestaj_group row">
	         <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		           <div class="span3 thumbnail">
	               <?php echo get_the_post_thumbnail($page->ID, 'medium'); ?>
		           </div>
               <div class="span4">
                 <p>
                  <?php the_excerpt(); ?> 
                 </p>
               </div> 
                  <dl class="dl-horizontal span4">                                                                       
                    <dt>Adresa</dt>
                    <dd><?php print $adresa ?><dd>
                    <dt>Mesto</dt>
                    <dd><?php print $mesto ?><dd>
                    <dt>Broj telefona</dt>
                    <dd><?php print $broj_telefona?><dd>
                    <dt>Fax</dt>
                    <dd><?php print $fax?><dd>
                    <dt>Mejl</dt>
                    <dd><?php print $mejl?><dd>
                   <dl>
	       </div>
         <hr>
	    </div>
<?php endwhile; else: ?>
  <p><?php _e('Nema rezultata po kriterijumu pretrage'); ?></p>
<?php endif; ?>

