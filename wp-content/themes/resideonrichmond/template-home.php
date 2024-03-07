<?php
    /*
     * Template Name: Template Home
     */
?>

<?php  get_header(); ?>

<div class="mainHolder page_home">

    <!-- Hero section -->
    <?php $data_hero = get_field("h_hero");?>
    <?php if($data_hero) { ?>
    <section class="blockTopDark">

        <section class="elem_table hero heightMainHero" style=" background-image: url('<?php echo $data_hero['image']['sizes']['hero_v1']; ?>');">
            <?php include("inc/header.php"); ?> 
            <div class="wrapHolder">
                <div class="holder_info leftBottom" data-aos="fade-up">
                    <?php if($data_hero['heading']) {?>
                        <h1><?php echo $data_hero['heading']; ?></h1>
                    <?php } ?>
                    <?php if($data_hero['sub_heading']) {?>
                        <h3><?php echo $data_hero['sub_heading']; ?></h3>
                    <?php } ?>
                </div>
            </div>            
        </section>
    </section>
    <?php } ?>
            

    <!-- Video section -->
    <?php $data_video = get_field("h_video");?>
    <?php if($data_video) { ?>
        <section id="holder_video">
            <div class="wrap-playvideo" style=" background-image:url('<?php echo $data_video['image']['sizes']['hero_v1']; ?>;"></div>

           
            <div class="holderInfoVideo">
                <div class="wrapHolder" style="" data-aos="zoom-in">
                    <div class="holder_infox content_leftCenterx" >
                   
                        <?php if($data_video['heading']) { ?>
                            <h1><?php echo $data_video['heading']; ?></h1>
                        <?php } ?>

                        <?php if($data_video['sub_heading']) { ?>
                            <h3><?php echo $data_video['sub_heading']; ?></h3>
                        <?php } ?>
                        
                        <?php if($data_video['link']){ ?>
                            
                            <div class="holder-link">
                                <?php echo printBtn($data_video['link'], "btn btn-yellow", "btnPlayVideo"); ?>
                            </div>
                        <?php } ?>
                       
                    </div>
                </div>
            </div>
            <?php include("inc/modal-video.php"); ?>
        </section>

    <?php } ?>

    <!-- blocks 2 -->
    <?php $data_conscious = get_field("h_style-conscious"); ?>
    <?php if($data_conscious) { ?>
        <section class="content_blocks_bg vh block_content fifti ">
            <div class="content">
                <div class="wrapHolder">
                    <div class="setRow">
                        <div class="info">
                            <div class="description_v2 left" data-aos="zoom-in">
                                <?php if($data_conscious['heading']) { ?>
                                    <h1><?php echo $data_conscious['heading']; ?></h1>
                                <?php } ?>

                                <?php if($data_conscious['sub_heading']) { ?>
                                    <h2 class="pf-20"><?php echo $data_conscious['sub_heading']; ?></h2>
                                <?php } ?>
                                
                                <?php echo $data_conscious['description']; ?>
                                
                                <?php if($data_conscious['link']){ ?>
                                    <br>
                                    <div class="holder-link">
                                        <?php echo printBtn($data_conscious['link'], "btn btn-yellow"); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
            <div class="setRow" data-aos="fade-up">
                <div class="holder_color"></div>
                    <!-- <div class="holder_image" style="background-image:  url('<?php //echo $data_conscious['image']['sizes']['block_1']; ?>');"> -->
                    <!-- <h3 class="spaceName">Co-working Space</h3> --> 
                <div class="holder_image">       
                    <img src="<?php echo $data_conscious['image']['sizes']['block_1']; ?>" class="">
                </div>
            <div>
        </section>
    <?php } ?>


    <!-- Location -->
    <?php $data_location = get_field("h_location"); ?>
    <?php if($data_location){ ?>
        <section class="h_location">
            <div class="wrapHolder">
                <div class="setRow flex-end ">
                    <div class="setColumn col-first" data-aos="fade-up"><img src="<?php echo $data_location['image']['sizes']['single_v5']; ?>" class="img-fluid"></div>
                    <div class="setColumn col-second" data-aos="zoom-in-up">
                        <div class="blocks">
                            <div>
                                <div class="block_1">
                                    <?php if($data_location['heading']) { ?>
                                        <h1><?php echo $data_location['heading']; ?></h1>
                                    <?php } ?>
                                    <?php echo $data_location['description']; ?>                                
                                </div>
                                <div class="block_2" > 
                                    <?php if($data_location['sub_heading']) { ?>
                                        <h3><?php echo $data_location['sub_heading']; ?></h3>
                                    <?php } ?>
                                    <div class="stops"> 
                                        <?php 
                                            $col_1 = @$data_location['stop']['col_1'];
                                            if($col_1){
                                                ?>
                                                    <div>
                                                        <?php 
                                                            foreach($col_1 as $item)
                                                            {
                                                                echo $item['name']."<br>";
                                                            }
                                                        ?>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        <?php 
                                            $col_2 = @$data_location['stop']['col_2'];
                                            if($col_2){
                                                ?>
                                                    <div>
                                                        <?php 
                                                            foreach($col_2 as $item)
                                                            {
                                                                echo $item['name']."<br>";
                                                            }
                                                        ?>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <!-- Amenities - blocks 2 -->
    <?php $data_amenities = get_field("h_amenities"); ?>
    <?php if($data_amenities) { ?>
        <section class="content_blocks_bg">
            <div class="content">
                <div class="wrapHolder">
                    <div class="setRow">
                        <div class="info">
                            <div class="description" data-aos="zoom-in">
                                <?php if($data_amenities['heading']) { ?>
                                    <h3><?php echo $data_amenities['heading']; ?></h3>
                                <?php } ?>
                                
                               
                                <div class="holder-link">
                                    <br>
                                    <?php echo printBtn($data_amenities['link'], "btn btn-yellow"); ?>
                                </div>
    

                            </div>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
            <div class="setRow" data-aos="fade-up">
                <div class="holder_color"></div>
                <!-- <div class="holder_image" style="background-image: url('<?php echo $data_amenities['image']['sizes']['block_2']; ?>;"> -->

                <div class="holder_image">    
                    <img src="<?php echo $data_amenities['image']['sizes']['block_2']; ?>" class="">
                    <?php /*if($data_amenities['label_image']) { ?>
                        <h3 class="spaceName"><?php echo $data_amenities['label_image']; ?></h3>
                    <?php } */ ?>
                </div>
            <div>
        </section>
    <?php } ?>


    <!-- Section blocks-->
    <?php $data_companies = get_field("h_companies"); ?>
    <?php if($data_companies){ ?>
        <section id="home-blocks">
            <div class="wrapHolder">
                <div class='setRow flex-endx'>

                    <?php 
                        $companies = @$data_companies['item']; 
                        if($companies)
                        {
                            $num = 1;
                            $coreDelay = "";
                            $numDelay = 0;
                            foreach($companies as $item)
                            {
                                if ($num%2==0){
                                    //"$num es par";
                                    $set_class = "col-second";
                                    $btn_color = "btn btn-yellow";
                                    $numDelay = $numDelay + 300;
                                    $coreDelay = "data-aos-delay='".$numDelay."'";
                                    $bar_color = "bar-yellow";
                                }   
                                else
                                {   
                                    $set_class = "col-first";
                                    $btn_color = "btn btn-brown";
                                    $coreDelay = "";
                                    $bar_color = "bar-brown";
                                }   

                                ?>
                                <div class='setColumn <?php echo $set_class; ?>' data-aos="fade-down" data-aos-easing="linear" <?php echo $coreDelay; ?>>
                                    <div class='detail'>
                                        <h1 class="title  <?php echo $bar_color; ?>" style="background-size: 40px 8px;"> <?php echo $item['title']; ?> </h1>
                                        <div class='content'>
                                            <?php echo $item['description']; ?>
                                        </div>
                                        <div class="holderBrandLogo"><img src="<?php echo $item['logo']['url']; ?>"></div>

                                        <?php if($item['link']){ ?>
                                            <br>
                                            <div class="holder-link">
                                                <?php echo printBtn($item['link'], $btn_color); ?>
                                            </div>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <?php

                                $num++;
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php } ?>

<div>   



<?php get_footer(); ?>
