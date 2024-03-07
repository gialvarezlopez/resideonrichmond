<?php
//Implement Cookie with HTTPOnly and Secure flag in WordPress

function moment_settings(){
	//Featured Image
	add_theme_support('post-thumbnails');

	//===================
	//Sizes custom
    //===================
    add_image_size('hero_v1', 1680,834, true); //Crop with true, General, Home, story, neighbourhood, amenities, the collab
    add_image_size('hero_v2', 1680,750, true); //Crop with true, amenities 
    add_image_size('block_1', 943,834, true); //Crop with true, Home(grid)
    add_image_size('block_2', 1120,560, true); //Crop with true, Home(grid)

    add_image_size('block_3', 1223,834, true); //Crop with true, Home(grid), amenities, suites(block), the collab
    
    add_image_size('single_v1', 560,560, true); //Crop with true, story(grid), neighbourhood(grid)
    add_image_size('single_v2', 1120,560, true); //Crop with true, story(grid), neighbourhood(grid)

    add_image_size('single_v3', 859,768, true); //Crop with true, suites
    add_image_size('single_v4', 484,449, true); //Crop with true, suites
    add_image_size('single_v5', 609,612, true); //Crop with true, home(location)

    add_image_size('floorplans', 331,352, true); //Crop with true, floorplans


}

add_action('after_setup_theme','moment_settings');

/* CSS and JS */
function moment_styles(){
	//==============================
	//Add style page
	//==============================
    
	wp_enqueue_style("fonts", get_template_directory_uri().'/fonts/stylesheet.css',array(),'1.0.0');
    wp_enqueue_style("reset", get_template_directory_uri().'/css/reset.css',array(),'1.0.0');


    //Main theme CSS
    wp_enqueue_style("theme", get_template_directory_uri().'/css/theme.css',array(),'1.0.37');


    //==============================
	//Main Scripts
	//==============================
    wp_enqueue_script('script-js',get_template_directory_uri()."/js/script.js", array('jquery'), '1.0.17', true);


    //Ajax
    wp_localize_script( 'script-js', 'ajax_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
    ) );
    
}
add_action("wp_enqueue_scripts", "moment_styles");



/*Menus*/
function moment_menus(){
    register_nav_menus( array(
        'header-menu' => 'Header Menu',
    ));
}
add_action("init","moment_menus" );


//add_action('acf/init', 'my_acf_op_init');

if( function_exists('acf_add_options_page') ) {
    
    $parent =  acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}



function printBtn($arrLink, $defaultClasses, $id="")
{
    
    $classLink = "";
    $openTarget = "";
    $link = $arrLink;
    if ($link) {
        //echo $link['url'];
        if ($link['url'] == "#") {
            if($id != "")
            {
                $classLink = "";
            }else{
                $classLink = "btn-open-register";
            }
            
        } else {
            $openTarget = "target='" . $link['target'] . "'";
        }

        $btnLink = "<a id='".$id."' href='" . $link['url'] . "' class='".$defaultClasses." ". $classLink . "' " . $openTarget . ">" . $link['title'] . "</a>";
        return $btnLink;
    }
    
}



function renderGrid($data_grid_item, $className="", $size, $delay)
{
    $html_grid = "";
    if($delay > 0){
        $data_delay = "data-aos-delay='".$delay."'";
    }
    if( $data_grid_item['option'] == "image")
    {    
        $html_grid .="<div class='".$className."' data-aos='fade-up'  $data_delay >";
            $html_grid .="<figure class='circleEffect'><img src='".$data_grid_item['image']['sizes'][$size]."' class='img-fluid'></figure>";
        $html_grid .="</div>";
    }else
    {
        $background_color = $data_grid_item['background_color'];
        $text_color = $data_grid_item['text_color'];
        $set_style = "background-color:$background_color; color:$text_color;";

        $html_grid .= "<div class='".$className."' style='".$set_style."' data-aos='fade-up' $data_delay>";
            $html_grid .= "<h2>".$data_grid_item['heading']."</h2>";
        $html_grid .= "</div>";
    }
    echo $html_grid;
}





//===============================================================================================
//Pagination
//===============================================================================================
add_action( 'wp_ajax_pagination-load-posts', 'pagination_load_posts' );

add_action( 'wp_ajax_nopriv_pagination-load-posts', 'pagination_load_posts' ); 

function pagination_load_posts() {

    global $wpdb;
    // Set default variables
    $msg = '';

    if(isset($_POST['page'])){
        // Sanitize the received page   
        $per_page = sanitize_text_field($_POST['page']);
        $order_by = sanitize_text_field($_POST['order_by']);
        $start = sanitize_text_field($_POST['startFrom']);;
        //$cur_page = $page;
        //$page -= 1;
        // Set the number of results to display
        //$per_page = 4;
        //$previous_btn = true;
        //$next_btn = true;
        //$first_btn = true;
        //$last_btn = true;
        //echo $start = $page * $per_page;

        // Set the table where we will be querying data
        $table_name = $wpdb->prefix . "posts";

        // Query the necessary posts
        //echo  "SELECT * FROM  $table_name WHERE post_type = 'floorplans' AND post_status = 'publish' ORDER BY post_date DESC LIMIT  $start $per_page";

        $all_blog_posts = $wpdb->get_results($wpdb->prepare("
            SELECT * FROM " . $table_name . " WHERE post_type = 'floorplans' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );

        // At the same time, count the number of queried posts
        //$count = $wpdb->get_var($wpdb->prepare("
            //SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'floorplans' AND post_status = 'publish'", array() ) );

        /*
         * Use WP_Query:
         **/
        $all_blog_posts = new WP_Query(
            array(
                'post_type'         => 'floorplans',
                'post_status '      => 'publish',
                'posts_per_page'    => $per_page,
                'offset'            => $start,
                'orderby'           => 'post_date',
                'order'             => $order_by, //'DESC',
                
            )
        );
        /*
        $count = new WP_Query(
            array(
                'post_type'         => 'post',
                'post_status '      => 'publish',
                'posts_per_page'    => -1
            )
        );
        */

        // Loop into all the posts
        //var_dump($all_blog_posts);
        $numPros = 0;
        //foreach($all_blog_posts as $key => $post):
        $html = "";
        while ( $all_blog_posts->have_posts() ) : $all_blog_posts->the_post(); 

            // Set the desired output into a variable 
           

            $html .="<div class='child'>";
             
                    $url_poster = "";
                    if ( has_post_thumbnail() ) {
                                            //the_post_thumbnail_url ( 'gallery_project' ); this no return the url
                        $url_poster = get_the_post_thumbnail_url( null, 'single_v1' ); //This return the url
                        $large_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    }
                
                $html .= "<div class='holder_image'>";
                    $html .= "<img src='".$large_image."' class='img-fluid'>";
                $html .="</div>";
                $html .="<h3>".get_the_title()."</h3>";
                $html .="<div class='features'>";
                $html .="<div>".get_field("beds")." Bed</div>";
                $html .="<div>".get_field("baths")." Bath</div>";
                $html .="<div>".get_field("sqft")." Sq. ft</div>";
                $html .="</div>";
                $html .="<a href='#' class='btn btn-brown opemModalFloorplan' data-fullimage='".$large_image."'>View</a>";
            $html .="</div>";
        
            $numPros++;       
        endwhile;
        wp_reset_postdata();
        //endforeach;
       

        wp_send_json( 
            array( 
              'html' =>  $html,
              'items' => $numPros,
            )
        );
        // Always exit to avoid further execution
        wp_die();

    }
    
   
}


function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');



//After submit Register form



