
<div class="box-principal">
<h3 class="titulo">Resultado de la Busqueda<br></h3>	


	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Se encontraron <?php $cuenta = mysqli_num_rows($datos); echo $cuenta;?> resultados.</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Precio Unitario</th>
						<th>Unidad</th>
						<th>Stock</th>
						<th>Proveedor</th>			     
						<th colspan="2">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($datos)) { ?>				
						<tr>			      
							<td><?php echo $row['cod_material'];?></td>
							<td><?php echo $row['descripcion'];?></td>
							<td><?php echo "$" . $row['precio_unitario'];?></td>							
							<td><?php echo $row['abreviatura_unidad'];?></td>
							<td><?php echo $row['stock'] ."&nbsp;". $row['abreviatura_unidad'];?></td>							
							<td><?php echo $row['razon_social'];?></td>
							
							<td><a class="btn btn-warning" href=" <?php echo URL; ?>materiales/editar/<?php echo $row['cod_material']?>">Editar</a></td>
							<td><a class="btn btn-danger" href=" <?php echo URL; ?>materiales/eliminar/<?php echo $row['cod_material']?>">Eliminar</a></td>
						</tr>
						<?php } ?>
					</div>
	
		<div class="panel-body"><a href="<?php echo URL;?>materiales" class="btn btn-default">Volver</a></div>

	</div>
		
</div>