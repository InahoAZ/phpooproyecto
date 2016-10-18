<div class="box-principal">
<h3 class="titulo">Agregar Proveedores<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar Proveedor</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form id="form_provee" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Razon Social</label>
				        <input class="form-control" id="razon" name="razon_social" type="text" >

				       <label for="inputEmail" class="control-label">CUIT/CUIL</label>
				        <input class="form-control" id="cuit" name="cuit" type="text" >		

				       <label for="inputEmail" class="control-label">Telefono</label>
				        <input class="form-control" id="telefono" name="telefono" type="text" >
				       <label for="inputEmail" class="control-label">Direccion</label>
				        <input class="form-control" id="direccion" name="direccion" type="text" >      
				    </div>
				    <div class="form-group">
				    	 <button type="button" name="btnSubmit" onclick="vali_provee()" class="btn btn-success">Registrar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-md-1"></div>
	  	</div>
	  </div>
	</div>
</div>