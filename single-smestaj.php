
           <?php                                                                                    
              $custom = get_post_custom($post->ID);
              $domacinstvo = $custom["domacinstvo"][0];
              $mesto = $custom["mesto"][0];
              $broj_telefona = $custom["broj_telefona"][0];
              $broj_soba = $custom["broj_soba"][0];
             ?>
 
           <div id="smesta" class="<?php echo roots_main_class(); ?>" role="main">
            <div id="smestaj" class="smestaj_group row">
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                 <div class="thumbnail span4">
                    <?php echo get_the_post_thumbnail($page->ID, 'large'); ?>
                 </div>

                 <div class="span5">
                    <dl class="dl-horizontal">                                                                           
                       <dt>Vlasnik</dt>
                       <dd><?php print $domacinstvo ?></dd>
                       <dt>Mesto</dt>
                       <dd><?php print $mesto ?></dd>
                       <dt>Broj telefona</dt>
                       <dd><?php print $broj_telefona?></dd>
                       <dt>Broj soba</dt>
                       <dd><?php print $broj_soba ?></dd>
                    </dl>
                 </div>
 
                 <div class="span12">
                    <p>
                      <?php while (have_posts()) : the_post(); ?>
                      <?php the_content(); ?>
                      <?php endwhile; ?>
                    </p>
                 </div>
              <?php echo get_template_part('templates/comments_fb'); ?>
             </div>

