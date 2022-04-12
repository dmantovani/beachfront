<!--MAIN BODY-->
    <div class="container-fluid no-padd">
        <div class="row-fluid  margin-lg-145t margin-sm-100t">
            <div class="col-sm-12 ">
                <div class="vc_column-inner ">
                        <div data-unique-key="14ad5b356d917aa464e6341724c17a46" class="js-load-more" data-start-page="1"
                            data-max-page="1" data-next-link="">
                            <div class="row prague_masonry prague_count_col4 prague_gap_col15  no-footer-content prague-load-wrapper" data-columns="prague_count_col4" data-gap="prague_gap_col15">
                                
                                <?php foreach($info as $i): ?>
                                <div class="portfolio-item-wrapp  p_f_d7a8462 p_f_ddba60a p_f_aebfe46 column_paralax">
                                    <div class="portfolio-item">
                                        <div class="project-masonry-wrapper">
                                            <a class="project-masonry-item-img-link" href="seascape-villa.html"
                                                target="_self">

                                                <img  src="<?=base_url()?>asset/img/uploads/<?=$i->image?>"
                                                    class="s-img-switch" alt="seascape-villa image" data-s-hidden="true"
                                                    data-s-sibling="true"/>
                                                <div class="project-masonry-item-img"></div>

                                                <div class="project-masonry-item-content">
                                                    <h4 class="project-masonry-item-title"><?=$i->title?></h4>
                                                    <div class="project-masonry-item-category"><?=$i->description?></div>
                                                </div>
                                            </a>
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