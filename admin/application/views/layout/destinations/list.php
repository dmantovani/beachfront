<?php
if ($this->session->userdata['logged_in']['administrator']==0) {
	header("location: ".base_url());
}
?>
<div class="home-main col-sm-10" id="home_main">
	<div class="home-content" style="margin-top:0px; padding-top:10px;">
		<div class="listado">
			<div class="col-md-12 home-tools">
				<div class="row">
					<div class="col-xs-8 col-md-8">
						<h2>DESTINATIONS</h2>
					</div>
					<div class="col-xs-4 col-md-4">
						<a href="<?php echo base_url()?>destinations/add/"><div class="btn btn-success btn-sm bt-save pull-right" style="margin-right:8px;">NEW DESTINATION</div></a>
					</div>
				</div>
			</div>
			<table id="list" class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="40">ID</th>
						<th width="70">Image</th>
						<th width="70">Home Image</th>
						<th>Title</th>
						<th>Description</th>
						<th width="40">Edit</th>
						<th width="40">Remove</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$html='';
						foreach ( $info as $fila ){
							$slider_images = explode(',' , $fila->{'image'});
							$html.='<tr>
								<td>'.$fila->{'id'}.'</td>
								<td><img src="'.base_url().'../asset/img/uploads/'.$slider_images[0].'" style="width:70px;"></td>
								<td><img src="'.base_url().'../asset/img/uploads/'.$fila->{'image_home'}.'" style="width:70px;"></td>
								<td>'.$fila->{'title'}.'</td>
								<td>'.$fila->{'description'}.'</td>
								<td align="center"><a href="'.base_url().'destinations/edit/'.$fila->{'uniq'}.'/"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
								<td align="center"><a href="#" data-href="'.base_url().'destinations/remove/'.$fila->{'uniq'}.'/" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
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