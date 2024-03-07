<?php
    /*
     * Template Name: Template Neighbourhood
     */
?>
<?php  get_header(); ?>

<div class="mainHolder">

    <!-- Hero section -->
    <?php $data_hero = get_field("n_hero");?>
    <?php if($data_hero) { ?>
        <section class="blockTopDark">

            <section class="elem_table hero heightMainHero " style=" background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo $data_hero['image']['sizes']['hero_v1']; ?>');">
                <?php include("inc/header.php"); ?>  
                <!-- <div class="wrapHolder"></div> -->
                <div class="holder_info posCenter"  >
                    <?php if($data_hero['heading']) {?>
                        <h1 data-aos="zoom-in-up" ><?php echo $data_hero['heading']; ?></h1>
                    <?php } ?>
                    <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                </div>
            </section>
        </section>
    <?php } ?>

    <!-- Reside Block -->
    <?php $data_reside = get_field("n_reside"); ?>
    <?php if($data_reside){ ?>
        <section class="bar-top neighbourhood">
            <div class="wrapHolder">
                <div class="info right">
                    <div class="col-l"></div>
                    <div class="col-content" data-aos="zoom-in">
                        <?php if($data_reside['heading']) {?>
                            <h1><?php echo $data_reside['heading']; ?></h1>
                        <?php } ?>
                        <?php if($data_reside['sub_heading']) {?>
                            <h2><?php echo $data_reside['sub_heading']; ?></h2>
                        <?php } ?>
                        <?php if($data_reside['description']) {?>
                            <div class="description"><?php echo $data_reside['description']; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


    <?php $data_grid = get_field("n_grid");?>
    <?php if($data_grid) { ?>
        <section>
            <div class="wrapHolderX">
                <div class="holder_grid_v2">

                    <div class="container">

                        <?php                             
                            //Row 1
                            echo renderGrid($data_grid['item_1'], $className="big-left-t item", "block_2", 0); //Box 1
                            echo renderGrid($data_grid['item_2'], $className="right-t item", "single_v1", 100); //Box 2

                            //Row 2
                            echo renderGrid($data_grid['item_3'], $className="left-m item", "single_v1", 0); //Box 3
                            echo renderGrid($data_grid['item_4'], $className="center-m item", "single_v1", 100); //Box 4
                            echo renderGrid($data_grid['item_5'], $className="right-m item", "single_v1", 200); //Box 5
                                
                            //Row 3
                            echo renderGrid($data_grid['item_6'], $className="left-b item", "single_v1", 0); //Box 6
                            echo renderGrid($data_grid['item_7'], $className="big-right-b item", "block_2", 100); //Box 7

                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


   

    <!-- Locations - blocks 2 -->
    <?php $data_location = get_field("n_locations"); ?>
    <?php if($data_location) { ?>
        <section class="content_blocks_bg vh bg_aqua">
            <div class="content">
                <div class="wrapHolder">
                    <div class="setRow list">
                        <div class="info">
                            <div class="description">
                                <div id="neighbourhood_features" class="neighbourhood_features  remove-aos-for-mobile" data-aosxxxxxx="fade-up">
                                    
                                        <?php 
                                            if( isset($data_location['item']))
                                            {
                                                foreach($data_location['item'] as $item)
                                                {
                                                   ?>
                                                   <div class="feature">
                                                    <h4><?php echo $item['name']; ?></h4>
                                                    <div class="items">
                                                        <ul>
                                                            <li><?php echo $item['items']; ?></li>
                                                        </ul>
                                                    </div>
                                                   </div>
                                                   <?php
                                                }
                                            }
                                        
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
            <div class="setRow parent_ken">
                <div class="holder_color"></div>
                <!-- <div class="holder_image ken" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('<?php echo $data_location['image']['url']; ?>');"> -->
                    <!-- <h3 class="spaceName">Co-working Space</h3> -->
                <div class="holder_image">    
                    <img src="<?php echo $data_location['image']['url']; ?>" class="">
                </div>
            <div>
        </section>
    <?php } ?>
<div>

<?php get_footer(); ?>