<?php
if ($this->session->userdata['logged_in']['administrator']==0) {
	header("location: ".base_url());
}
?>
<div class="home-main col-sm-10" id="home_main">
	<div class="home-content" style="margin-top:0px; padding-top:20px;">
		<div class="navbar-inner">
			<ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="#tab1" data-toggle="tab">Datos</a></li>
			  <!--<li role="presentation"><a href="#tab2" data-toggle="tab">Subtabla relacionada</a></li>-->
			</ul>
		</div>
		<div class="tab-content" id="adm_form">
		  <div class="tab-pane active" id="tab1">
			 <form method="post" action="<?php echo base_url()?>config/update/<?php echo $info[0]->{'id'}?>/">

			 	<!-- Nav tabs -->
			 	<ul class="nav nav-tabs">
			 		<?php foreach($lang as $keylang => $lan): ?>
			 			<li class="nav-item">
			 			  <a class="nav-link <?php if($keylang == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#sec<?php echo $lan->{'id'} ?>">Titulo <?php echo $lan->{'titulo'} ?></a>
			 			</li>
			 		<?php endforeach; ?>
			 	</ul>


			 	<!-- Tab panes -->
			 	<div class="tab-content">
		 			<?php foreach($lang as $keylang => $lan): ?>
			 			<div class="tab-pane lang-buttons <?php if($keylang == 0): ?> active <?php endif; ?>" id="sec<?php echo $lan->{'id'} ?>">

							<h4>META TAGS</h4>
							
			 				<div class="td-input">
								<b>Page Title:</b><br>
								<input type="text" name="title_<?php echo $lan->{'abr'} ?>" id="title" value="<?php if(isset($info[$keylang]->{'page_title'})) echo $info[$keylang]->{'page_title'} ?>">
							</div>

							<div class="td-input">
								<b>Page Desc:</b><br>
								<input type="text" name="desc_<?php echo $lan->{'abr'} ?>" id="desc" value="<?php if(isset($info[$keylang]->{'page_desc'})) echo $info[$keylang]->{'page_desc'} ?>">
							</div>
							<input type="hidden" name="id_idioma_<?php echo $lan->{'abr'} ?>" value="<?php echo $lan->{'id'} ?>">
							
							<h4>HERO SECTION</h4>
							
							<div class="td-input">
								<b>Hero Title</b><br>
								<input type="text" name="hero_title_<?php echo $lan->{'abr'} ?>" id="desc" value="<?php if(isset($info[$keylang]->{'hero_title'})) echo $info[$keylang]->{'hero_title'} ?>">
							</div>
							
							<div class="td-input">
								<b>Hero Desc</b><br>
								<input type="text" name="hero_desc_<?php echo $lan->{'abr'} ?>" id="desc" value="<?php if(isset($info[$keylang]->{'hero_desc'})) echo $info[$keylang]->{'hero_desc'} ?>">
							</div>
							
							<h4>INTRO TEXT</h4>
							<div class="td-input">
								<b>Hero Desc</b><br>
								<input type="text" name="intro_text_<?php echo $lan->{'abr'} ?>" id="desc" value="<?php if(isset($info[$keylang]->{'intro_text'})) echo $info[$keylang]->{'intro_text'} ?>">
							</div>
							
							
							<h4>OUR YATCH</h4>
							<div class="td-input">
								<b>Title</b><br>
								<input type="text" name="our_yatch_title_<?php echo $lan->{'abr'} ?>" id="desc" value="<?php if(isset($info[$keylang]->{'our_yatch_title'})) echo $info[$keylang]->{'our_yatch_title'} ?>">
							</div>
							<div class="td-input">
								<b>Description</b><br>
								<input type="text" name="our_yatch_desc_<?php echo $lan->{'abr'} ?>" id="desc" value="<?php if(isset($info[$keylang]->{'our_yatch_desc'})) echo $info[$keylang]->{'our_yatch_desc'} ?>">
							</div>
							
			 			</div>
			 		<?php endforeach; ?>

		  
		 		</div>
			       
			 </form>
		  </div>
		  <div class="tab-pane" id="tab2">
			 iframe listado subtabla
		  </div>
	   </div>
	   <div class="btn btn-success btn-sm pull-right bt-save" style="margin-right:8px;">GUARDAR</div>
	   <a href="<?php echo base_url()?>usuarios/"><div class="btn btn-default btn-sm pull-right" style="margin-right:8px;">CANCELAR</div></a>
	</div>
</div>
<br style="clear:both;"/>