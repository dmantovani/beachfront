<div class="home-main col-sm-10" id="home_main">
	<div class="home-content" style="margin-top:0px; padding-top:20px;">
		<div class="navbar-inner">
			<div class="main-buttons">
				<div class="btn btn-success btn-sm pull-right bt-save" style="margin-right:8px;">GUARDAR</div>
				<a href="<?php echo base_url()?>countries/"><div class="btn btn-default btn-sm pull-right" style="margin-right:8px;">CANCELAR</div></a>
			</div>
			<ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="#tab1" data-toggle="tab">NUEVO IDIOMA</a></li>
			</ul>
		</div>
		<div class="tab-content" id="adm_form">
		  <div class="tab-pane active" id="tab1">
			 <form method="post" action="<?php echo base_url()?>countries/save/">
			 
				<div class="td-input">
					<b>Titulo Idioma:</b><br>
					<input type="text" name="shortname" id="shortname">
				</div>
				<div class="td-input">
					<b>ABR:</b><br>
					<input type="text" name="abr" id="abr">
				</div>
				<div class="td-input">
					<b>Descripci&oacute;n del idioma:</b><br>
					<input type="text" name="lang_name" id="lang_name">
				</div>
				
				<input style="display:none" type="text" name="descripcion" id="wysihtml5-textarea" value="">	

				
			 </form>
		  </div>
		  <div class="tab-pane" id="tab2">
			 iframe listado subtabla
		  </div>
	   </div>
	   
	</div>
</div>
<br style="clear:both;"/>