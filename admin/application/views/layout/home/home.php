<?php if($this->session->userdata['logged_in']['administrator']==1)
                { ?>
<div class="home-main col-sm-10" id="home_main">
	<div class="content-stadisticas">
		<div class="row" style="display:flex;align-items:center;">
			<div class="col-xs-12 col-md-4">
				<h5 style="margin:0">ESTADISTICAS GENERALES</h5>
			</div>
			<div class="col-xs-12 col-md-8 filter">
				<form class="form-filter" id="myForm" method="POST" action="<?php echo base_url() ?>">
				<input type="date" name="fecha_inicio" value="<?php echo $_POST['fecha_inicio'] ?>">
				<input type="date" name="fecha_fin" value="<?php echo $_POST['fecha_fin'] ?>">
				<input type="submit" value="Filtrar">
				<a class="btn-reniciar" href="<?php echo base_url() ?>">Reiniciar</a>
				</form>
			</div>
		</div>
		<table id="list" class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Asesor</th>
					<th>Cantidad de potenciales clientes</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$html='';
					foreach ( $vendedores as $fila ){
					
						$html.='<tr>
							<td>'.$fila->{'vendedor'}.'</td>
							<td>'.$fila->{'kantt'}.'</td>
						</tr>';

					}
					echo $html;
				?>				
			</tbody>
		</table>
		<div class="content">
			Potenciales clientes sin asignar: <?php echo $total_sinasignar ?><br><strong>Total: <?php echo $total ?></strong>
		</div>
	</div>
</div>
<br style="clear:both;"/>
<?php } ?>
