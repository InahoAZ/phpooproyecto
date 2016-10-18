<div class="box-principal">
	<h3 class="titulo">Listado de Materiales<br></h3>	

	<div class="panel panel-success">		
		<div class="panel-heading">
			<h3 class="panel-title">Listado de Materiales</h3>
		</div>
		<div class="panel-body">
			<h3 class="panel-title"><label for="inputEmail" class="control-label">Buscar Material</label></h3>
			<form class="navbar-form navbar-left" action="<?php echo URL; ?>materiales/buscar" method="GET">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscar" name="buscar" required>
				</div>
				<button type="submit" class="btn btn-default">Buscar</button>
			</form>
		</div>
		<div class="panel-body">
			<table class="table table-responsive table-hover ">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Precio Unitario</th>
						<th>Unidad</th>
						<th>Disponible</th>
						<th>Proveedor</th>			     
						<th colspan="3">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($datos['materiales'])) { ?>				
						<tr>			      
							<td><?php echo $row['cod_material'];?></td>
							<td><?php echo $row['descripcion'];?></td>
							<td><?php echo "$" . $row['precio_unitario'];?></td>							
							<td><?php echo $row['abreviatura_unidad'];?></td>
							<td><?php echo $row['stock'] ."&nbsp;"?></td>							
							<td><?php echo $row['razon_social'];?></td>

					
							<td><a class="btn btn-primary" onClick="javascript: return mateHisto('<?php echo URL; ?>','<?php echo $row['cod_material'];?>');"><img height="25" width="25" class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/ico/history.png"></a></td>

							<td><a class="btn btn-warning" onClick="javascript: return mateEditar('<?php echo URL; ?>','<?php echo $row['cod_material'];?>');"><img height="25" width="25" class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/ico/edit.png"></a></td>

							<td><a class="btn btn-danger" onClick="javascript: return mateEliminar('<?php echo URL; ?>','<?php echo $row['cod_material'];?>');"><img height="25" width="25" class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/ico/delete.png"></a></td>




					

						</tr>
						<?php } ?>
					</div>
				</div>

			</div>