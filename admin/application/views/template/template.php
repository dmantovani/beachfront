<html>
   <head>
   	  <meta charset="utf-8" />
      <title>Administrador Web</title>
	  <meta name="description" content="Administrador de contenidos">
	  <meta name="keywords" content="<?= $keywords ?>">
	  <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
	  
	  <meta property="og:title" content="Administrador" />
	  <meta property="og:type" content="<?= $ogType ?>" />
	  <meta property="og:url" content="<?php echo base_url(uri_string()) ?>" />
	  <meta property="og:image" content="<?= base_url().$image ?>" />
	  <meta property="og:description" content="<?= $description ?>" />
	  
	  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
	  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap.min.css">
	  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap-theme.min.css">
	  <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/jquery-ui.css">
	  <link rel="stylesheet"  href="<?php echo base_url() ?>asset/css/datatables.css" type="text/css" media="all" />
	  <link rel="stylesheet"  href="<?php echo base_url() ?>asset/css/bootstrap-wysihtml5.css" type="text/css" media="all" />
	  <link rel="stylesheet"  href="<?php echo base_url() ?>asset/css/uploadify.css" type="text/css" media="all" />
	  <link rel="stylesheet"  href="<?php echo base_url() ?>asset/css/main.css" type="text/css" media="all" />

	  
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />  
	  
	  <script>var p_section = "<?php echo $this->uri->segment(1);?>"; var p_accion = "<?php echo $this->uri->segment(2);?>"; var p_id = "<?php echo $this->uri->segment(3);?>"; var base_url = "<?php echo base_url() ?>";</script>
	  <?= $_styles ?>
   </head>
   <body>
	  <?= $header ?>
	  <div class="col-md-12 admin-content">
		  <?= $nav ?>	  
		  <?= $content ?>
	  </div>
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery-1.11.1.js"></script>		  
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/main.js"></script> 
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.dataTables.min.js"></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/dataTables.bootstrap.min.js"></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.base64.js"></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/wysihtml5.js"></script>
	  <!--<script type="text/javascript" src="<?php echo base_url() ?>asset/js/editor/tinymce.min.js"></script>-->
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/advanced.js"></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.uploadifive.min.js"></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery.confirmExit.min.js"></script>
	  <script type="text/javascript" src="<?php echo base_url() ?>asset/js/jquery-ui.min.js"></script>
	 
	  <script type="text/javascript">
	  	    $('.collapse-header').on('click', function () {
	  	        $($(this).data('target')).collapse('toggle');
	  	    });
	  </script>
	  <script type="text/javascript">
	  	$('[data-toggle="collapse"]').click(function() {
	  	  $('.collapse.in').collapse('hide')
	  	});
	  </script>

	  <?= $_scripts ?>
	  
	  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" align="center">
						<h3>Esta seguro que desde eliminar este registro?</h3>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
	   </div>
	   <div class="modal fade" id="confirm-quit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body" align="center">
						<h3>Esta seguro que desea salir sin guardar los datos?</h3>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Salir</a>
					</div>
				</div>
			</div>
	   </div>
	   <div class="alert alert-danger alert-dismissible" id="main_alert"></div>

	   <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
	   <script type="text/javascript">
	   	$(document).ready(function () {
	   	      $('select').selectize({
	   	          sortField: 'text'
	   	      });
	   	  });
	   </script>
	   
   </body>
</html>