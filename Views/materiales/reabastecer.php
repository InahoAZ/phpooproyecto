<?php $datos = $datos['materiales'] ?>
<div class="box-principal">
	<h3 class="titulo">Agregar Materiales<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Agregar Material</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<form id="form_resba" class="form-horizontal" action="<?php echo URL; ?>materiales/reabastecerAdd/<?php echo $datos['cod_material'] ?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Descripcion</label>
							<input class="form-control" id="descripcion" value="<?php echo $datos['descripcion']  ?>" name="descripcion" type="text" readonly>	
							<input type="hidden" name="cod_material" value="<?php echo $datos['cod_material'] ?>">										
								<label for="inputEmail" class="control-label">Stock Actual</label>
								<input class="form-control" id="precio" value="<?php echo $datos['stock']  ?>" name="precio_unitario" type="text" readonly >
								<label for="inputEmail" class="control-label">Stock Nuevo</label>
								<input class="form-control" id="stock" name="stock" type="text" >								
								<input type="hidden" name="fecha_stock" value="<?php echo date("Y-m-d") ?>">
								</div>
								<div class="form-group">
									<button type="button" name="btnsubmit" onclick="vali_resba()" class="btn btn-warning" >Actualizar Stock</button></td>
									<a href="<?php echo URL; ?>materiales" class="btn btn-danger" >Cancelar</a>
								</div>
							</form>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
		</div>



