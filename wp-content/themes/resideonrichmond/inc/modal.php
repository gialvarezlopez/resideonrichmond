<div class="modal-overlay registerForm" style=""></div>
<div id="holderPopupBooking" class="registerForm" style="">
	<div class="contentPopup">

        <?php $data_form = get_field("gs_register_form", "option"); ?>

        <div class="holderTitleModal">
            <div><h1 class="title  bar-yellow" style="margin-bottom: 0px; background-size: 35px 8px;"><?php echo $data_form['title']; ?></h1></div>
            <div><a href="#" id="closePopupBooking" class="closePopup"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Close_PopUp.svg"></a></div>
        </div>
		
        
		<div class="content_body">
            <!-- <div id="form_booking" class="form_booking"> -->
            <div id="holder_form_booking" class="holder_form_booking">    
                <div class="fields">
                    <div class="form_heading"><br><?php echo $data_form['heading']; ?></div>
                    <div class="holderFields">
                    <?php 
                        
                        if($data_form)
                        {


                                //echo do_shortcode( '[contact-form-7 id="15" ]' );  
                            /*
                            $cf7_id = ($data_form['form']->ID);
                            if( $cf7_id != "")
                            {   
                                echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                            }
                            */

                            /*
                            ?>
                            <p class="infoForm"><?php echo $data_form['heading']; ?></p><br>
                            <?php
                            */
                            if( isset($data_form['form_id']) && $data_form['form_id'] > 0)
                            {
                                echo "<input type='hidden' id='form_register_exist' value='".$data_form['form_id']."'>"; //This is to validate if it's loaded the form to set style in labels and select options;
                                gravity_form( $data_form['form_id'], false, false, true, '', true, 12 );
                            }
                            
                        }
                     
                    ?>
                    <?php 
                        //gravity_form( 1, false, false, true, '', true, 12 );
                        //[gravityform id="form id" title="true/false" description="true/false" ajax="true/false"] //shorcode
                        
                    ?>
                    
                    <!--
                    <div class="holderFields">
                        <div class="rowForm setBorder">
                            <div class="column">
                                <input type="text" placeholder="First Name*">
                            </div>
                            <div class="column">
                                <input type="text" placeholder="Last Name*">
                            </div>
                        </div>
                        <div class="rowForm setBorder">
                            <div class="column">
                                <input type="text" placeholder="Phone Number*">
                            </div>
                            <div class="column">
                                <input type="text" placeholder="Email Address*">
                            </div>
                        </div>
                        <div class="rowForm setBorder">
                            <div class="column"><span class="asField">Are you working with a realtor?*</span></div>
                            <div class="column">
                                <span class="radio">
                                    <input type="radio" id="r_yes" name="drone" value="YES"
                                            checked>
                                    <label for="r_yes">YES</label>
                                </span>
                                <span class="radio">
                                    <input type="radio" id="r_no" name="drone" value="NO"
                                            checked>
                                    <label for="r_no">NO</label>
                                </span>
                                <span class="radio">
                                    <input type="radio" id="r_iam" name="drone" value="I am a Realtor"
                                            checked>
                                    <label for="r_iam">I am a Realtor</label>
                                </span>
                            </div>
                        </div>
                        <div class="rowForm setBorder">
                            <div class="column">
                                <input type="text" placeholder="City">
                            </div>
                            <div class="column">
                                <input type="text" placeholder="Postal Code">
                            </div>
                        </div>
                        <br>
                        <div class="rowForm">
                            <div class="column">
                                <select class="custom-select">
                                    <option value="">Price Range</option>
                                    <option value="10">10</option>
                                    <option value="20">s</option>
                                    <option value="30">12</option>
                                    <option value="50">3</option>
                                </select>
                            </div>
                            <div class="column">
                                <select class="custom-select">
                                    <option value="">Preferred Home Size</option>
                                    <option value="10">10</option>
                                    <option value="20">s</option>
                                    <option value="30">12</option>
                                    <option value="50">3</option>
                                </select>
                            </div>
                        </div>

                        <div class="rowForm">
                            <div class="column">
                                <select class="custom-select">
                                    <option value="">Bedroom Type</option>
                                    <option value="10">10</option>
                                    <option value="20">s</option>
                                    <option value="30">12</option>
                                    <option value="50">3</option>
                                </select>
                            </div>
                            <div class="column">
                                <select class="custom-select">
                                    <option value="">How did you hear about us?</option>
                                    <option value="10">10</option>
                                    <option value="20">s</option>
                                    <option value="30">12</option>
                                    <option value="50">3</option>
                                </select>
                            </div>
                        </div>

                        <div class="rowForm setBorder comment">
                            <div class="column">
                                <textarea placeholder="Comments"></textarea>
                            </div>
                        </div>

                    </div>
                    -->
                    </div>    
                    
                </div>   
            </div>
	    </div>
        
	</div>
</div>





