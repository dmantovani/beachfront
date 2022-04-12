<div class="container-fluid no-padd">
        <div class="row-fluid">
            <div class="wpb_column vc_column_container col-sm-12 no-padd">
                        <div class="project-detail-parallax" data-parallax-speed="0.5" data-smoothscrolling="">

							<?php foreach($info as $i): ?>
                            <div class="project-detail-parallax-item ">
                                <div class="detail-parallax-item-bg js-detail-parallax-item-bg ">
                                   <img src="<?=base_url()?>asset/img/uploads/<?=$i->image?>" class="attachment-full size-full" alt="banner image" />
                                </div>

                                <div class="detail-parallax-item-header">
                                    <a href="<?=base_url()?>gallery/detail/<?=$i->uniq?>"><h1 class="detail-parallax-item-header-title"><?=$i->title?></h1></a>
                                </div>
                            </div>
                            <?php endforeach; ?>

                            <div class="project-detail-parallax-cover"></div>
                        </div>

            </div>
        </div>
    </div>