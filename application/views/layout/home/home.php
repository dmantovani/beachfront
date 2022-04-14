    <!--HOME VIDEO-->
    <div class="container-fluid no-padd overflow">
        <div class="row-fluid no-padd">
            <div class="col-sm-12 no-padd">
                <div class="container-fluid top-banner no-padd  js-video-wrapper pr-video-wrapper simple fullheight light">
                    <span class="overlay"></span> <img src="<?=base_url()?>asset/img/home/home_background.png" class="s-img-switch" alt="main-banner image"> <a href="#" class="js-play-button pr-video-play"></a>
                    <span class="js-video-close pr-video-close fa fa-close"></span>

					<!--
                    <div class="js-video-container pr-video-container">
                        <iframe width="1200" height="675" src="https://www.youtube.com/embed/zp2lgrzmnn8?feature=oembed&enablejsapi=1&autoplay=1&rel=0&controls=0&showinfo=0&loop=1"
                            data-mute="on" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    -->

                    <div class="content">
                        <div class="subtitle"><?=$config[0]->hero_desc?> </div>
                        <h1 class="title"><?=$config[0]->hero_title?> </h1> <a href="<?=base_url()?>about" class="a-btn simple">
                            <span class="a-btn-line"></span>EXPORE </a>
                    </div>
                </div>
            </div>
        </div>
    <!--/HOME VIDEO-->
    
    <!-- HOME TEXT -->
	<div class=" row-fluid  margin-lg-75t margin-sm-40t">
        <div class="column column_container col-sm-12 ">
            <div class="column-inner ">
                <div class="heading  Center dark">
                    <h2 class="title"><?=$config[0]->intro_text?></h2>
            	</div>
        	</div>
    	</div>
    </div>
    <!-- END HOME TEXT -->
    
    
     <!-- DESTINATIOS STPLI -->
        <div class="row-fluid no-padd">
            <div class="col-sm-12 no-padd ">
                        <div class="portfolio-slider-wrap full_showcase_slider showcase_slider ">
                            <div class="swiper-container" data-mouse="0" data-space="0" data-pagination-type="bullets"
                                data-mode="horizontal" data-autoplay="5000" data-loop="2" data-speed="1500" data-center="0"
                                data-responsive="responsive" data-slides-per-view="4" data-xs-slides="1,0"
                                data-sm-slides="2,0" data-md-slides="3,0" data-lg-slides="4,0">
                                
                                <div class="swiper-wrapper">
	                                
	                                <?php foreach($destinations as $dest): ?>

                                    <div class="swiper-slide">
                                        <div class="slide-image full-height-window-hard">
                                            <span class="images-slider-wrapper">
                                                <img src="<?=base_url()?>asset/img/uploads/<?=$dest->image_home?>"
                                                    alt="seascape-villa image" class="s-img-switch">
                                            </span>
                                        </div>
                                        <div class="content-showcase-wrapper ">
                                            <div class="slide-title"><a href="<?=base_url()?>destinations" target="_self"><?=$dest->title?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                                </div>
                                <div class="swiper-button-prev swiper-buttons"></div>
                                <div class="swiper-button-next swiper-buttons"></div>
                            </div>
                        </div>
            </div>
        </div>
     <!-- END DESTINATIOS STPLI -->
     
     
     <!-- OUR YATCH -->
    <div class="container no-padd">

        <div class="row-fluid  margin-lg-70t ">
           
            <div class="column col-sm-12 col-lg-offset-1 col-lg-5 col-md-offset-0 col-md-6 col-xs-12  margin-sm-20t padd-only-xs">
                <div class="padd-only">
                        <div class="heading  left dark">

                            <h2 class="title"><?=$config[0]->our_yatch_title?></h2>
                            <div class="content padding-xs-40b">
                                <p><?=$config[0]->our_yatch_desc?></p>
								<a href="<?=base_url()?>gallery" class="prague-services-link a-btn-2 creative anima" target="_self"> <span class="a-btn-line"></span> DETAILS </a>
                            </div>
                        </div>
                </div>
            </div>
            
 <div class="column  col-sm-10 col-lg-6 col-md-offset-0 col-md-6 col-sm-offset-1 col-xs-12  margin-lg-65t margin-sm-0t no-padd">
                <div class="no-padd-inner">
                        <div class="prague-counter  multi_item no-figure">
                            <div class="counter-outer" style="padding:10px;">
                                <img src="#" data-lazy-src="<?=base_url()?>asset/img/home/our_yatch.png" alt="numbers photo" class="xprague-counter-img xs-img-switch">
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
     <!-- END OUR YATCH -->
     
 </div>    
    
    
    
    
    
    
    