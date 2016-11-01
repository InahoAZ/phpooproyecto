<div class="container">	
	
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
				$a = mysqli_num_rows($datos['detalleasiento']);

				$debe = 0;
				$haber = 0;
				$asien = 0;
				$ccuenta = 0;
				$debeasien = 0;
				$debeaux = 0;
				$haberasien = 0;
				while($detalleasiento = mysqli_fetch_assoc($datos['detalleasiento'])){ 					
					if ($detalleasiento['cod_cuenta'] == 0 ) {
						if($asien != $detalleasiento['num_asiento']){	

							?>
							<tr class="info">
								<td><?php echo  $detalleasiento['fecha_asiento']; ?></td>					
								<td colspan="4"><center><?php echo  $detalleasiento['num_asiento']; ?></center></td>
								<?php if($detalleasiento['concepto'] == "Reabastecimiento") {?>
								<td align="right"><a title="Ver Comprobante" class="btn btn-default btn-xs" href=" <?php echo URL; ?>materiales/reabastecerComprobante/<?php echo $detalleasiento['cod_factura']?>"><i class="glyphicon glyphicon-eye-open"></i></a></td>
								<?php }elseif($detalleasiento['concepto'] == "Venta"){ ?>
								<td align="right"><a title="Ver Comprobante" class="btn btn-default btn-xs" href=" <?php echo URL; ?>ventas/verfactura/<?php echo $detalleasiento['cod_factura']?>"><i class="glyphicon glyphicon-eye-open"></i></a></td>
								<?php } ?>
							</tr>

							<?php
							$asien = $detalleasiento['num_asiento'];								
						}}elseif($detalleasiento['cod_cuenta'] != 0 ){


							if($detalleasiento['cod_cuenta'] != $ccuenta){
								


								?>
							<tr class="">					
								<td><?php //echo $detalleasiento['num_asiento']; ?></td>
								<td><?php echo $detalleasiento['cod_cuenta'] ?></td>
								<td></td>					
								<td><?php echo $detalleasiento['detalle'] ?></td>
								<td><?php echo number_format($detalleasiento['debe'], 2, ',', '');  ?></td>
								<td><?php echo number_format($detalleasiento['haber'], 2, ',', '');  ?></td>
							</tr>


								<?php 
								$debeasien += $detalleasiento['debe'];				

								$ccuenta = $detalleasiento['cod_cuenta'];


							}
					//$debeasien = 0;
					//$haberasien = 0;
							//echo $debeasien;
							$debe += $detalleasiento['debe'];
							$haber += $detalleasiento['haber'];
							?>
							
							<?php
						}

					}

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
	<div class="row">
		<div class="col-md-5"></div>
		<div class="col-md-2"><a href="<?php echo URL ?>contabilidad/librodiario" class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i> Ver Todos los Asientos</a></div>		
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

<?php 




/*
$a = 0;
$b = 10;

$c = 1;
$d = 5;

while ($a < $b) {
	echo "Asiento " . $a . "<br>" ;
	$a++;

	while ($c < $d) {
		echo $c . "<br>";
		$c++;

	}
	$c = 3;

}*/








	//$i2 = 0; 
	/*for ($i=1; $i < 10; $i++) {			
		echo "Asiento N" . $i . "<br>";
		//echo $i2. "a<br>";			
		for ($ia=8; $ia <  10; $ia++) { 
			echo "Cuenta N°" . $ia . "<br>";			
		}
		//++$i2;
	} */
	



	?>