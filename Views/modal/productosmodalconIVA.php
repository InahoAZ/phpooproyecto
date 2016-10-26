	
<?php ?>
<div class="panel panel-success">	
<h4 align="right"><b>*Nota: </b>Productos con IVA ya incluido.</h4>		
	<div class="panel-body">
		<h3 class="panel-title"><label for="inputEmail" class="control-label">Buscar Producto</label></h3>
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
					<th>Stock</th>
					<th>Cantidad</th>				     
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = mysqli_fetch_array($datos['productos']) ) { 
					$iva = ($row['precio_unitario'] * 21)/100;
					$precioU = $row['precio_unitario'] + $iva;
					?>				
				<tr>			      
					<td><?php echo $row['cod_producto'];?></td>
					<td><?php echo $row['descripcion'];?></td>
					<td><?php echo "$" . number_format($precioU, 2, ',', '');?></td>
					<td><?php echo $row['stock'];?></td>							

					<td><form action="<?php echo URL; ?>ventas/addProductoFactura" method="POST">
							<input type="hidden" name="cod_producto" value="<?php echo $row['cod_producto']?>">
							<input type="hidden" name="precio_unitario" value="<?php echo $row['precio_unitario']?>">
							<input type="text" name="cantidad" class="form-control" required>						
					</td>
					<td><button type="submit" class="btn btn-success">Agregar</button></form></td>							
				</tr>
				<?php } ?>
				</tbody>
				</table>
			</div>
		</div>



