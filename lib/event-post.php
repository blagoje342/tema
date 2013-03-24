<?php

// 0. Base

add_action('admin_init', 'css_za_events');

function css_za_events() {
	wp_enqueue_style('css_za_events', get_bloginfo('template_directory') . '/assets/css/manager.css');
}

// Kreiranje custom posta za smešta

add_action('init', 'event_post');

function event_post() {

// Argumenti potrebni za lto post

$args = array(
  'label' => __('Dešavanja'),
  'singular_label' => __('Dešavanje'),
  'public' => true,
  'show_ui' => true,
  'capability_type' => 'post',
  'hierarchical' => true,
  'has_archive' => true, 
  'show_in_nav_menus'  => true,
  'supports' => array('title', 'excerpt', 'editor', 'thumbnail'),
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
  return $post->ID;

  $dogadjaji = get_post_custom($post->ID);
  $naziv = $dogadjaji["naziv"][0];
  $mesto = $dogadjaji["mesto"][0];
  $pocetak = $dogadjaji["pocetak"][0];
  $zavrsetak = $dogadjaji["zavrsetak"][0];
  $broj_telefona = $dogadjaji["broj_telefona"][0];
  $fax= $dogadjaji["fax"][0];
  $mejl= $dogadjaji["mejl"][0];


  $date_format = get_option('date_format'); // Not required in my code

  $clean_pocetak = date($date_format, $pocetak);
  $clean_zavrsetak= date($date_format, $zavrsetak);

?>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="/resources/demos/style.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#pocetak, #zavrsetak, #dp6' ).datepicker({ dateFormat: "dd.mm.yy", firstDay:1 });
  });  
</script>

<div class="manager-extras">
<div><label>Naziv dogadjaja</label><input name="naziv" value="<?php echo $naziv; ?>" /></div>
<div><label>Mesto održavanja</label><input name="mesto" value="<?php echo $mesto; ?>" /></div>
<div><label>Datum početka</label><input id="pocetak" name="pocetak" data-date-format="dd.mm.yyyy" value="<?php echo $clean_pocetak; ?>" /></div>
<div><label>Datum zavrsetka</label><input id="zavrsetak" name="zavrsetak" value="<?php echo $clean_zavrsetak; ?>" /></div>
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
      return $post->ID;
  }else{
    update_post_meta($post->ID, "naziv", $_POST["naziv"]);
    update_post_meta($post->ID, "mesto", $_POST["mesto"]);

  $update_pocetak = strtotime( $_POST["pocetak"]);
    update_post_meta($post->ID, "pocetak", $update_pocetak);
  $update_zavrsetak= strtotime( $_POST["zavrsetak"]);
    update_post_meta($post->ID, "zavrsetak", $update_zavrsetak);
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
    "naziv" => "Događaj",
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
  $dogadjaji = get_post_custom();
  switch ($column)
  {
    case "naziv":
         echo $dogadjaji["naziv"][0];
         break;

    case "description":
         the_content();
         break;
    
    case "mesto":
         echo $dogadjaji["mesto"][0];
         break;

    case "pocetak":
          $startd = $dogadjaji["pocetak"][0];
          $endd = $dogadjaji["zavrsetak"][0];
          $startdate = date(get_option('date_format'), $startd);
          $enddate = date(get_option('date_format'), $endd);
          echo $startdate . '<br /><em>' . $enddate . '</em>';
         break;
 
     case "zavrsetak":
         echo $dogadjaji["zavrsetak"][0];
         break;
  
    case "broj_telefona":
         echo $dogadjaji["broj_telefona"][0];
         break;
  
    case "fax":
         echo $dogadjaji["fax"][0];
         break;

    case "mejl":
         echo $dogadjaji["mejl"][0];
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
