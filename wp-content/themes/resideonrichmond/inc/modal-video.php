<div class="modal-overlay playvideo" style=""></div>
<div id="holderPopupBooking" class="playvideo" style="">
	<div class="contentPopup">
        <div class="holderTitleModal">
            <!-- <div><h1 class="title  bar-white" style="margin-bottom: 0px; background-size: 35px 8px;"></h1></div> -->
            <div><a href="#" id="closePopupPlayVideo" class="closePopup"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Close_PopUp.svg"></a></div>
        </div>
		<div class="content_body text-center" id="content_playvideo">
            <?php //echo  $data_video['image']['sizes']['hero_v1']; 
                $videoLoaded = @$data_video['video']['url'];
                $byDefaultVideo =  get_stylesheet_directory_uri()."/videos/ror_compressed.mp4";    
                $urlVideo = ($videoLoaded)?$videoLoaded:$byDefaultVideo;
            ?>
            <video class="" id="video"    poster="<?php echo $data_video['image']['sizes']['hero_v1']; ?>">
                <source src="<?php echo $urlVideo; ?>" type="video/mp4" style="width:100%">
                <!-- <source src="https://centricity.communitystaging.ca/wp-content/themes/centricity/videos/Unified_Rebrand_logo-animation_v2.ogg" type="video/ogg"> -->
                Your browser does not support the video tag.
            </video>
	    </div>
	</div>
</div>

