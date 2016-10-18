<div class="box-principal">
<h3 class="titulo">Editar Clientes<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar Cliente</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form id="form_editar" class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				   	  <input name="cod_clientes" type="hidden" value="<?php echo $datos['cod_clientes'];?>">
				      <label for="inputEmail" class="control-label">Apellido y Nombre</label>
				        <input class="form-control" id="nombre" name="apyn" type="text" value="<?php echo $datos['apyn'];?>">
				       <label for="inputEmail" class="control-label">Nº de Documento</label>
				        <input class="form-control" id="documento" name="documento" type="text" value="<?php echo $datos['documento'];?>">
				       <label for="inputEmail" class="control-label">Fecha de Nacimiento</label>
				        <input class="form-control" id="fnac" name="fnac" type="date" value="<?php echo $datos['fnac'];?>">
				       <label for="inputEmail" class="control-label">Direccion</label>
				        <input class="form-control" id="direccion" name="direccion" type="text" value="<?php echo $datos['direccion'];?>">
				       <label for="inputEmail" class="control-label">CUIT</label>
				        <input class="form-control" id="cuit" name="cuit" type="text" value="<?php echo $datos['cuit'];?>">
				       <label for="inputEmail" class="control-label">Telefono</label>
				        <input class="form-control" id="telefono" name="telefono" type="text" value="<?php echo $datos['telefono'];?>">
				       <label for="inputEmail" class="control-label">IVA (<b>Actual: <?php echo $datos['iva']?></b>)</label>
				       <select class="form-control" id="select" name="iva" >
				          <option value="Consumidor Final">Consumidor Final</option>
				          <option value="Responsable Inscripto">Responsable Inscripto</option>
				          <option value="Monotributista">Monotributista</option>				          
				        </select>

				    </div>
				    <div class="form-group">
				    	 <button type="button" name="btnSubmit" class="btn btn-success" onclick="vali_editar()">Editar</button>

				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-md-1"></div>
	  	</div>
	  </div>
	</div>
</div>