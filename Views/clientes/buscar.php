<?php 
$banderaBuscar = $_GET['banderaBuscar'];
if ($banderaBuscar == 0){ ?>
<div class="box">
	<h3 class="titulo">Resultado de la Busqueda<br></h3>	


	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Se encontraron <?php $cuenta = mysqli_num_rows($datos); echo $cuenta;?> resultados.</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Apellido y Nombre</th>
						<th>Documento</th>
						<th>Fecha de Nacimiento</th>
						<th>Direccion</th>
						<th>Cuit</th>
						<th>Telefono</th>
						<th>IVA</th>
						<th colspan="2">Accion</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($row = mysqli_fetch_array($datos)) { ?>				
					<tr>			      
						<td><?php echo $row['apyn'];?></td>
						<td><?php echo $row['documento'];?></td>
						<td><?php echo $row['fnac'];?></td>
						<td><?php echo $row['direccion'];?></td>
						<td><?php echo $row['cuit'];?></td>
						<td><?php echo $row['telefono'];?></td>
						<td><?php echo $row['iva'];?></td>


						<td><a class="btn btn-warning" onClick="javascript: return boxEditar('<?php echo URL; ?>','<?php echo $row['cod_clientes'];?>');">Editar</a></td>

						<td><a class="btn btn-danger" onClick="javascript: return boxEliminar('<?php echo URL; ?>','<?php echo $row['cod_clientes'];?>');">Eliminar</a></td>	
					</tr>

					<?php } ?>
				</div>
				<div class="panel-body"><a href="<?php echo URL;?>clientes" class="btn btn-default">Volver</a></div>

			</div>

		</div>
		<?php }elseif ($banderaBuscar == 1) {?>

		<div class="box">
			<h3 class="titulo">Resultado de la Busqueda<br></h3>	


			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Se encontraron <?php $cuenta = mysqli_num_rows($datos); echo $cuenta;?> resultados.</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>Apellido y Nombre</th>
								<th>Documento</th>
								<th>Fecha de Nacimiento</th>
								<th>Direccion</th>
								<th>Cuit</th>
								<th>Telefono</th>
								<th>IVA</th>
								<th colspan="2">Accion</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_array($datos)) { ?>				
							<tr>			      
								<td><?php echo $row['apyn'];?></td>
								<td><?php echo $row['documento'];?></td>
								<td><?php echo $row['fnac'];?></td>
								<td><?php echo $row['direccion'];?></td>
								<td><?php echo $row['cuit'];?></td>
								<td><?php echo $row['telefono'];?></td>
								<td><?php echo $row['iva'];?></td>


								<td colspan="2"><a class="btn btn-info" href="<?php echo URL; ?>ventas/addClienteFactura/<?php echo $row['cod_clientes']  ?>" >Seleccionar</a></td>
									
							</tr>

							<?php } ?>
						</div>
						<div class="panel-body"><a href="<?php echo URL;?>ventas" class="btn btn-default">Volver</a></div>

					</div>

				</div>

				<?php } ?>