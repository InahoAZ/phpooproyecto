<div class="box-principal">
<h3 class="titulo">Editar Cuentas<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar Cuentas</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				   	 <label for="inputEmail" class="control-label">Codigo de Cuenta</label>
				        <input class="form-control" name="cod_cuenta" type="text" value="<?php echo $datos['cod_cuenta'];?>" required>
				      <label for="inputEmail" class="control-label">Tipo de Cuenta</label>
				        <select class="form-control" name="tipo" type="text" value="<?php echo $datos['tipo'];?>" required>
				        	<option value="Activo">Activo</option>
				        	<option value="Pasivo">Pasivo</option>
				        	<option value="Patrimonio Neto">Patrimonio Neto</option>
				        	<option value="Egresos">Egresos</option>
				        	<option value="Ingresos">Ingresos</option>

				        </select>
				       <label for="inputEmail" class="control-label">Detalle</label>
				        <input class="form-control" name="detalle" type="text" value="<?php echo $datos['detalle'];?>" required>

				    </div>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Editar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-md-1"></div>
	  	</div>
	  </div>
	</div>
</div>