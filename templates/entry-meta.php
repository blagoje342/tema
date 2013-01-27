<time class="updated" datetime="<?php echo get_the_time('c'); ?>" pubdate><?php echo sprintf(__('Objavljeno  %s u %s.', 'roots'), get_the_date('d.m.Y'), get_the_time('H:m')); ?></time>
<p class="byline author vcard"><?php echo __('Napisao/la', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>
