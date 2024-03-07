<?php
    /*
     * Template Name: Template Contact
     */
?>
<?php  get_header(); ?>

<div class="mainHolder page_contact">

    <section class="blockTop">

        <section class="no-hero hide-mobilex">
            <?php $logo_dark = true; ?>
            <?php include("inc/header.php"); ?>  
            <div class="wrapHolder">
                <div class="holder_info posCenter">
                    <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                </div>
            </div>
        </section>
    </section>

    <?php 
        $contect_heading = get_field("c_heading");
        $heading_address = get_field("c_heading_address");
        $contact_address = get_field("c_address");
    ?>
    <section class="contact_holder">
        <div class="wrapHolder" >
            <h3 ><?php echo $contect_heading; ?></h3>
            <div class="address" >
                <div class="heading_address"><?php echo $heading_address; ?></div>
                <?php echo $contact_address; ?>
            </div>
        </div>            
    </section>
<div>

<?php get_footer(); ?>