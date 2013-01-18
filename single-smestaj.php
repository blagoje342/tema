
           <?php                                                                                    
              $custom = get_post_custom($post->ID);
              $domacinstvo = $custom["domacinstvo"][0];
              $mesto = $custom["mesto"][0];
              $broj_telefona = $custom["broj_telefona"][0];
              $broj_soba = $custom["broj_soba"][0];
             ?>
 
         <div id="wrap" class="container" role="document">
          <div id="content" class="row">
           <div id="smestaj" class="<?php echo roots_main_class(); ?> span12" role="main">
 
 
            <div class="smestaj_group row">
             <div class="info span12">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                 <div class="row">
                 <div class="span6 effect1">
                    <?php echo get_the_post_thumbnail($page->ID, 'large'); ?>
                 </div>
 
                    <dl class="dl-horizontal span6">                                                                           
                       <dt>Domaćin</dt>
                       <dd><?php print $domacinstvo ?></dd>
                       <dt>Mesto</dt>
                       <dd><?php print $mesto ?></dd>
                       <dt>Broj telefona</dt>
                       <dd><?php print $broj_telefona?></dd>
                       <dt>Broj soba</dt>
                       <dd><?php print $broj_soba ?></dd>
 
                    </dl>
                 </div> 
                 <div class="row">
          <div class="span12">
              <p>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php endwhile; ?>
		<?php endif; ?>
              </p>
 
                 </div> 
 
                 </div> 
             </div> 
            </div>
 
           </div>
          </div>
         </div>

