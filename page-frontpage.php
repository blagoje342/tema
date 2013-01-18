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
     <div class="row">
        <div class="span8">
	  <?php get_template_part('templates/content', 'page'); ?>
        </div>
       <?php get_template_part('templates/page', 'gmap'); ?>
      </div>
     <hr>
    </div>

