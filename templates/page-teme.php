      <div class="row teme_polaroid">
   

<?php $teme_turizma = array('Priroda', 'Kulinarstvo', 'Kultura', 'Aktivnosti'); ?> 
<?php foreach ($teme_turizma as $value) { ?> 
        <span class="span3 teme_group effect6">
             <?php if(is_front_page()) {                
            $post = get_page_by_title($value); // assign post id
                        $queried_post = get_page($post); ?>

            <div class='teme'><a href="<?php echo home_url('/category/teme/' . $value); ?>"><?php echo get_the_post_thumbnail( $post->ID); ?></a></div>
            <div class='naziv_teme'><h2><a href="<?php echo home_url('/category/teme/' . $value); ?>"><?php echo $queried_post->post_title;  ?></a></h2></div>
                    <?php  }?>
         </span>

            <?php  }?>
     </div>
