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
					<form id="form_agregar" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Apellido y Nombre</label>
							<input class="form-control" name="apyn" id="nombre" type="text" >
							<label for="inputEmail" class="control-label">Nº de Documento</label>
							<input class="form-control" name="documento"  id="documento" type="text" >
							<label for="inputEmail" class="control-label">Fecha de Nacimiento</label>
							<input class="form-control" name="fnac" id="fnac"  type="date" >
							<label for="inputEmail" class="control-label">Direccion</label>
							<input class="form-control" name="direccion"  id="direccion" type="text" >
							<label for="inputEmail" class="control-label">CUIT</label>
							<input class="form-control" name="cuit" id="cuit"  type="text" >
							<label for="inputEmail" class="control-label">Telefono</label>
							<input class="form-control" name="telefono" id="telefono"  type="text" >
							<label for="inputEmail" class="control-label">IVA</label>
							<select class="form-control" id="select" name="iva">
								<option value="Consumidor Final">Consumidor Final</option>
								<option value="Responsable Inscripto">Responsable Inscripto</option>
								<option value="Monotributista">Monotributista</option>				          
							</select>

						</div>
						<div class="form-group">
							<button type="button" name="btnSubmit" class="btn btn-success" onclick="vali_agregar()">Registrar</button>
							<button type="reset" class="btn btn-warning">Borrar</button>
						</div>
					</form>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</div>