    <div class="container">
      <div class="row">
       <div class"span12">
   

<?php $teme_turizma = array('Priroda', 'Kulinarstvo', 'Kultura', 'Aktivnosti'); ?> 
<?php foreach ($teme_turizma as $value) { ?> 
        <div class="span3">
	   <?php if(is_front_page()) {                
		$post = get_page_by_title($value); // assign post id
                $queried_post = get_page($post); ?>

		<div class='teme effect1 img-polaroid'><a href="<?php echo get_page_link($post->ID); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'medium'); ?></a></div>
		<div class='product_title'><h2><a href="<?php echo get_page_link($post->ID); ?>"><?php echo $queried_post->post_title;  ?></a></h2></div>
                <div class='description_product'>
                <?php echo $queried_post->post_content;  ?></div>
            <?php  }?>
               </div>

            <?php  }?>
       </div>
      </div>
     </div>
