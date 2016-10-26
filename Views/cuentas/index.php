<div class="box-principal">
	<h3 class="titulo">Listado de Clientes<br></h3>	
	<div class="row">
		<div class="col-md-20">
			<div class="panel panel-success">		
				<div class="panel-heading">
					<h3 class="panel-title">Listado de Clientes</h3>
				</div>


				<div class="panel-body"></div>
				<h3 class="panel-title"><label for="inputEmail" class="control-label">Buscar Cuenta</label></h3>
				<form  name="index" class="navbar-form navbar-left" action="<?php echo URL; ?>cuentas/buscar" method="GET">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Buscar" name="buscar" required>
					</div>
					<button type="submit" class="btn btn-default">Buscar</button>
				</form>
				<div class="table-condensed">
					<table class="table table-striped table-hover ">
						<thead>
							<tr>
								<th>Codigo de Cuenta</th>							
								<th>Detalles</th>
								<th>Tipo de Cuenta</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_array($datos)) {
								if($row['cod_cuenta'] != 0){
									?>				
									<tr>
										<td><?php echo $row['cod_cuenta'];?></td>							
										<td><?php echo $row['detalle'];?></td>
										<td><?php echo $row['tipo'];?></td>

										<td><a class="btn btn-warning" href=" <?php echo URL; ?>cuentas/editar/<?php echo $row['cod_cuenta']?>">Editar</a></td>
										<td><a class="btn btn-danger" href=" <?php echo URL; ?>cuentas/eliminar/<?php echo $row['cod_cuenta']?>">Eliminar</a></td>
									</tr>
									<?php }} ?>
								</tbody>

							</table>

						</div>


					</div>
				</div>

			</div>

		</div>