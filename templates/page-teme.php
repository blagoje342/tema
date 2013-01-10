    <div class="container">
      <div class="row">
       <div class"span12">
    
        <div class="span3">
	   <?php if(is_front_page()) {                
		$post_id = 237; // assign post id
                $queried_post = get_page($post_id); ?>

		<div class='tema thumbnail'><a href="<?php echo get_page_link($post_id); ?>"><?php echo get_the_post_thumbnail( $post_id, 'medium'); ?></a></div>
		<div class='product_title'><h2><a href="<?php echo get_page_link($post_id); ?>"><?php echo $queried_post->post_title;  ?></a></h2></div>
                <div class='description_product'>
                <?php echo $queried_post->post_excerpt;  ?></div>
            <?php  } ?>
               </div>


        <div class="span3">
	   <?php if(is_front_page()) {                
		$post_id = 237; // assign post id
                $queried_post = get_page($post_id); ?>

		<div class='tema thumbnail'><a href="<?php echo get_page_link($post_id); ?>"><?php echo get_the_post_thumbnail( $post_id, 'medium'); ?></a></div>
		<div class='product_title'><h2><a href="<?php echo get_page_link($post_id); ?>"><?php echo $queried_post->post_title;  ?></a></h2></div>
                <div class='description_product'>
                <?php echo $queried_post->post_excerpt;  ?></div>
            <?php  } ?>
               </div>


        <div class="span3">
	   <?php if(is_front_page()) {                
		$post_id = 237; // assign post id
                $queried_post = get_page($post_id); ?>

		<div class='tema thumbnail'><a href="<?php echo get_page_link($post_id); ?>"><?php echo get_the_post_thumbnail( $post_id, 'medium'); ?></a></div>
		<div class='product_title'><h2><a href="<?php echo get_page_link($post_id); ?>"><?php echo $queried_post->post_title;  ?></a></h2></div>
                <div class='description_product'>
                <?php echo $queried_post->post_excerpt;  ?></div>
            <?php  } ?>
               </div>

       <div class="span3">
	   <?php if(is_front_page()) {                
		$post_id = 237; // assign post id
                $queried_post = get_page($post_id); ?>

		<div class='tema thumbnail'><a href="<?php echo get_page_link($post_id); ?>"><?php echo get_the_post_thumbnail( $post_id, 'medium'); ?></a></div>
		<div class='product_title'><h2><a href="<?php echo get_page_link($post_id); ?>"><?php echo $queried_post->post_title;  ?></a></h2></div>
                <div class='description_product'>
                <?php echo $queried_post->post_excerpt;  ?></div>
            <?php  } ?>
               </div>
</div>
</div>
</div>
