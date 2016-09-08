<?php $combo = new Controllers\materialesController(); $comb = $combo->comboBox();  ?>
<?php $combo2 = new Controllers\materialesController(); $comb2 = $combo2->index();  ?>
<div class="box-principal">
	<h3 class="titulo">Editar Materiales<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Editar Material</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<input name="cod_material" type="hidden" value="<?php echo $datos['cod_material'];?>">				   	  
							<label for="inputEmail" class="control-label">Descripcion</label>
							<input class="form-control" name="descripcion" type="text" value="<?php echo $datos['descripcion'];?>" required>
							<label for="inputEmail" class="control-label">Unidad de Medida</label>
							<select class="form-control" id="select" name="cod_unidad">
								<?php while($row2 = mysqli_fetch_array($comb2['unidadesmedida'])) {?>
									<option value="<?php echo $row2['cod_unidad'];?>" <?php if($row2['cod_unidad'] == $datos['cod_unidad']) echo "selected"; ?> > <?php echo $row2['nombre_unidad'];?> </option>	
									<?php } ?>			          			          
								</select>
								<label for="inputEmail" class="control-label">Precio Unitario</label>
								<input class="form-control" name="precio_unitario" type="text" value="<?php echo $datos['precio_unitario'];?>" required>  
								<label for="inputEmail" class="control-label">Proveedor</label>
								<select class="form-control" id="select" name="cod_proveedor">
									<?php while($row = mysqli_fetch_array($comb)) {?>
										<option value="<?php echo $row['cod_proveedor'];?>" <?php if($row['cod_proveedor'] == $datos['cod_proveedor']) echo "selected"; ?>> <?php echo $row['razon_social'];?></option>	
										<?php } ?>			          			          
									</select>
								<input type="hidden" name="fecha_stock" value="<?php echo date("Y-m-d") ?>">
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