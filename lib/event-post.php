<?php


// Kreiranje custom posta za smešta

add_action('init', 'event_post');

function event_post() {

// Argumenti potrebni za lto post

$args = array(
'label' => __('Dešavanja'),
'singular_label' => __('Dešavanja'),
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => true,
'has_archive' => true, 
'show_in_nav_menus'  => true,
'supports' => array('title', 'editor', 'thumbnail'),
'rewrite' => array('slug' => 'dogadjaji', 'with_front' => false), );
//Register type and taxonomy category
register_post_type('event', $args);
}

register_taxonomy("tip_dogadjaja", array("event"),
array("hierarchical" => true, "label" => "dogadjaji podele", "rewrite" => true, "slug" => 'tipovi-dogadjaja'));

//izostavljen deo add_theme_support

add_action('admin_init', 'event_manager_add_meta');

function event_manager_add_meta(){
add_meta_box("event_meta", "dogadjaji osnovni podaci",
"event_manager_meta_options", "event", "normal", "high");
}

function event_manager_meta_options() {
global $post;
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
return $post_id;

$custom = get_post_custom($post->ID);
$naziv = $custom["naziv"][0];
$mesto = $custom["mesto"][0];
$pocetak = $custom["pocetak"][0];
$zavrsetak = $custom["zavrsetak"][0];
$broj_telefona = $custom["broj_telefona"][0];
$fax= $custom["fax"][0];
$mejl= $custom["mejl"][0];
?>

<style type="text/css">
<?php include locate_template('assets/css/manager.css'); ?>
</style>

<div class="manager-extras">
<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
  <input id="date" class="span2" size="16" type="text" value="12-02-2012">
  <span class="add-on"><i class="icon-th"></i></span>
</div>

<div><label>Naziv dogadjaja</label><input name="naziv" value="<?php echo $naziv; ?>" /></div>
<div><label>Mesto održavanja</label><input name="mesto" value="<?php echo $mesto; ?>" /></div>
<div><label>Datum početka</label><input name="pocetak" value="<?php echo $pocetak; ?>" /></div>
<div><label>Datum zavrsetka</label><input name="zavrsetak" value="<?php echo $zavrsetak; ?>" /></div>
<div><label>Broj telefona</label><input name="broj_telefona" value="<?php echo $broj_telefona; ?>" /></div>
<div><label>Fax</label><input name="Fax" value="<?php echo $fax; ?>" /></div>
<div><label>Mejl</label><input name="Mejl" value="<?php echo $mejl; ?>" /></div>
</div>


<?php
}


add_action('save_post', 'event_manager_save_extras');

function event_manager_save_extras() {
  global $post;

 if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    //if you remove this line sky will fall on your head.
      return $post_id;
  }else{
    update_post_meta($post->ID, "naziv", $_POST["naziv"]);
    update_post_meta($post->ID, "mesto", $_POST["mesto"]);
    update_post_meta($post->ID, "pocetak", $_POST["pocetak"]);
    update_post_meta($post->ID, "zavrsetak", $_POST["zavrsetak"]);
    update_post_meta($post->ID, "broj_telefona", $_POST["broj_telefona"]);
    update_post_meta($post->ID, "fax", $_POST["fax"]);
    update_post_meta($post->ID, "mejl", $_POST["mejl"]);
  }
}

add_filter("manage_edit-event_columns", "event_manager_edit_columns");

function event_manager_edit_columns($columns) {
  $columns = array(
    "cb" => "<input type=\"checkbox\"/>",
    "title" => "Dešavanja",
    "naziv" => "Dogadjaj",
    "mesto" => "Mesto",
    "pocetak" => "Početak",
    "zavrsetak" => "Zavrsetak",
    "description" => "Opis",
    "broj_telefona" => "Broj telefona",
    "fax" => "Fax",
    "mejl" => "mejl",
    "cat" => "Kategorija",

   );
  return $columns;
}

add_action("manage_event_posts_custom_column", "event_manager_custom_columns");

function event_manager_custom_columns($column) {
  global $post;
  $custom = get_post_custom();
  switch ($column)
  {
    case "naziv":
         echo $custom["naziv"][0];
         break;

    case "description":
         the_content();
         break;
    
    case "mesto":
         echo $custom["mesto"][0];
         break;
  
    case "broj_telefona":
         echo $custom["broj_telefona"][0];
         break;
  
    case "fax":
         echo $custom["fax"][0];
         break;

    case "mejl":
         echo $custom["mejl"][0];
         break;

     case "cat":
         echo get_the_term_list($post->ID, 'tip_dogadjaja'); 
         break;


  }
}

add_action('init', 'event_rewrite');

function event_rewrite() {
  global $wp_rewrite;
  $wp_rewrite->add_permastruct('typename', 'typename/%year%/%postname%/', true, 1);
  add_rewrite_rule('typename/([0-9]{4})/(.+)/?$', 'index.php?typename=$matches[2]', 'top');
  $wp_rewrite->flush_rules();
}
