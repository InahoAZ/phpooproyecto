<div class="box-principal">
	<h3 class="titulo">Agregar Clientes<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Agregar un nuevo Cliente</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Apellido y Nombre</label>
							<input class="form-control" name="apyn" type="text" required>
							<label for="inputEmail" class="control-label">Nº de Documento</label>
							<input class="form-control" name="documento" type="text" required>
							<label for="inputEmail" class="control-label">Fecha de Nacimiento</label>
							<input class="form-control" name="fnac" type="date" required>
							<label for="inputEmail" class="control-label">Direccion</label>
							<input class="form-control" name="direccion" type="text" required>
							<label for="inputEmail" class="control-label">CUIT</label>
							<input class="form-control" name="cuit" type="text" required>
							<label for="inputEmail" class="control-label">Telefono</label>
							<input class="form-control" name="telefono" type="text" required>
							<label for="inputEmail" class="control-label">IVA</label>
							<select class="form-control" id="select" name="iva">
								<option value="Consumidor Final">Consumidor Final</option>
								<option value="Responsable Inscripto">Responsable Inscripto</option>
								<option value="Monotributista">Monotributista</option>				          
							</select>

						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success">Registrar</button>
							<button type="reset" class="btn btn-warning">Borrar</button>
						</div>
					</form>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</div>