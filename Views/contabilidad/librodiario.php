<?php  


?>


<div class="container">
	<div class="row">
		<div class="col-md-12"><h2>Filtrar por Fecha</h2>
			<div class="row">
				<form action="" method="POST" class="form">
					<div class="col-md-4"><input type="date" name="fecha1" id="fecha1" class="form-control"></div>
					<div class="col-md-4"><input type="date" name="fecha2" id="fecha2" class="form-control"></div>
					<div class="col-md-2"><button type="submit" name="submit" id="submit" class="btn btn-default">Filtrar</button></div>
				</form>	
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<table class="table ">
				<tr>
					<td><h2>Libro Diario</h2></td>		
				</tr>
			</table>
			<table class="table table-condensed ">
				<tr class="table-head-pers" valign="center" >
					<th>Fecha</th>
					<th>Codigo</th>
					<th colspan="2">Cuentas y Detalle</th>
					<th>DEBE</th>
					<th>HABER</th>
				</tr>
				<?php
				$a = mysqli_num_rows($datos['detalleasiento']);	
				$debe = 0;
				$haber = 0;
				while($detalleasiento = mysqli_fetch_assoc($datos['detalleasiento'])){ 					
					if ($detalleasiento['cod_cuenta'] == 0 ) {	?>
					<tr class="info">
						<td><?php echo  $detalleasiento['fecha_asiento']; ?></td>					
						<td colspan="4"><center><?php echo  $detalleasiento['num_asiento']; ?></center></td>
						<td align="right"><a title="Ver Comprobante" class="btn btn-default btn-sm" href=" <?php echo URL; ?>ventas/verfactura/<?php echo $detalleasiento['cod_factura']?>"><i class="glyphicon glyphicon-eye-open"></i></a></td>	
					</tr>

					<?php								
				}else{
					?>
					<tr class="">					
						<td><?php //echo $detalleasiento['num_asiento']; ?></td>
						<td><?php echo $detalleasiento['cod_cuenta'] ?></td>
						<td></td>					
						<td><?php echo $detalleasiento['detalle'] ?></td>
						<td><?php echo number_format($detalleasiento['debe'], 2, ',' , '');  ?></td>
						<td><?php echo number_format($detalleasiento['haber'], 2, ',' , '');  ?></td>
					</tr>										
					
					<?php 
					$debe += $detalleasiento['debe'];
					$haber += $detalleasiento['haber'];

				}}	
				if ($a == 0) {
					?><tr>
					<td colspan="6" align="center"><h3>No existen asientos a la fecha</h3></td>
				</tr>
				<?php					
			}
			?>
			<tr>
				<td class="highrow"></td>
				<td class="highrow"></td>
				<td class="highrow"></td>
				<td class="highrow"></td>
				<td class="highrow"></td>
				<td class="highrow"></td>
			</tr>
			<tr class="warning" >
				<th></th>
				<th>TOTAL</th>
				<th colspan="2"></th>
				<th><?php echo $debe; ?></th>
				<th><?php echo $haber; ?></th>
			</tr>				

		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-5"></div>
	<div class="col-md-2"><a href="<?php echo URL ?>contabilidad/librodiarioHoy" class="btn btn-default"><i class="glyphicon glyphicon-time"></i> Ver Asientos del d&iacute;a </a></div>		
	<div class="col-md-5"></div>
</div>
<div class="row">
	<div class="col-md-12">&nbsp;</div>
</div>
<div class="row">
	<div class="col-md-12">&nbsp;</div>
</div>
<div class="row">
	<div class="col-md-12">&nbsp;</div>
</div>


</div>

