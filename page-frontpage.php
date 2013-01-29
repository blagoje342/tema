<?php
/*
Template Name: Frontpage Template
*/
?>

<br/>
    <div id="naslovna_cont">
	<?php get_template_part('templates/page', 'teme'); ?>
     <hr>
<br/>
     <div class="row-fluid naslovna">
	<div class="offset1 span10">
	  <?php get_template_part('templates/content', 'page'); ?>
        </div>
      </div>
	<div id="nas" class="row">

	 <div id="novosti_naslovna" class="span6">
	  <h3>Novosti</h3>

<?php 
 $args_novosti = array(
	'cat' => 'Novosti',
	'posts_per_page' => '5'); 

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
   <footer>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
  <hr>
<?php endwhile; 
// Reset query
wp_reset_query();
?>
	 </div>

	 <div id="desavanje" class="span6">
	  <h3>Dešavanja</h3>

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
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="alignleft">
	<span class='datum'>
      <?php echo get_the_date('d.m.Y'); ?>
	</span>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </br>
    </header>
    <footer>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
  </article>
  <hr>
<?php endwhile; ?>

	 </div>
</br>
<hr>
<?php 
 $args_galerija= array(
	'cat' => 'Galerija',
	'posts_per_page' => '6'); 

 query_posts($args_galerija); ?>

<div id="galerija" >
<div class="span12">
	   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<span class="gallery_group span3 effect6">
	       <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID); ?>

	           <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
</span>
	   <?php endwhile; else: ?>
	    <p><?php _e('Galerije nisu pronađene.'); ?></p>
	 <?php endif; 
// Reset query
wp_reset_query();
?>
	 </div>
       </div>


	 <div id="mapa" class="span7">
	   <h3>Gde se nalazimo?</h3>
	<?php $post = get_page_by_title('Lokacija'); 
$queried_post = get_page($post);   ?>
	<p><?php echo $queried_post->post_content;  ?></p>

	 </div>
	   <div class="span4">
       <?php get_template_part('templates/page', 'gmap'); ?>
	   </div>
	</div>
    </div>


