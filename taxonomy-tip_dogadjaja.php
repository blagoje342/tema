<?php 
   $today = date('U');
   $args_dogadjaji= array(
	'post_type' => 'event',
  'orderby' => 'meta_value',
  'meta_key' => 'pocetak',
  'order' => 'ASC'); 

 $dogadjaji_query = new WP_Query($args_dogadjaji);

           

  if (!$dogadjaji_query->have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Nema rezultata po traženom kriterijumu.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div id="kalendar_dogadjaja">
  <h2>Kalendar događaja</h2>
<?php while ($dogadjaji_query->have_posts()) : $dogadjaji_query->the_post();  ?>
<?php $dogadjaji = get_post_custom($post->ID);
              $pocetak = $dogadjaji["pocetak"][0];
              $zavrsetak = $dogadjaji["zavrsetak"][0];

              $pocetak_date = date(get_option('date_format'), $pocetak);
              $zavrsetak_date = date(get_option('date_format'), $zavrsetak);
        ?>

   <?php switch($today) : 
            case($pocetak >= $today) : ?>

                  <article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
                   <span class='span3 datum'>
                     <?php echo $pocetak_date . " - " . $zavrsetak_date; ?>
                   </span>
                   <h4 class="center-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                   <span class='offset3 span9'>
                     <?php echo the_excerpt(); ?>
                   </span>
                  </article>
              <?php break; ?>
      <?php case($pocetak <= $today && $zavrsetak >= $today) : ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class(array('row', 'current_event')); ?>>
                   <span class='span3 datum'>
                      <?php echo $pocetak_date . " - " . $zavrsetak_date; ?>
                  </span>
                   <h4 class="center-text"><a href="<?php the_permalink(); ?>"><?php echo "* "; the_title(); echo " - u toku *"; ?></a></h4>
                      
                   <span class='offset3 span9'>
                     <?php echo the_excerpt(); ?>
                  </span>
                  </article>
              <?php break; ?>
      <?php case($zavrsetak <= $today) : ?>
                  <article id="post-<?php the_ID(); ?>" <?php post_class(array('row')); ?>>
                   <span class='span3 datum prosli'>
                      <?php echo $pocetak_date . " - " . $zavrsetak_date; ?>
                  </span>
                   <h4 class="center-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                   <span class='offset3 span9'>
                     <?php echo the_excerpt(); ?>
                  </span>
                  </article>
              <?php break; ?>


    <?php endswitch; ?>

  
<?php endwhile; 
        // Reset query
        wp_reset_query();
?>
</div>
        <?php echo get_template_part('templates/comments_fb'); ?>
                            <hr/>
