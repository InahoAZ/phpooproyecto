<?php  
?>


<div class="container">
	<div class="row">
		<div class="col-md-12"><h2>Filtrar por Fecha</h2>
			<div class="row">
				<div class="col-md-4">Fecha 1</div>
				<div class="col-md-4">Fecha 2</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
		<table class="table ">
		<tr>
		<td><h2>Libro Diario</h2></td>
		<td align="right"><h2>Fecha: <?php echo date('d-m-Y');  ?></h2></td>
		</tr>
		</table>
			<table class="table table-stripped ">
				<tr class="table-head-pers" valign="center" >
					<th>Fecha</th>
					<th>Codigo</th>
					<th colspan="2">Cuentas y Detalle</th>
					<th>DEBE</th>
					<th>HABER</th>
				</tr>
				<?php		
				$debe = 0;
				$haber = 0;
				while($detalleasiento = mysqli_fetch_assoc($datos['detalleasiento'])){ 
					if ($detalleasiento['cod_cuenta'] == 0 ) {	?>
					<tr class="info">
						<td><?php echo  $detalleasiento['fecha_asiento']; ?></td>					
						<td colspan="5"><center><?php echo  $detalleasiento['num_asiento']; ?></center></td>
					</tr>

					<?php								
				}else{
					?>
					<tr class="">					
						<td><?php echo $detalleasiento['num_asiento']; ?></td>
						<td><?php echo $detalleasiento['cod_cuenta'] ?></td>
						<td></td>					
						<td><?php echo $detalleasiento['detalle'] ?></td>
						<td><?php echo $detalleasiento['debe'] ?></td>
						<td><?php echo $detalleasiento['haber'] ?></td>
					</tr>					
					
					<?php 
					$debe += $detalleasiento['debe'];
					$haber += $detalleasiento['haber'];

				}}	
				?>
				<tr>
					<td class="highrow"></td>
					<td class="highrow"></td>
					<td class="highrow"></td>
					<td class="highrow"></td>
					<td class="highrow"></td>
					<td class="highrow"></td>
				</tr>
				<tr class="" >
					<th></th>
					<th>TOTAL</th>
					<th colspan="2"></th>
					<th><?php echo $debe; ?></th>
					<th><?php echo $haber; ?></th>
				</tr>				

			</table>
		</div>
	</div>


</div>

