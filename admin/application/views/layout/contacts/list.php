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
						<h2>FORM CONTACTS</h2>
					</div>
					 
				</div>
			</div>
			<table id="list" class="table table-striped table-bordered dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th width="40">ID</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>
						<th>Message</th>						
						<th width="40">ADDED AT</th>
						<th width="40">MODIFIED AT</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$html='';
						foreach ( $info as $fila ){
						
							$html.='<tr>
								<td>'.$fila->{'id'}.'</td>
								<td>'.$fila->{'name'}.'</td>
								<td>'.$fila->{'phone'}.'</td>
								<td>'.$fila->{'email'}.'</td>
								<td>'.$fila->{'message'}.'</td>
								<td>'.date("d/m/Y",$fila->{'added_at'}).'</td>
								<td>'.date("d/m/Y",$fila->{'modified_at'}).'</td>
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