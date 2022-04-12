<div class="home-main col-sm-10" id="home_main">
	<div class="home-content" style="margin-top:0px; padding-top:10px;">
		<div class="listado">
			<div class="col-md-12 home-tools">
			<div class="col-md-8">
				<h2>IDIOMAS DE CAT&Aacute;LOGO</h2>
			</div>
			<div class="col-md-4">
				<a href="<?php echo base_url()?>countries/add/new/"><div class="btn btn-success btn-sm bt-save pull-right" style="margin-right:8px;">AGREGAR NUEVO</div></a>
			</div>
			</div>
			<table id="list" class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="40">ID</th>
						<th>Idioma</th>
						<th>ABR</th>
						<th>Desc</th>
						<th width="40">Editar</th>
						<th width="40">Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$html='';
						foreach ( $info as $fila ){
							$html.='<tr>
								<td>'.$fila->{'id'}.'</td>
								<td>'.$fila->{'titulo'}.'</td>
								<td>'.$fila->{'abr'}.'</td>
								<td>'.$fila->{'lang_name'}.'</td>
								<td align="center"><a href="'.base_url().'countries/edit/'.$fila->{'id'}.'/"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
								<td align="center"><a href="#" data-href="'.base_url().'countries/remove/'.$fila->{'id'}.'/" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
							</tr>';
						}
						echo $html;
					?>				
				</tbody>
			</table>
		</div>
	</div>
</div>
<br style="clear:both;"/>