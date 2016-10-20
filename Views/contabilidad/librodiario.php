<?php  
?>


<div class="container">
	<h2>Libro Diario</h2>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-stripped ">
				<tr class="table-head-pers" valign="center" >
					<th>Fecha</th>
					<th>Codigo</th>
					<th colspan="2">Cuentas y Detalle</th>
					<th>DEBE</th>
					<th>HABER</th>
				</tr>
				<?php 	$iaux = -1;	 		
				while ($asientos = mysqli_fetch_assoc($datos['asientos'])) {
					?>
					<tr class="info">
						<td><?php echo  $asientos['fecha_asiento']; ?></td>					
						<td colspan="5"><center><?php echo  $asientos['num_asiento']; ?></center></td>
					</tr>					
					<?php
					$num_asiento = $asientos['num_asiento'];
					$iaux++;
					echo $iaux . ": " .$num_asiento. "<br>";

					

					if($num_asiento > $iaux){
					
					while($detalleasiento = mysqli_fetch_assoc($datos['detalleasiento'])){
						$num_asiento2 = $detalleasiento['num_asiento'];
						if($iaux < $num_asiento2)
							echo $num_asiento2 . "<br>";
							?>
							<tr class="">					
								<td><?php echo $detalleasiento['num_asiento']; ?></td>
								<td><?php echo $detalleasiento['cod_cuenta'] ?></td>
								<td></td>					
								<td><?php echo $detalleasiento['detalle'] ?></td>
								<td><?php echo $detalleasiento['debe'] ?></td>
								<td><?php echo $detalleasiento['haber'] ?></td>
							</tr>

							<?php }
							

						}
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
						<th>total debe</th>
						<th>total haber</th>
					</tr>				

				</table>
			</div>
		</div>


	</div>

	<?php $i2 = 0; 
	for ($i=1; $i < 10; $i++) {		
		echo "------ <br> ";
		echo "Asiento N" . $i . "<br>";
		//echo $i2. "a<br>";
		if($i != $i2)
			echo "_____ <br>";
	 		for ($ia=8; $ia <  10; $ia++) { 
	 			echo $ia . "<br>";			
		}
	 	++$i2;
	 } 
	



	?>