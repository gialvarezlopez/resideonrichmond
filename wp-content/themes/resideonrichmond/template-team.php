<?php
    /*
     * Template Name: Template Team
     */
?>
<?php  get_header(); ?>

<div class="mainHolder">

    <?php $data_hero = get_field("t_hero");?>
    <?php if($data_hero) { ?>
        <section class="blockTopDark">

            <section class="elem_table hero heightMainHero" style=" background-image: url('<?php echo $data_hero['image']['sizes']['hero_v1']; ?>');">
                <?php include("inc/header.php"); ?>  
                <!-- <div class="wrapHolder"></div> -->
                <div class="holder_info posCenter" >
                    <?php if($data_hero['heading']) { ?>
                        <h1 data-aos="zoom-in-up" ><?php echo $data_hero['heading']; ?></h1>
                        <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                    <?php } ?>
                </div>
            </section>
        </section>
    <?php } ?>



    <section class="team_companies">
        <div class="wrapHolder">
            <div class="info">

                <?php $data_companies = get_field("t_company");
                    if(isset($data_companies) && count($data_companies) > 0)
                    {
                        $num = 0;
                        $delay = 0;
                        foreach($data_companies as $item)
                        {
                            if($num == 3)
                            {
                                $delay = 0;
                            }
                            ?>
                            <div class="item" data-aos="fade-down" data-aos-delay="<?php echo $delay; ?>">
                                <div class="holder_img">
                                    <img src="<?php echo $item['logo']['url']; ?>" class="img-fluid">
                                </div>
                                <?php echo $item['description']; ?>
                            </div>
                            <?php
                            $num++;
                            $delay = $delay + 100;
                        }
                    }
                ?>        

            </div>
        </div>
    </section>

<div>

<?php get_footer(); ?>