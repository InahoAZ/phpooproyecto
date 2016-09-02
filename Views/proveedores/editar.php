<div class="box-principal">
<h3 class="titulo">Editar Proveedores<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar Proveedor</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				    	<input name="cod_proveedor" type="hidden" value="<?php echo $datos['cod_proveedor'] ?>" required>
				      <label for="inputEmail" class="control-label">Razon Social</label>
				        <input class="form-control" name="razon_social" type="text" value="<?php echo $datos['razon_social'] ?>" required>
				       <label for="inputEmail" class="control-label">CUIT/CUIL</label>
				        <input class="form-control" name="cuit" type="text" value="<?php echo $datos['cuit'] ?>" required>				       
				       <label for="inputEmail" class="control-label">Telefono</label>
				        <input class="form-control" name="telefono" type="text" value="<?php echo $datos['telefono'] ?>" required>
				       <label for="inputEmail" class="control-label">Direccion</label>
				        <input class="form-control" name="direccion" type="text" value="<?php echo $datos['direccion'] ?>" required>      
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