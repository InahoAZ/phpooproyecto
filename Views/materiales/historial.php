<div class="box-principal">
	<h3 class="titulo">Listado de Materiales<br></h3>	

	<div class="panel panel-success">		
		<div class="panel-heading">
			<h3 class="panel-title">Historial de Reabastecimientos</h3>
		</div>		
		
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-5">
					<h3 class="panel-title"><label for="inputEmail" class="control-label">Buscar por Fecha</label></h3>
					<form class="navbar-form navbar-left form-horizontal" action="" method="POST">				
						<div class="form-group">
							<label for="inputEmail" class="control-label">Desde &nbsp;&nbsp;&nbsp;&nbsp;</label>							
							<input type="date" class="form-control" placeholder="" name="fecha1" required>
							<label for="inputEmail" class="control-label">Hasta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
							<input type="date" class="form-control" placeholder="" name="fecha2" required>

						</div>
						<div class="col-xs-12 text-center">
						<button type="submit" class="btn btn-info">Buscar</button></div>
					</form>
				</div>
				<div class="col-xs-6 text-center">
					<a class="btn btn-default" href="<?php echo URL; ?>materiales/materialesFrecuentes">Ver Materiales más adquiridos</a>				
					<a class="btn btn-default" href="<?php echo URL; ?>materiales/materialesGastos">Ver Gastos Realizados</a>
					<a class="btn btn-success" href="<?php echo URL; ?>materiales/historial">Ver Todas las Compras</a>
				</div>
			</div>
			
		</div>




		<div class="panel-body">
			<table class="table table-striped table-hover ">
				<thead>
					<tr><th></th>
						<th>Codigo</th>
						<th>Descripcion</th>
						<th>Total</th>						
						<th>Cantidad Añadida</th>
						<th>Proveedor</th>
						<th>Fecha de Carga</th>			     
						
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($datos)) { $total = $row['precio_unitario']* $row['q'] ?>				
					<tr>
						<td><a class="btn btn-defaultt" href=" <?php echo URL; ?>materiales/reabastecerComprobante/<?php echo $row['cod_operacion']?>"><img height="10" width="10" class="icon" src="<?php echo URL;?>Views/template/imagenes/ico/view.png"></a></td>		      
						<td><?php echo $row['cod_material'];?></td>
						<td><?php echo $row['descripcion'];?></td>
						<td><?php echo "$" . $total; ?></td>						
						<td><?php echo $row['q'] ."&nbsp;"?></td>							
						<td><?php echo $row['razon_social'];?></td>
						<td><?php echo $row['fecha_operacion'];?></td>

					</tr>
					<?php } ?>
				</tbody>
				</div>
			</div>

		</div>