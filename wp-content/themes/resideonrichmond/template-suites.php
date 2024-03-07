<?php
    /*
     * Template Name: Template Suites
     */
?>
<?php  get_header(); ?>

<div class="mainHolder">

    <!-- Hero section -->
    <?php $data_hero = get_field("suit_hero");?>
    <?php if($data_hero) { ?>
        <section class="blockTopDark">

            <section class="elem_table hero heightMainHero" style=" background-image: url('<?php echo $data_hero['image']['sizes']['hero_v1']; ?>');">
                <?php include("inc/header.php"); ?>  
                <div class="wrapHolder">
                    <div class="holder_info posCenter" >
                        <?php if($data_hero['heading']) {?>
                            <h1 data-aos="zoom-in-up" data-aos-delay="100"><?php echo $data_hero['heading']; ?></h1>
                        <?php } ?>
                        <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                    </div>
                </div>
            </section>
        </section>
    <?php } ?>    

    
    <?php $data_oasis = get_field("suit_block_oasis");?>
    <?php if($data_oasis) { ?>

        <!-- Yellow bar -->
        <section class="bar-top">
            <div class="wrapHolder">
                <div class="info right">
                    <div class="col-l"></div>
                    <div class="col-content widthcustom" data-aos="zoom-in">
                        <?php if($data_oasis['heading']) {?>
                            <h1><?php echo $data_oasis['heading']; ?></h1>
                        <?php } ?>
                        
                        <br>
                        <?php if($data_oasis['description']) {?>
                            <?php echo $data_oasis['description']; ?>
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- blocks 1 -->
        <?php 
            if(isset($data_oasis['sections']) && count($data_oasis['sections']) > 0)
            {
                $startFrom = 2;
                get_template_part('template-parts/block-content',
                    $arg, 
                    array( 
                        'my_data' => array(
                            'sections' => $data_oasis['sections'],
                            'startFrom' => $startFrom,   
                            'leftContentPosition'=>'' 
                        )
                    ) 
                ); 
            }
        ?>
    <?php } ?>


    <?php $data_approach = get_field("suit_block_approach");?>
    <?php if($data_approach ) { ?>
        <section class="suites_approach">
            <div class="wrapHolder">
                <div class="info" >
                    <div class="left" data-aos="zoom-in-right">
                        <?php if($data_approach['heading']) {?>
                            <h1><?php echo $data_approach['heading']; ?></h1>
                        <?php } ?>
                        
                        <?php if($data_approach['image_small']) { ?>
                            <img src="<?php echo $data_approach['image_small']['sizes']['single_v4']; ?>" class="img-fluid">
                        <?php } ?>

                        <?php if($data_approach['description']) {?>
                            <?php echo $data_approach['description']; ?>
                        <?php } ?>
                    </div>
                    <div class="right" data-aos="zoom-in-left">
                        <?php if($data_approach['Image_big']) { ?>
                            <img src="<?php echo $data_approach['Image_big']['sizes']['single_v3']; ?>" class="img-fluid">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>


    <?php $data_brochure = get_field("suit_block_blochure"); ?>
    <?php if($data_brochure){ ?>
        <section class="suite_brochure">
            <div class="wrapHolder">
                <div class="holder_brochure" >
                    <div>
                        <?php if($data_brochure['heading']) {?>
                            <h1 data-aos="fade-down" data-aos-mirror="false"><?php echo $data_brochure['heading']; ?></h1>
                        <?php } ?>
                        <section class="flip container-iframe" data-aos="zoom-in" >
                            <?php echo $data_brochure['code']; ?> 
                        </section>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<div>

<?php get_footer(); ?>