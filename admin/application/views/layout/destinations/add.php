<?php
if ($this->session->userdata['logged_in']['administrator']==0) {
	header("location: ".base_url());
}
?>
<div class="home-main col-sm-10" id="home_main">
	<div class="home-content" style="margin-top:0px; padding-top:20px;">
		<div class="navbar-inner">
			<ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="#tab1" data-toggle="tab">Info</a></li>
			  <!--<li role="presentation"><a href="#tab2" data-toggle="tab">Subtabla relacionada</a></li>-->
			</ul>
		</div>
		<div class="tab-content" id="adm_form">
		  <div class="tab-pane active" id="tab1">
				
			 <form method="post" action="<?php echo base_url()?>destinations/save/">
 
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
				 			
			 				<div class="td-input">
								<b>Title:</b><br>
								<input type="text" name="nombre_<?php echo $lan->{'abr'} ?>" id="nombre" value="<?php if(isset($info[$keylang]->{'nombre'})) echo $info[$keylang]->{'nombre'} ?>">
							</div>
			 				<div class="td-input">
								<b>Description:</b><br>
								<input type="text" name="descripcion_<?php echo $lan->{'abr'} ?>" id="descripcion" value="<?php if(isset($info[$keylang]->{'descripcion'})) echo $info[$keylang]->{'descripcion'} ?>">
							</div>
				 			
					        <div class="td-input">
		    					<input type="hidden" name="id_idioma_<?php echo $lan->{'abr'} ?>" value="<?php echo $lan->{'id'} ?>">
		    				</div>

			 			</div>
			 		<?php endforeach; ?>
			 		
			 		
        				<div class="td-input">
        					<b>HOME Image:</b><br>
        					<input type="text" name="galeria8_input" id="galeria8_input" class="img-input" value="" readonly>
        					<div id="main_uploader">
        						<div class="uploader-id8">
        							<div id="uploader8" align="left">
        								<input id="uploadify8" type="file" class="uploader" />
        							</div>
        						</div>
        						<div id="filesUploaded" style="display:none;"></div>
        						<div id="thumbHeight8" style="display:none;" >800</div>
        						<div id="thumbWidth8" style="display:none;" >1440</div>
        					</div>
        					<div id="galeria8" class="upload-galeria">
        					</div>
        				</div>			 		
			 		
				        <div class="td-input">
        					<b>Image:</b><br>
        					<input type="text" name="galeria7_input" id="galeria7_input" class="img-input" value="" readonly>
        					<div id="main_uploader">
        						<div class="uploader-id7">
        							<div id="uploader7" align="left">
        								<input id="uploadify7" type="file" class="uploader" />
        							</div>
        						</div>
        						<div id="filesUploaded" style="display:none;"></div>
        						<div id="thumbHeight7" style="display:none;" >800</div>
        						<div id="thumbWidth7" style="display:none;" >1440</div>
        					</div>
        					<div id="galeria7" class="upload-galeria">
        				 
        					</div>
        				</div>
                        
			 		</div>
			 	</div>

				   
			 </form>
		  </div>
		  <div class="tab-pane" id="tab2">
		  </div>
	   </div>
	   <div class="btn btn-success btn-sm pull-right bt-save" style="margin-right:8px;">GUARDAR</div>
	   <a href="<?php echo base_url()?>destinations/"><div class="btn btn-default btn-sm pull-right" style="margin-right:8px;">CANCELAR</div></a>
	</div>
</div>
<br style="clear:both;"/>