<div class="box-principal">
	<h3 class="titulo">Listado de Materiales<br></h3>	

	<div class="panel panel-success">		
		<div class="panel-heading">
			<h3 class="panel-title">Reabastecer Materiales</h3>
		</div>
		<div class="panel-body">
			<h3 class="panel-title"><label for="inputEmail" class="control-label">Buscar Material</label></h3>
			<form  class="navbar-form navbar-left" action="<?php echo URL; ?>materiales/buscar" method="GET">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Buscar" name="buscar" required>
				</div>
				<button type="submit" class="btn btn-default">Buscar</button>
			</form>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Precio Unitario</th>
						<th>Unidad</th>
						<th>Disponible</th>
						<th>Proveedor</th>
						<th>Cantidad</th>			     
						<th colspan="2">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($datos['materiales'])) { ?>				
						<tr>			      
							<td><?php echo $row['cod_material'];?></td>
							<td><?php echo $row['descripcion'];?></td>
							<td><?php echo "$" . $row['precio_unitario'];?></td>							
							<td><?php echo $row['abreviatura_unidad'];?></td>
							<td><?php echo $row['stock'] ."&nbsp;";?></td>							
							<td><?php echo $row['razon_social'];?></td>
							<td><form  id="form_resba" class="form-horizontal" action="<?php echo URL; ?>materiales/reabastecerAdd/<?php echo $row['cod_material']?>" method="GET" enctype="multipart/form-data">
								<input id="stock" class="form-control" name="stock" type="text" ></td>

								<td><button type="button" name="btnsubmit" onclick="vali_resba()" class="btn btn-warning" >Actualizar Stock</button></td>
							</form>	
						</tr>
						<?php } ?>

					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>

</div>
</div>

</div>