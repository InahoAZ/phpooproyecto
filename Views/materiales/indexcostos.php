
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
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Precio Unitario</th>
						<th>Cantidad</th>
						<th>Proveedor</th>			     
						<th colspan="2">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($datos['materiales']) ) { ?>				
						<form class="form-horizontal" name="materialesform" action="costos/addMaterial/<?php echo $row['cod_material']?>" method="POST" enctype="multipart/form-data">						
						<tr>			      
							<td><?php echo $row['cod_material'];?></td>
							<td><?php echo $row['descripcion'];?></td>
							<td><?php echo $row['precio_unitario'];?></td>
							<td><input class="form-control" name="cantidad" type="text" required></td>
							<td><?php echo $row['razon_social'];?></td>
							<input type="hidden" name="cod_producto" value="<?php echo($datos['contar']); ?>">
							<input type="hidden" name="cod_material" value="<?php echo $row['cod_material']?>">
							<td><button class="btn btn-default" type="submit">Agregar Material</button></td>
						</form>
						</tr>
					<?php } ?>
					</div>
				</div>

			</div>