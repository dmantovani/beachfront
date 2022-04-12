<?php 
	$header_css = "light";
	$logo_png = "logo-white.png";
	
	
	if(isset($dark))
	{
		$header_css = "dark";
		$logo_png = "logo-black.png";		
	}
		
?>




   <!--HEADER-->
    <header class="prague-header simple sticky-menu sticky-mobile-menu <?=$header_css?> ">
        <!--LOGO-->
        <div class="prague-logo">
            <a href="<?=base_url()?>">
                <img width="145" height="46" src="<?=base_url()?>asset/img/home/<?=$logo_png?>" class="image_logo" alt="logo" /></a>
        </div>
        <!--/LOGO-->

        <div class="prague-header-wrapper">

            <!--NAVIGATION-->
            <div class="prague-navigation">
                <div class="pargue-navigation-wrapper">
                    <div class="prague-navigation-inner">
                        <nav>
                            <ul class="main-menu">
                                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children "><a href="<?=base_url()?>">Home</a> </li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children "><a href="<?=base_url()?>about">ABOUT</a> </li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children "><a href="<?=base_url()?>destinations">DESTINATIONS</a> </li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children "><a href="<?=base_url()?>gallery">GALLERY</a> </li>
                                <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children "><a href="<?=base_url()?>contact">CONTACT</a> </li>
							</ul>
                        </nav>

                    </div>
                </div>
            </div>
            <!--/NAVIGATION-->


            <!-- mobile icon -->
            <div class="prague-nav-menu-icon">
                <a href="#">
                    <i></i>
                </a>
            </div>
            <!-- /mobile icon -->

            <!--SOCIAL-->
            <div class="prague-social-nav">
                <a href="#">
                    <i class="fa fa-chain-broken" aria-hidden="true"></i>
                </a>

                <ul class="social-content">
                    <li>
                        <a target="_blank" href="https://www.instagram.net/foxthemes">
                            <i aria-hidden="true" class="fa fa-instagram"></i>
                        </a>
                    </li>
                </ul>

            </div>
            <!--/SOCIAL-->

        </div>
    </header>
    <!--END HEADER-->