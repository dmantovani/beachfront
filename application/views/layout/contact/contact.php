<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css'>
	<!-- SLIDE HOME -->
    <div class="row">
        <div class="col-xs-12 no-padd">
            <div class="container-fluid top-banner no-padd  big fullheight light">
                <img src="<?=base_url()?>asset/img/home/contact_background.png" class="s-img-switch" alt="top-banner image" />
                <span class="overlay"></span>
                <div class="content">
                    <div class="prague-svg-animation-text"></div>
                    <div class="subtitle ">CAN’T WAIT TO GET AWAY? </div>                    
                    <h1 class="title">BOOK YOUR CHARTER HERE.</h1>
                </div>
                <div class="top-banner-cursor"></div>
            </div>
        </div>
    </div>
    <!-- SLIDE HOME -->
    
    <!-- CONTACT FORM -->
    <div class="container no-padd no-padd margin-lg-70t margin-sm-40t margin-lg-110b margin-xs-70b">

        <div class="row-fluid no-padd margin-lg-30t margin-lg-110b margin-sm-20t margin-sm-70b">
            <div class="col-sm-12 col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 col-sm-offset-0 col-xs-12 no-padd">
                <h3>CONTACT US<br><br></h3>
                <div class="padd-only-xs ">

                    <div class="prague-formidable  vc_formidable">
                        <div class="frm_forms  with_frm_style frm_style_formidable-style-2-2" id="frm_form_4_container">
                            <form enctype="multipart/form-data" method="post" class="frm-show-form contact-me-form" id="form_t1e6y">
                                <div class="frm_form_fields ">
                                    <fieldset>
                                        <div class="frm_fields_container">
                                            <input type="hidden" name="frm_action" value="create" />
                                            <input type="hidden" name="form_id" value="4" />
                                            <input type="hidden" name="frm_hide_fields_4" id="frm_hide_fields_4" value="" />
                                            <input type="hidden" name="form_key" value="t1e6y" />
                                            <input type="hidden" name="item_meta[0]" value="" />
                                            <input type="hidden" id="frm_submit_entry_4" name="frm_submit_entry_4"
                                                value="be0e1ff112" /><input type="hidden" name="_wp_http_referer" value="/contact-me/" />
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div id="frm_field_19_container" class="frm_form_field form-field  frm_required_field frm_none_container">
                                                        <input type="text" placeholder="Name" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div id="frm_field_19_container" class="frm_form_field form-field  frm_required_field frm_none_container">
                                                        <input type="text" placeholder="Last Name" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div id="frm_field_19_container" class="frm_form_field form-field  frm_required_field frm_none_container">
                                                        <input type="email" placeholder="Email" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div id="frm_field_19_container" class="frm_form_field form-field  frm_required_field frm_none_container">
                                                        <input type="text" placeholder="Phone Number" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <h5>Check date</h5>
                                            </div>
                                            <input type="text" name="dates" class="d-block my-4 mx-auto" style="color: #000;">
                                            
                                            <div class="frm_submit">

                                                <input type="submit" value="Send" />
                                                <span class="arrow-right"></span>

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="test 4"></div>

                </div>
            </div>
        </div>
    </div>
    <!--/MAIN BODY-->
    <!-- END CONTACT FORM -->

      <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js'></script>
    <script src='https://cdn.jsdelivr.net/momentjs/latest/moment.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js'></script>
    <script type="text/javascript">
        const self = $('input[name="dates"]')

        self.daterangepicker({
            applyButtonClasses: 'd-none',
            showDropdowns: false,
            opens: "center",
            drops: "down",
            autoApply: false,
            startDate: self.data('start'),
            endDate: self.data('end'),
            minDate: self.data('start'),
            maxDate: self.data('end'),
            locale: {
              format: "DD/MM/YYYY",
              separator: " - ",
              applyLabel: "Apply",
              cancelLabel: "Cancel",
              fromLabel: "De",
              toLabel: "Até",
              customRangeLabel: "Custom",
              weekLabel: "S",
              daysOfWeek: [
               "Sun",
               "Mon",
               "Tue",
               "Wed",
               "Thu",
               "Fri",
               "Sat"
              ],
              monthNames: [
               "January",
               "February",
               "March",
               "April",
               "May",
               "June",
               "July",
               "August",
               "September",
               "October",
               "November",
               "December"
              ],
              firstDay: 1
            }
          });
    </script>