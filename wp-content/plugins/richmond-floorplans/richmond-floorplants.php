<?php
/*
    Plugin Name: Floorplans - Post Types
    Plugin URI: expertel.ca
    Description: Add Post Types into website
    Version: 1.0.0
    Author: Gio Alvarez
    Author URI: 
    Text Domain: resideonrichmond
*/

if(!defined('ABSPATH')) die();

// Registrar Custom Post Type
function resideonrichmond_floorplans_post_type() {

	$labels = array(
		'name'                  => _x( 'Floorplans', 'Post Type General Name', 'resideonrichmond' ),
		'singular_name'         => _x( 'Floorplan', 'Post Type Singular Name', 'resideonrichmond' ),
		'menu_name'             => __( 'Floorplans', 'resideonrichmond' ),
		'name_admin_bar'        => __( 'Floorplan', 'resideonrichmond' ),
		'archives'              => __( 'Archives', 'resideonrichmond' ), 
		'attributes'            => __( 'Attributes', 'resideonrichmond' ), 
		'parent_item_colon'     => __( 'Parent Floorplan', 'resideonrichmond' ), 
		'all_items'             => __( 'Floorplans', 'resideonrichmond' ), 
		'add_new_item'          => __( 'Add New Floorplan', 'resideonrichmond' ),
		'add_new'               => __( 'Add New', 'resideonrichmond' ), 
		'new_item'              => __( 'New Floorplan', 'resideonrichmond' ), 
		'edit_item'             => __( 'Edit Floorplan', 'resideonrichmond' ), 
		'update_item'           => __( 'Update Floorplan', 'resideonrichmond' ),
		'view_item'             => __( 'View Floorplan', 'resideonrichmond' ), 
		'view_items'            => __( 'View Floorplans', 'resideonrichmond' ),
		'search_items'          => __( 'Buscar Clase', 'resideonrichmond' ), 
		'not_found'             => __( 'No floorplans found.', 'resideonrichmond' ), 
		'not_found_in_trash'    => __( 'No floorplans found in Trash.', 'resideonrichmond' ), 
		'featured_image'        => __( 'Featured Image', 'resideonrichmond' ),
		'set_featured_image'    => __( 'Save Featured Image', 'resideonrichmond' ), 
		'remove_featured_image' => __( 'Remove Featured Image', 'resideonrichmond' ),
		'use_featured_image'    => __( 'Use as Featured Image', 'resideonrichmond' ),
		'insert_into_item'      => __( 'Insert into floorplans', 'resideonrichmond' ),
		'uploaded_to_this_item' => __( 'Uploaded to this floorplans', 'resideonrichmond' ), 
		'items_list'            => __( 'Floorplans list', 'resideonrichmond' ), 
		'items_list_navigation' => __( 'Floorplans list navigation', 'resideonrichmond' ),
		'filter_items_list'     => __( 'Filter Floorplans', 'resideonrichmond' ), 
	);
	$args = array(
		'label'                 => __( 'Floorplan', 'resideonrichmond' ),
		'description'           => __( 'Floorplans for website', 'resideonrichmond' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'          => true, // true = posts , false = paginas
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        //'menu_position'         => 6,
        'menu_icon'             => 'dashicons-grid-view',
		//'menu_icon' 			=> get_stylesheet_directory_uri() . '/article16.png', 
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',

		// This is where we add taxonomies to our CPT
        //'taxonomies'          => array( 'category', 'post_tag' ),
	);
	register_post_type( 'floorplans', $args ); //wporg_ is required before the name
	//flush_rewrite_rules();// If that doesn’t work you can add a line of code after you register the post type:

	//This add categories only for the custom post type
	register_taxonomy("categories", array("floorplans"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => array( 'slug' => 'floorplans', 'with_front'=> false )));
	//register_taxonomy("tag", array("wporg_floorplans"), array("hierarchical" => true, "label" => "Tags", "singular_label" => "Tag", "rewrite" => array( 'slug' => 'floorplans', 'with_front'=> false )));
}
add_action( 'init', 'resideonrichmond_floorplans_post_type', 0 );





add_action("admin_init", "admin_init");

function admin_init(){
	//add_meta_box("year_completed-meta", "Year Completed", "year_completed", "floorplans", "side", "low");
	add_meta_box("credits_meta", "Features", "credits_meta", "floorplans", "normal", "low");
  }
/*  
  function year_completed(){
	global $post;
	$custom = get_post_custom($post->ID);
	$year_completed = $custom["year_completed"][0];
	?>
	<label>Year:</label>
	<input name="year_completed" value="<?php echo $year_completed; ?>" />
	<?php
  }
  */
  
  function credits_meta() {
	global $post;
	$custom = get_post_custom($post->ID);
	$beds = $custom["beds"][0];
	$baths = $custom["baths"][0];
	$sqft = $custom["sqft"][0];
	?>
	<p>
		<label>Beds:</label>
		<input type="text" name="beds" value="<?php echo $beds; ?>">
  	</p>
	<p>
		<label>Baths:</label>
		<input type="text" name="baths" value="<?php echo $baths; ?>">
	</p>
	<p>
		<label>Sq ft:</label>
		<input type="text" name="sqft" value="<?php echo $sqft; ?>">
	</p>
	<?php
  }


  //Save data
  add_action('save_post', 'save_details');
  function save_details(){
	global $post;
  
	update_post_meta($post->ID, "year_completed", $_POST["year_completed"]);
	update_post_meta($post->ID, "beds", $_POST["beds"]);
	update_post_meta($post->ID, "baths", $_POST["baths"]);
	update_post_meta($post->ID, "sqft", $_POST["sqft"]);
  }


//Add columns in admin
/*

add_action("manage_posts_custom_column",  "portfolio_custom_columns");
add_filter("manage_edit-wporg_floorplans_columns", "portfolio_edit_columns");

function portfolio_edit_columns($columns){
  $columns = array(
    "cb" => "<input type='checkbox' />",
    "title" => "Floorplans",
    "description" => "Description",
    "year" => "Year Completed",
    "skills" => "Skills",
  );

  return $columns;
}
function portfolio_custom_columns($column){
  global $post;

  switch ($column) {
    case "description":
      the_excerpt();
      break;
    case "year":
      echo $custom = get_post_custom();
      //echo $custom["year_completed"][0];
      break;
    case "skills":
      echo get_the_term_list($post->ID, 'Skills', '', ', ','');
      break;
  }
}
*/

