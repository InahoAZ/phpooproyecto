
	
<div class="row">
			<div class="col-md-20">
	<div class="panel panel-success">			
		<div class="panel-body"></div>
		<h3 class="panel-title"><label for="inputEmail" class="control-label">Buscar Cliente</label></h3>
		<form class="navbar-form navbar-left" action="<?php echo URL; ?>clientes/buscar" method="GET">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Buscar" name="buscar" required>
			</div>
			<button type="submit" class="btn btn-default">Buscar</button>
		</form>

		
			<div class="panel-body"></div>
			<div class="table-condensed">
				<table class="table table-striped table-hover ">
					<thead>
						<tr>
							<th>Apellido y Nombre</th>
							<th>Documento</th>							
							<th>Cuit</th>
							<th>Telefono</th>
							<th>IVA</th>
							<th colspan="2">Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row = mysqli_fetch_array($datos['clientes'])) { ?>				
							<tr>			      
								<td><?php echo $row['apyn'];?></td>
								<td><?php echo $row['documento'];?></td>								
								<td><?php echo $row['cuit'];?></td>
								<td><?php echo $row['telefono'];?></td>
								<td><?php echo $row['iva'];?></td>
								<td><a class="btn btn-info" href=" <?php echo URL; ?>ventas/addClienteFactura/<?php echo $row['cod_clientes']?>">Seleccionar</a></td>						
							</tr>
							<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>

		</div>

	