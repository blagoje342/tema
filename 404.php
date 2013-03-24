<?php get_template_part('templates/page', 'header'); ?>

<div class="alert alert-block fade in">
  <a class="close" data-dismiss="alert">&times;</a>
  <p><?php _e('Strana koju tražite ne postoji. Možda je izbrisana, pomerena ili je trenutno nedostupna.', 'roots'); ?></p>
</div>

<p><?php _e('Please try the following:', 'roots'); ?></p>
<ul>
  <li><?php _e('Proverite da nema slovnih grešaka.', 'roots'); ?></li>
  <li><?php printf(__('Vratite se na <a href="%s">početnu stranu</a>', 'roots'), home_url()); ?></li>
  <li><?php _e('Kliknite na <a href="javascript:history.back()">Nazad</a> dugme', 'roots'); ?></li>
</ul>

<?php get_search_form(); ?>
