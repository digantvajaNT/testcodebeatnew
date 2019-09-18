 


        <!-- start page-title -->
        <section class="page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <h2>Contact Us</h2>
                        <ol class="breadcrumb">
                          <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>Contact Us</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>        
        <!-- end page-title -->


        <!-- start contact-pg-section -->
        <section class="contact-pg-section contactpage section-padding">
            <div class="container">
                <div class="row">
                    <div class="col col-md-3">
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <div class="icon"><i class="fa fa-phone"></i></div>
                                    <p><span>Hotline</span><a href="tel:<?php echo $contact_data['phone_one'];?>"><?php echo $contact_data['phone_one'];?></a></p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-envelope"></i></div>
                                    <p><span>Email</span><a href="mailto:<?php echo $contact_data['email_one'];?>"> <?php echo $contact_data['email_one'];?></a></p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-clock-o"></i></div>
                                    <p><span>Working Hours</span><?php echo $contact_data['name_second'];?></p>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-location-arrow"></i></div>
                                    <p><span>Office</span><span class="buildingaddress text-black"><?php echo $contact_data['name_one']?></span><span class="locationaddress text-black"><?php echo $contact_data['address_one'];?></span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-md-offset-1 col-md-8">
                        <div class="location-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.6250621708587!2d72.5644283153543!3d23.037534921548826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e84f53fffffff%3A0xf52ff8b10c32065!2sBenchmark+Agencies+Pvt.+Ltd!5e0!3m2!1sen!2sin!4v1551164759320" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div> <!-- end row --> 
                <div class="clearfix"></div>
                <div class="col col-xs-12">
                   <form class="contact-form form contact-validation-active row" id="contact-form-s2">
                        <div class="row">
                            <div class="col col-sm-6">
                                <div class="row">
                                    <div class="col col-sm-12">
                                        <label for="f-name">Name</label>
                                        <input type="text" class="form-control" id="f-name" name="f_name">
                                    </div>
                                    <div class="col col-sm-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="col col-sm-12">
                                        <label for="phone">Phone No</label>
                                        <input type="text" class="form-control" id="phone" name="phone" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;">
                                    </div>

                                    <div class="col col-sm-12">
                                        <label for="states">States</label>
                                        <select class="form-control select" name="states_name" id="states_name">
                                            <option value="">Select States</option>
                                            <?php foreach ($GetStates as $key => $st) { ?>
                                                <option value="<?php echo $st['name']; ?>"><?php echo $st['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col col-sm-12">
                                        <label for="City">City</label>
                                        <input type="text" class="form-control" id="city_name" name="city_name">
                                    </div>

                                    <div class="col col-sm-12">
                                        <div class="recaptchasignup">
                                            <div class="g-recaptcha" id="reportReCaptcha" data-sitekey="6Lc0Dp0UAAAAANpHw32R5bPT2fUqGFEzlkMUGGM2" data-callback="reportReCaptchaCallback" data-expired-callback="reportReCaptchaExpiredCallback"></div>
                                        </div> 
                                    </div>
                                    <span class="msg-error" style="color: red;margin-left: 17px;"></span>

                                </div>
                            </div> 

                            <div class="col col-sm-6">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message"></textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col col-sm-12 submit-btn">
                                <button class="theme-btn">Submit</button>
                                <div id="loader">
                                    <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                </div>
                            </div>
                        </div>
                        <div class="error-handling-messages">
                            <div id="success">Thank you</div>
                            <div id="error"> Error occurred while sending email. Please try again later. </div>
                        </div>
                  </form>
                </div> 
            </div> <!-- end container -->
        </section>
        <!-- end contact-pg-section --> 

<style type="text/css">
select.select,.g-recaptcha  { float: left; } 

select.select.error {
    font-weight: normal;
    margin: 5px 0 0 0;
    width: 100%;
    font-size: 16px !important;
    font-weight: normal !important;
}

.g-recaptcha.error {
    color: #302f2d;
    font-weight: bold;
    font-size: 24px;
    margin-top: 0; 
}

</style>
