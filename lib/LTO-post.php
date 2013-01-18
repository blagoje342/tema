<?php


// Kreiranje custom posta za smešta

add_action('init', 'LTO_post');

function LTO_post() {

// Argumenti potrebni za lto post

$args = array(
'label' => __('LTO'),
'singular_label' => __('LTO'),
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => true,
'has_archive' => true, 
'show_in_nav_menus'  => true,
'supports' => array('title', 'editor', 'thumbnail'),
'rewrite' => array('slug' => 'lto', 'with_front' => false), );
//Register type and taxonomy category
register_post_type('LTO', $args);
}

register_taxonomy("tip_LTOa", array("LTO"),
array("hierarchical" => true, "label" => "LTO podele", "rewrite" => true, "slug" => 'tipovi-LTOa'));

//izostavljen deo add_theme_support

add_action('admin_init', 'LTO_manager_add_meta');

function LTO_manager_add_meta(){
add_meta_box("LTO_meta", "LTO osnovni podaci",
"LTO_manager_meta_options", "LTO", "normal", "high");
}

function LTO_manager_meta_options() {
global $post;
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
return $post_id;

$custom = get_post_custom($post->ID);
$adresa = $custom["adresa"][0];
$mesto = $custom["mesto"][0];
$broj_telefona = $custom["broj_telefona"][0];
$fax= $custom["fax"][0];
$mejl= $custom["mejl"][0];
?>

<style type="text/css">
<?php include locate_template('assets/css/LTO-manager.css'); ?>
</style>

<div class="LTO-manager-extras">

<div><label>Adresa</label><input name="adresa" value="<?php echo $adresa; ?>" /></div>
<div><label>Mesto</label><input name="mesto" value="<?php echo $mesto; ?>" /></div>
<div><label>Broj telefona</label><input name="broj_telefona" value="<?php echo $broj_telefona; ?>" /></div>
<div><label>Fax</label><input name="Fax" value="<?php echo $fax; ?>" /></div>
<div><label>Mejl</label><input name="Mejl" value="<?php echo $mejl; ?>" /></div>
</div>
<?php
}

add_action('save_post', 'LTO_manager_save_extras');

function LTO_manager_save_extras() {
  global $post;

 if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    //if you remove this line sky will fall on your head.
      return $post_id;
  }else{
    update_post_meta($post->ID, "adresa", $_POST["adresa"]);
    update_post_meta($post->ID, "mesto", $_POST["mesto"]);
    update_post_meta($post->ID, "broj_telefona", $_POST["broj_telefona"]);
    update_post_meta($post->ID, "fax", $_POST["fax"]);
    update_post_meta($post->ID, "mejl", $_POST["mejl"]);
  }
}

add_filter("manage_edit-LTO_columns", "LTO_manager_edit_columns");

function LTO_manager_edit_columns($columns) {
  $columns = array(
    "cb" => "<input type=\"checkbox\"/>",
    "title" => "LTO",
    "description" => "Opis",
    "mesto" => "Mesto",
    "broj_telefona" => "Broj telefona",
    "fax" => "Fax",
    "adresa" => "Adresa",
    "mejl" => "mejl",
    "cat" => "Kategorija",

   );
  return $columns;
}

add_action("manage_LTO_posts_custom_column", "LTO_manager_custom_columns");

function LTO_manager_custom_columns($column) {
  global $post;
  $custom = get_post_custom();
  switch ($column)
  {
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

    case "adresa":
         echo $custom["adresa"][0];
         break;

     case "cat":
         echo get_the_term_list($post->ID, 'tip_LTOa'); 
         break;


  }
}

add_action('init', 'LTO_rewrite');

function LTO_rewrite() {
  global $wp_rewrite;
  $wp_rewrite->add_permastruct('typename', 'typename/%year%/%postname%/', true, 1);
  add_rewrite_rule('typename/([0-9]{4})/(.+)/?$', 'index.php?typename=$matches[2]', 'top');
  $wp_rewrite->flush_rules();
}
