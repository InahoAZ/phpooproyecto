<div class="box-principal">
	<h3 class="titulo">Listado de Clientes<br></h3>	
<div class="row">
			<div class="col-md-20">
	<div class="panel panel-success">		
		<div class="panel-heading">
			<h3 class="panel-title">Listado de Clientes</h3>
		</div>
		<div class="panel-body"></div>
		<h3 class="panel-title"><label for="inputEmail" class="control-label">Buscar Cliente</label></h3>
		<form  name="index" class="navbar-form navbar-left" action="<?php echo URL; ?>clientes/buscar" method="GET">
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
							<th>Fecha de Nacimiento</th>
							<th>Direccion</th>
							<th>Cuit</th>
							<th>Telefono</th>
							<th>IVA</th>
							<th colspan="2">Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row = mysqli_fetch_array($datos)) { ?>				
							<tr>			      
								<td><?php echo $row['apyn'];?></td>
								<td><?php echo $row['documento'];?></td>
								<td><?php echo $row['fnac'];?></td>
								<td><?php echo $row['direccion'];?></td>
								<td><?php echo $row['cuit'];?></td>
								<td><?php echo $row['telefono'];?></td>
								<td><?php echo $row['iva'];?></td>


								<td><a class="btn btn-warning" onClick="javascript: return boxEditar('<?php echo URL; ?>','<?php echo $row['cod_clientes'];?>');">Editar</a></td>
							
								<td><a class="btn btn-danger" onClick="javascript: return boxEliminar('<?php echo URL; ?>','<?php echo $row['cod_clientes'];?>');">Eliminar</a></td>

							</tr>
							<?php } ?>
						</tbody>
					</table>
					</div>
				</div>
			</div>

		</div>

	</div>