    <!--MAIN BODY-->
    <div class="container custom-destination-header margin-lg-120t margin-sm-80t">
        <div class="row">
            <div class="col-sm-7">
                <h3>DESTINATIONS</h3>
                <p>Heaven is a place on earth, each island the Beachfront visits in the Bahamas is unique in its own distinctive way. Soak up the sun and experience the Caribbean in the best way possible. </p>
            </div>
            <div class="col-sm-12">
                <h4>Take a look at our usual destinations</h4>
            </div>
        </div>
    </div>
    <div class="container custom-destination-01 margin-lg-80t margin-sm-80t margin-xs-20b margin-md-30b margin-lg-60b">
        <div class="row">
            <div class="no-padd-left no-padd-right margin-lg-20t">
                <div class="wrapper">
                    <div data-unique-key="139714cb2b9c35c987d2544328454258" class="js-load-more" data-start-page="1" data-max-page="5" data-next-link="http://prague.loc/page/2/">
                        <div class="row prague_list prague_count_col1 prague_gap_col10  no-footer-content no-figure prague-load-wrapper"
                            data-columns="prague_count_col1" data-gap="prague_gap_col10">

							<?php foreach($info as $i): ?>
                            <div class="project-list-item column_paralax">
                                <div class="project-list-outer">

                                    <div class="project-list-wrapper">
                                        <div class="project-list-img">
                                            <img src="<?=base_url()?>asset/img/uploads/<?=$i->image?>" class="s-img-switch"
                                                alt="seascape-villa image" />
                                        </div>

                                        <div class="project-list-content">
                                            <div class="project-list-category"><?=$i->title?></div>
                                            <div class="project-list-excerpt">
                                                <p><?=$i->description?></p>
                                            </div>
                                            <a href="seascape-villa.html" class="project-list-link a-btn-arrow-2" target="_self"><span class="arrow-right"></span> BOOK</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/MAIN BODY-->