<!-- Footer -->
<selection id="holderFooter">
        <?php $footer = get_field("gs_footer","option"); ?>
        <?php $register_form = get_field('gs_register_form',"option"); ?>
        <?php if ( is_front_page() || is_page('contact') ) {  } else {?>
            <div class="banner">
                <div class="wrapHolder">
                    <h1><?php echo $footer['gs_block_reside']['heading'];?></h1>

                    
                    <?php if($register_form['link']){ ?>
                            <br>
                            <div class="holder_btn">
                                <?php echo printBtn($register_form['link'], "btn btn-brown",""); ?>
                            </div>
                    <?php } ?>
                    
                    
                    <!-- <div class="holder_btn"><a href="#" class="btn btn-brown btn-open-register">Register</a></div> -->
                </div>
            </div>
        <?php } ?>
        <?php $logos = $footer['gs_logos']; ?>
        <?php $socialNetwork = $footer['gs_social_network'];?>
        <?php $partner = $logos['partner'];?>
        <div class="wrapHolder">
            
            <footer>
                <div class="wrapFooter hide-mobile">
                    <div>
                        <a href="<?php echo home_url(); ?>"><image src="<?php echo $logos['main_logo']['url']; ?>" class="logo_footer"></a>
                    </div>

                    
                    <div>
                        <?php 
                            if($socialNetwork) 
                            { 
                                foreach($socialNetwork as $item)
                                {
                                    ?>
                                        <a href="<?php echo $item['url']; ?>" target="_blank"><image src="<?php echo $item['icon']['url']; ?>"></a>
                                    <?php
                                } 
                            }       
                         ?>
                    </div>
                    <div >
                           
                        <div class="brands">
                            <?php 
                                if($partner)
                                {
                                    foreach($partner as $item)
                                    {
                                        ?>
                                            <a href="<?php echo $item['url']; ?>" target="_blank" ><image src="<?php echo $item['logo']['url']; ?>" style="max-width:147px"></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <section class="layout-mobile">
                    <div class="wrapFooter row-1">
                        <div>
                            <a href="<?php echo home_url(); ?>"><image src="<?php echo $logos['main_logo']['url']; ?>" class="logo_footer"></a>
                        </div>
                        <div>
                            <?php 
                                if($socialNetwork) 
                                { 
                                    foreach($socialNetwork as $item)
                                    {
                                        ?>
                                            <a href="<?php echo $item['url']; ?>" target="_blank"><image src="<?php echo $item['icon']['url']; ?>"></a>
                                        <?php
                                    } 
                                }       
                            ?>
                        </div>
                    </div>
                    <div class="wrapFooterGrid row-2">
                        <?php 
                            if($partner)
                            {
                                foreach($partner as $item)
                                {
                                    ?>
                                        <div><a href="<?php echo $item['url']; ?>" target="_blank"><image src="<?php echo $item['logo']['url']; ?>" style="max-width:147px"></a></div>
                                    <?php
                                }
                            }
                        ?>

                        <!--
                        <div>
                            <a href="#"><image src="<?php //echo get_stylesheet_directory_uri(); ?>/images/logo_originate_Footer.png" style="max-width:147px"></a>
                        </div>
                        <div class="iconsMobile">
                            <a href="#"><image src="<?php //echo get_stylesheet_directory_uri(); ?>/images/logo_harlo_Footer.png" style="max-width:131px"></a>
                            <a href="#"><image src="<?php //echo get_stylesheet_directory_uri(); ?>/images/logo_RDS_Footer.png"></a>
                        </div>
                        -->
                    </div>
                </section>

                <p class="copyright">
                    <?php echo $footer['copyright']['description']; ?>
                    <?php if($footer['copyright']['link']) { ?>
                        <a href="<?php echo $footer['copyright']['link']['url']; ?>" target="<?php echo $footer['copyright']['link']['target']; ?>"><?php echo $footer['copyright']['link']['title']; ?></a>
                    <?php } ?>
                </p>
            </footer>
        </div>
</section>