<div class="box-principal">
	<h3 class="titulo">Ventas Realizadas<br></h3>	

	<div class="panel panel-success">		
		<div class="panel-heading">
			<h3 class="panel-title">Historial de Ventas</h3>
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
						<button type="submit" class="btn btn-info">Buscar</button>
						</div>
					</form>
				</div>
				<div class="col-xs-6 text-center">
					<a class="btn btn-default" href="<?php //echo URL; ?>ventas/productosmasVendidos">Ver Productos más vendidos</a>				
					<a class="btn btn-default" href="<?php //echo URL; ?>ventas/graficoventas">Ver Gráfico de Ventas</a>
					<a class="btn btn-success" href="<?php //echo URL; ?>ventas/historial">Ver Todas las Ventas</a>
				</div>
			</div>
			
		</div>




		<div class="panel-body">
			<table class="table table-striped table-hover ">
				<thead>
					<tr><th></th>
						<th>Numero de Factura</th>
						<th>Tipo de Factura</th>
						<th colspan="2">Cliente</th>						
						
						<th>Fecha de Factura</th>			     
						
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($datos)) { //$total = $row['precio_unitario']* $row['q'] ?>				
					<tr>
						<td><a class="btn btn-defaultt" href=" <?php echo URL; ?>ventas/verfactura/<?php echo $row['cod_factura']?>"><img height="10" width="10" class="icon" src="<?php echo URL;?>Views/template/imagenes/ico/view.png"></a></td>		      
						<td><?php echo "#" . $row['num_factura'];?></td>
						<td><?php echo "Factura " . $row['tipo_factura'];?></td>							
						<td><?php echo $row['apyn'] ."&nbsp;"?></td>							
						<td><?php echo $row['iva'];?></td>
						<td><?php echo $row['fecha_factura'];?></td>

					</tr>
					<?php } ?>
				</tbody>
			</div>

		</div>