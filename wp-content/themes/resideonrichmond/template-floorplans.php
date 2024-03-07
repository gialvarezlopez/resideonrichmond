<?php
    /*
     * Template Name: Template Floorplans
     */
?>
<?php  get_header(); ?>

<?php $data_options = get_field("fl_options");?>
<div class="mainHolder">

    <section class="blockTop">

        <section class="no-hero hide-mobilex">
            <?php $logo_dark = true; ?>
            <?php include("inc/header.php"); ?>  
            <div class="wrapHolder">
                <div class="holder_info posCenter"  data-aos="fade-up" data-aos-delay="400">
                    <?php if($data_options['heading']) { ?>
                    <h1><?php echo $data_options['heading']; ?></h1>
                    <?php } ?>
                    
                    <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                </div>
            </div>
        </section>
    </section>


    <?php //echo $_SERVER['DOCUMENT_ROOT'].'/<?php echo get_stylesheet_directory_uri(); ?>
    <section class="floorplans_holder">
        <div class="wrapHolder">
            <div class="">

            <?php $display_item = get_field('fl_options')['display_item_to_show']; ?>
            <?php $item_to_show = ($display_item)?$display_item:4;?>
            <?php $order_by =  get_field('fl_options')['order_by']; ?>
            <?php $order_by =  isset($order_by)?$order_by:"ASC"; ?>
            <?php 
                $args = array( 
                    'post_type' => 'floorplans', 
                    'post_status' => 'publish',
                    'posts_per_page' => $item_to_show,
                    //'posts_per_page' => -1,
                    'orderby'     => 'post_date',
                    'order'       => $order_by, //'DESC',
                    //'orderby'     => 'ID'
                    
                );
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) : ?>
                    <div class="grid" id="list_flooplants">
                        <?php $numberProject = 1; ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        
                            <div class="child">
                                    <?php 
                                        $url_poster = "";
                                        if ( has_post_thumbnail() ) {
                                            //the_post_thumbnail_url ( 'gallery_project' ); this no return the url
                                            $url_poster = get_the_post_thumbnail_url( null, 'single_v1' ); //This return the url
                                            $large_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                                        }
                                    ?>
                                    <div class="holder_image">
                                        <img src="<?php echo $large_image; ?>" class="img-fluid">
                                    </div>
                                    <h3><?php the_title(); ?></h3>
                                    <div class="features">
                                        <div><?php echo get_field("beds");?> Bed</div>
                                        <div><?php echo get_field("baths");?> Bath</div>
                                        <div><?php echo get_field("sqft");?> Sq. ft</div>
                                    </div>
                                    <a href="#" class="btn btn-brown opemModalFloorplan" data-fullimage='<?php echo $large_image; ?>'>View</a>
                            </div>
                
                        <?php endwhile;
                        wp_reset_postdata(); 
                    ?>
                    </div>
                <?php else: ?>
                <p class="text-center"><?php _e( 'Sorry, no posts matched.' ); ?></p>
                <?php endif; 
            ?>
            </div>

            <div class="holder_load_more">
                <input type="hidden" id="load_item" value="<?php echo $item_to_show;?>">
                <input type="hidden" id="order_by" value="<?php echo $order_by;?>">
                <div class="content">
                    <a href="#" class="btn btn-brown" id="view_more_floorplans">View More</a>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/loading.svg" class="loading_floorplans">
                </div>
            </div>
        </div>
    </section>

    <?php  include ("inc/modal-floorplans.php"); ?>

<div>

<?php get_footer(); ?>