<?php
/*
Template Name: Frontpage Template
*/
?>

   <div id="naslovna_cont">
	<?php get_template_part('templates/page', 'teme'); ?>
	<br/>
     <div class="row-fluid naslovna">
	<div class="span12">
	  <?php get_template_part('templates/content', 'page'); ?>
        </div>
      </div>



	<div id="nas" class="row">
	 <div id="novosti_naslovna" class="span9">
	   <div class="span9">
	     <h3>Novosti</h3>
	     <?php get_template_part('templates/naslovna_novosti'); ?>
	    </div>
	  </div>


	 <div id="slike" class="span3 pull-right">

	    <?php get_template_part('templates/naslovna_galerija'); ?>

	
	 </div>


	 <div id="desavanje" class="span9">
	     <h3>Dešavanja</h3>
	      <?php get_template_part('templates/naslovna_events'); ?>
        </div>


	    <div id="dugme">
	      <?php get_template_part('templates/naslovna_dugmad'); ?>
		</div>


	 <div id="mapa" class="span6">
	 <div class="span6">
	   <h3>Gde se nalazimo?</h3>
	<?php $post = get_page_by_title('Lokacija'); 
$queried_post = get_page($post);   ?>
	<p><?php echo $queried_post->post_content;  ?></p>

	 </div>
	   <div class="span6">
       <?php get_template_part('templates/page', 'gmap'); ?>
	   </div>
	 </div>

