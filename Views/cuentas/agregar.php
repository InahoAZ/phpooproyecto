<div class="box-principal">
	<h3 class="titulo">Agregar Cuentas<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Agregar Cuentas</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<form  id="cuenta_agregar" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Codigo de Cuenta </label>
							<input class="form-control" id="codcuenta" name="cod_cuenta"  type="text" >
							<label for="inputEmail" class="control-label">Detalle</label>
							<input class="form-control" id="detalle" name="detalle"   type="text" >
							<label for="inputEmail" class="control-label">Tipo de Cuenta </label>
							<select class="form-control" name="tipo"  type="text" >
								<option value="Activo">Activo</option>
								<option value="Pasivo">Pasivo</option>
								<option value="Patrimonio Neto">Patrimonio Neto</option>
								<option value="Egresos">Egresos</option>
								<option value="Ingresos">Ingresos</option>
							</select>
							
			
						</div>
						<div class="form-group">
							<button type="button" name="btnSubmit" class="btn btn-success" onclick="vali_cuentas()">Registrar</button>
							<button type="reset" class="btn btn-warning">Borrar</button>
						</div>
					</form>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</div>