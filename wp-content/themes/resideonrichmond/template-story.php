<?php
    /*
     * Template Name: Template Story
     */
?>
<?php  get_header(); ?>

<div class="mainHolder">

    <!-- Hero section -->
    <?php $data_hero = get_field("s_hero");?>
    <?php if($data_hero) { ?>
        <section class="blockTopDark">

            <section class="elem_table hero heightMainHero " style=" background-image: url('<?php echo $data_hero['image']['sizes']['hero_v1']; ?>');">
                <?php include("inc/header.php"); ?>  
                <!--<div class="wrapHolder"></div>-->
                <div class="holder_info posCenter">
                    <?php if($data_hero['heading']) {?>
                        <h1 data-aos="zoom-in-up" data-aos-delay="100"><?php echo $data_hero['heading']; ?></h1>
                    <?php } ?>
                </div>
            </section>
        </section>
    <?php } ?>


    <!-- Reside block -->
    <?php $data_reside = get_field("s_reside");?>
    <?php if($data_reside) { ?>
        <section class="bar-top">
            <div class="wrapHolder">
                <div class="info">
                    
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
                    <div class="col-l"></div>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- Grid Block -->
    <?php $data_grid = get_field("s_grid");?>
    <?php if($data_grid) { ?>
        <section class="story_holder_grid">
            <div class="wrapHolderX">
                <div class="holder_grid">
                    <div class="container">
                        <!-- Row 1 -->
                        <?php                             
                            //Row 1
                            echo renderGrid($data_grid['item_1'], $className="left-t item", "single_v1", 0); //Box 1
                            echo renderGrid($data_grid['item_2'], $className="center-t item", "single_v1", 100); //Box 2
                            echo renderGrid($data_grid['item_3'], $className="right-t item", "single_v1", 200); //Box 3

                            //Row 2
                            echo renderGrid($data_grid['item_4'], $className="left-2-col item", "single_v1", 0); //Box 4
                            echo renderGrid($data_grid['item_5'], $className="big-right item", "block_2", 100); //Box 5
                            
                            //Row 3
                            echo renderGrid($data_grid['item_6'], $className="left-b item", "single_v1", 0); //Box 6
                            echo renderGrid($data_grid['item_7'], $className="center-b item", "single_v1", 100); //Box 7
                            echo renderGrid($data_grid['item_8'], $className="right-b item", "single_v1", 200); //Box 8
                        ?>      
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


   

    <!-- second hero -->
    <?php $data_neigh = get_field("s_block_neighbourhood"); ?>
    <?php if($data_neigh){ ?>
        <section class="">
            <div class="secondHero"  style=" background-image: url('<?php echo $data_neigh['image']['sizes']['hero_v1']; ?>">
                <div class="wrapHolder">
                    <div class="holder_infox content_rightCenter story">
                        <div  data-aos="zoom-in">
                            <?php if($data_neigh['heading']) { ?>
                                <h1><?php echo $data_neigh['heading']; ?></h1>
                            <?php } ?>

                            <?php if($data_neigh['sub_heading']) { ?>
                                <h2><?php echo $data_neigh['sub_heading']; ?></h2>
                            <?php } ?>
                                
                            <?php echo $data_neigh['description']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

<div>

<?php get_footer(); ?>