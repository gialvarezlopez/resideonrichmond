<?php
    /*
     * Template Name: Template The Collab
     */
?>
<?php  get_header(); ?>

<div class="mainHolder">
    <!-- Hero section -->
    <?php $data_hero = get_field("tc_hero");?>
    <?php if($data_hero) { ?>

        <section class="blockTopDark">

            <section class="elem_table hero heightMainHero" style=" background-image: url('<?php echo $data_hero['image_full']['sizes']['hero_v1']; ?>');">
                <?php include("inc/header.php"); ?>  
                <!--
                <div class="dinamic_img" >
                    <?php /*if($data_hero['image_people']) { ?>
                        <div class="wrapHolder" data-aos="fade-up" data-aos-delay="50">
                            <img src="<?php echo $data_hero['image_people']['url']; ?>" class="img-fluid">
                        </div>
                    <?php } */?>
                </div>
                -->
                <div class="holder_info posCenter">
                    <?php if($data_hero['heading']) { ?>
                        <h1 class="yellow" data-aos="zoom-in-up" data-aos-delay="100"><?php echo $data_hero['heading']; ?></h1>
                        <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                    <?php } ?>
                </div>
            </section>
        </section>
<?php } ?>    

    <!-- Yellow bar -->
    <?php $data_reside = get_field("tc_block_reside"); ?>
    <?php if($data_reside){ ?>
        <section class="bar-top collab">
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

    <?php $data_partnership = get_field("partnership"); ?>
    <?php if($data_partnership) { ?>
        <section class="bar-partnership">
            <div class="wrapHolder" data-aos="zoom-in">
                <?php if($data_partnership['heading']) {?>
                        <h1><?php echo $data_partnership['heading']; ?></h1>
                <?php } ?>
            </div>
        </section>

        <?php 
            if(isset($data_partnership['sections']) && count($data_partnership['sections']) > 0)
            {

                $startFrom = 1;
                get_template_part('template-parts/block-content',
                    $arg, 
                    array( 
                        'my_data' => array(
                            'sections' => $data_partnership['sections'],
                            'startFrom' => $startFrom, 
                            'leftContentPosition'=>''  
                        )
                    ) 
                ); 

            }
        ?>


    <?php } ?>


<div>

<?php get_footer(); ?>