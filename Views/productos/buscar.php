
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
						<th>Precio Sugerido</th>
						<th>Stock</th>
						<th>Precio Unitario</th>			     
						<th colspan="2">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($datos)) { ?>				
						<tr>			      
							<td><?php echo $row['cod_producto'];?></td>
							<td><?php echo $row['descripcion'];?></td>
							<td><?php echo $row['precio_sugerido'];?></td>
							<td><?php echo $row['stock'] ."&nbsp;". $row['abreviatura_unidad'];?></td>							
							<td><?php echo $row['precio_unitario'];?></td>
							
							<td><a class="btn btn-primary" onClick="javascript: return mateReabastecer('<?php echo URL; ?>','<?php echo $row['cod_producto'];?>');"><i class="glyphicon glyphicon-plus""></i></a></td>

					
							<td><a class="btn btn-primary" onClick="javascript: return mateHisto('<?php echo URL; ?>','<?php echo $row['cod_producto'];?>');"><i class="glyphicon glyphicon-time"></i></a></td>

							<td><a class="btn btn-warning" onClick="javascript: return mateEditar('<?php echo URL; ?>','<?php echo $row['cod_producto'];?>');"><i class="glyphicon glyphicon-edit"></i></a></td>

							<td><a class="btn btn-danger" onClick="javascript: return mateEliminar('<?php echo URL; ?>','<?php echo $row['cod_producto'];?>');"><i class="glyphicon glyphicon-trash"></i></a></td>

						</tr>
						<?php } ?>
					</div>
	
		<div class="panel-body"><a href="<?php echo URL;?>productos" class="btn btn-default">Volver</a></div>

	</div>
		
</div>