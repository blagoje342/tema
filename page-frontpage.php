<?php
/*
Template Name: Frontpage Template
*/
?>


	<?php get_template_part('templates/page', 'carousel'); ?>
	<?php get_template_part('templates/page', 'submenu'); ?>
    <div class="container" id="jug_mapa">
     <hr>
      <div class="row">

        <div class="span8">
	  <?php get_template_part('templates/content', 'page'); ?>
        </div>
       <?php get_template_part('templates/page', 'gmap'); ?>
      </div>
     <hr>
	<?php get_template_part('templates/page', 'teme'); ?>
    </div>
     <hr>


