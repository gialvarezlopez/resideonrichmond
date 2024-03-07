<?php
    /*
     * Template Name: Template Amenities
     */
?>
<?php  get_header(); ?>

<div class="mainHolder page_amenities">

    <!-- Hero section -->
    <?php $data_hero = get_field("a_hero");?>
    <?php if($data_hero) { ?>
        <section class="blockTopDark">

            <section class="elem_table hero heightMainHero" style=" background-image: url('<?php echo $data_hero['image']['sizes']['hero_v1']; ?>');">
                <?php include("inc/header.php"); ?>  
                <div class="wrapHolder">
                    <div class="holder_info posCenter">
                        <?php if($data_hero['heading']) {?>
                            <h1 data-aos="zoom-in-up" ><?php echo $data_hero['heading']; ?></h1>
                        <?php } ?>
                        <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                    </div>
                </div>
            </section>
        </section>
    <?php } ?>

    <!-- Yellow bar -->
    <?php $data_discover = get_field("a_block_discover"); ?>
    <?php if($data_discover){ ?>
        <section class="bar-top amenities">
            <div class="wrapHolder">
                <div class="info right">
                    <div class="col-l"></div>
                    <div class="col-content" data-aos="zoom-in">
                        <?php if($data_discover['heading']) {?>
                            <h1><?php echo $data_discover['heading']; ?></h1>
                        <?php } ?>
                        <?php if($data_discover['sub_heading']) {?>
                            <h2><?php echo $data_discover['sub_heading']; ?></h2>
                        <?php } ?>
                        <?php if($data_discover['description']) {?>
                            <div class="description"><?php echo $data_discover['description']; ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>


        <!-- second hero -->
        <section class="">
            <div data-aos="zoom-in-down" class="secondHero "  style=" background-image:  url('<?php //echo $data_discover['image']['sizes']['hero_v1']; ?>');">
                <img src="<?php echo $data_discover['image']['sizes']['hero_v1']; ?>" class="full-cover">
            </div>
        </section>

    <?php } ?>


    <?php $data_lobby = get_field("a_block_lobby"); ?>
    <?php if($data_lobby) { ?>
        <section class="bar-top second-block">
            <div class="wrapHolder">
                <div class="info">
                    
                    <div class="col-content" data-aos="zoom-in">
                        <?php if($data_lobby['heading']) {?>
                            <h1><?php echo $data_lobby['heading']; ?></h1>
                        <?php } ?>
                        
                        <h2></h2>
                        <?php if($data_lobby['description']) {?>
                            <div class="content"><?php echo $data_lobby['description']; ?></div>
                        <?php } ?>
                    
                    </div>
                    <div class="col-l"></div>
                </div>
            </div>
        </section>


        <!-- blocks 1 -->
        <?php 
            if(isset($data_lobby['sections']) && count($data_lobby['sections']) > 0)
            {

                $startFrom = 1;
                get_template_part('template-parts/block-content',
                    $arg, 
                    array( 
                        'my_data' => array(
                            'sections' => $data_lobby['sections'],
                            'startFrom' => $startFrom, 
                            'leftContentPosition'=>'align-end'  
                        )
                    ) 
                ); 
            }
        ?>

        <!-- Therd hero -->
        <section class="">
            <div data-aos="zoom-in-down" class="secondHero height740"  style=" background-image:  url('<?php //echo $data_lobby['sub_hero']['sizes']['hero_v2']; ?>');">
                <img src="<?php echo $data_lobby['sub_hero']['sizes']['hero_v2']; ?>" class="full-cover">
            </div>
        </section>

    <?php } ?>                        

    <!-- Workspace -->
    <?php $data_workspace = get_field("a_block_workspace");?>
    <?php if($data_workspace) { ?>
        <!-- Yellow bar -->
        <section class="bar-top second-block">
            <div class="wrapHolder">
                <div class="info">
                    
                    <div class="col-content"  data-aos="zoom-in">
                        <?php if($data_workspace['heading']) {?>
                            <h1><?php echo $data_workspace['heading']; ?></h1>
                        <?php } ?>
                            
                        <?php if($data_workspace['description']) {?>

                            <div class="content"><?php echo $data_workspace['description']; ?></div>
                        <?php } ?>
                        
                    </div>
                    <div class="col-l"></div>
                </div>
            </div>
        </section>

        <?php 
            if(isset($data_workspace['sections']) && count($data_workspace['sections']) > 0)
            {
                $num = 1;
                foreach($data_workspace['sections'] as $item)
                {
                    //echo $item['title'];
                    
                    if ($num%2==0){
                        //echo "El $num es par";
                        $set_classes_holder = "content_blocks_bg vh content-left content-align-left";
                        $set_class_info = "";
                    }else{
                        //echo "El $num es impar";
                        $set_classes_holder = "content_blocks_bg vh content-align-left";
                        $set_class_info = "align-end";
                    }

                    ?>
                    <section class="<?php echo $set_classes_holder; ?>">
                        <div class="content">
                            <div class="wrapHolder">
                                <div class="setRow">
                                    <div class="info <?php echo $set_class_info; ?>">
                                        <div class="description" data-aos="fade-down">
                                            <h3 class="big"><?php echo $item['title']; ?></h3>
                                            <?php echo $item['description']; ?>
                                        </div>
                                    </div>
                                    <div class=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="setRow" data-aos="zoom-in-up">

                            <?php 
                                if ($num%2==0){
                                    //par
                                    ?>
                                    <!-- <div class="holder_image" style="background-image: url('<?php //echo $item['image']['sizes']['block_3']; ?>');"> -->
                                    <div class="holder_image">       
                                        <img src="<?php echo  $item['image']['sizes']['block_3']; ?>" class="">
                                        <!-- <h3 class="spaceName">Co-working Space</h3> -->
                                    </div>
                                    <div class="holder_color"></div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="holder_color"></div>
                                    <!-- <div class="holder_image" style="background-image: url('<?php echo $item['image']['sizes']['block_3']; ?>');"> -->
                                    <div class="holder_image">       
                                        <img src="<?php echo  $item['image']['sizes']['block_3']; ?>" class="">
                                        <!-- <h3 class="spaceName">Co-working Space</h3> -->
                                    </div>
                                    <?php
                                }
                            ?>
                            
                        <div>
                    </section>
                    <?php

                    $num++;
                }
                
            }
        ?>

        <!-- fourth hero -->
        <section class="">
            <div data-aos="zoom-in-down" class="secondHero height740"  style=" background-image: url('<?php //echo $data_workspace['sub_hero']['sizes']['hero_v2']; ?>');">
                <img src="<?php echo $data_workspace['sub_hero']['sizes']['hero_v2']; ?>" class="full-cover">
            </div>
        </section>

    <?php } ?>

    <!-- Yellow bar -->
    <?php $data_retail = get_field("a_block_retail");?>
    <?php if($data_retail) { ?>
        <section class="bar-top aqua">
            <div class="wrapHolder">
                <div class="info">
                    
                    <div class="col-content" data-aos="fade-right">
                        <?php if($data_retail['heading']) {?>
                            <h1><?php echo $data_retail['heading']; ?></h1>
                        <?php } ?>
                        <div class="content">    
                            <?php if($data_retail['description']) {?>
                                <?php echo $data_retail['description']; ?>
                            <?php } ?>
                        </div>
                    
                    </div>
                    <div class="col-l"></div>
                </div>
            </div>
        </section>
    <?php } ?>


<div>

<?php get_footer(); ?>