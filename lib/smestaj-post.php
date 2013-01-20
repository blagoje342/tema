<?php


// Kreiranje custom posta za smešta

add_action('init', 'smestaj_post');

function smestaj_post() {

// Argumenti potrebni za smeštaj post

$args = array(
'label' => __('Smeštaj'),
'singular_label' => __('Smeštaj'),
'public' => true,
'show_ui' => true,
'capability_type' => 'post',
'hierarchical' => true,
'has_archive' => true, 
'show_in_nav_menus'  => true,
'supports' => array('title', 'editor', 'thumbnail'),
'rewrite' => array('slug' => 'smestaj', 'with_front' => false), );
//Register type and taxonomy category
register_post_type('smestaj', $args);
}

register_taxonomy("tip_smestaja", array("smestaj"),
array("hierarchical" => true, "label" => "Smeštaj podele", "rewrite" => true, "slug" => 'tipovi-smestaja'));

//izostavljen deo add_theme_support

add_action('admin_init', 'smestaj_manager_add_meta');

function smestaj_manager_add_meta(){
add_meta_box("smestaj_meta", "Smeštaj osnovni podaci",
"smestaj_manager_meta_options", "smestaj", "normal", "high");
}

function smestaj_manager_meta_options() {
global $post;
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
return $post_id;

$custom = get_post_custom($post->ID);
$domacinstvo = $custom["domacinstvo"][0];
$mesto = $custom["mesto"][0];
$broj_telefona = $custom["broj_telefona"][0];
$broj_soba= $custom["broj_soba"][0];
?>

<style type="text/css">
<?php include locate_template('assets/css/manager.css'); ?>
</style>

<div class="manager-extras">

<div><label>Domaćinstvo</label><input name="domacinstvo" value="<?php echo $domacinstvo; ?>" /></div>
<div><label>Mesto</label><input name="mesto" value="<?php echo $mesto; ?>" /></div>
<div><label>Broj telefona</label><input name="broj_telefona" value="<?php echo $broj_telefona; ?>" /></div>
<div><label>Broj soba</label><input name="broj_soba" value="<?php echo $broj_soba; ?>" /></div>
</div>
<?php
}

add_action('save_post', 'smestaj_manager_save_extras');

function smestaj_manager_save_extras() {
  global $post;

 if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
    //if you remove this line sky will fall on your head.
      return $post_id;
  }else{
    update_post_meta($post->ID, "domacinstvo", $_POST["domacinstvo"]);
    update_post_meta($post->ID, "mesto", $_POST["mesto"]);
    update_post_meta($post->ID, "broj_telefona", $_POST["broj_telefona"]);
    update_post_meta($post->ID, "broj_soba", $_POST["broj_soba"]);
  }
}

add_filter("manage_edit-smestaj_columns", "smestaj_manager_edit_columns");

function smestaj_manager_edit_columns($columns) {
  $columns = array(
    "cb" => "<input type=\"checkbox\"/>",
    "title" => "Smeštaj",
    "description" => "Opis",
    "mesto" => "Mesto",
    "broj_telefona" => "Broj telefona",
    "broj_soba" => "Broj soba",
    "domacinstvo" => "Domaćinstvo",
    "cat" => "Kategorija",

   );
  return $columns;
}

add_action("manage_smestaj_posts_custom_column", "smestaj_manager_custom_columns");

function smestaj_manager_custom_columns($column) {
  global $post;
  $custom = get_post_custom();
  switch ($column)
  {
    case "description":
         the_excerpt();
         break;
    
    case "mesto":
         echo $custom["mesto"][0];
         break;
  
     case "broj_telefona":
         echo $custom["broj_telefona"][0];
         break;
  
     case "broj_soba":
         echo $custom["broj_soba"][0];
         break;

    case "domacinstvo":
         echo $custom["domacinstvo"][0];
         break;

     case "cat":
         echo get_the_term_list($post->ID, 'tip_smestaja'); 
         break;


  }
}

add_action('init', 'smestaj_rewrite');

function smestaj_rewrite() {
  global $wp_rewrite;
  $wp_rewrite->add_permastruct('typename', 'typename/%year%/%postname%/', true, 1);
  add_rewrite_rule('typename/([0-9]{4})/(.+)/?$', 'index.php?typename=$matches[2]', 'top');
  $wp_rewrite->flush_rules();
}
