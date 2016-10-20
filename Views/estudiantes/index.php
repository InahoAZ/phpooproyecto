



 <table border="" class="table">
 		<tr>
 			<td> ID</td>
			<td> Nombre</td>
			<td> Edad</td>
			<td> Curso</td>
 		</tr>
 		<?php while ( $row= mysqli_fetch_array($datos)) { ?>

 		
		<tr>

			<td> <?php echo $row['id'] ; ?> </td>
			<td> <?php echo $row['nombre'] ; ?></td>
			<td> <?php echo $row['edad'] ; ?></td>
			<td> <?php echo $row['curso'] ; ?></td>

		</tr>
	<?php } ?>
		
 </table>