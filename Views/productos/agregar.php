<div class="box-principal">
	<h3 class="titulo">Agregar Productos<hr></h3>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Agregar Productos</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<form class="form-horizontal" action="" id="agregarproducto" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="cod_producto" value="<?php echo $datos['cod_producto'] ?>">
						<div class="form-group">
							<label for="inputEmail" class="control-label">Descripcion</label>
							<input class="form-control" name="descripcion" type="text" required>				        
							<label for="inputEmail" class="control-label">Precio Sugerido</label>				      
							<div class="input-group add-on">
								<input class="form-control" name="precio_sugerido" id="srch-term" type="text" value="<?php echo $datos['precio_sugerido'] ?>" readonly required>

								<div class="input-group-btn">								
									<button class="btn btn-default" type="button" onclick="submitForm('../costos/act1')">Calcular</button>		        
								</div>
							</div>

							<label for="inputEmail" class="control-label">Precio Final</label>
							<input class="form-control" name="precio_unitario" type="text" required>
							<label for="inputEmail" class="control-label">Stock Inicial</label>
							<input class="form-control" name="stock" value="1" min="1" max="99999" required />	

						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success" onclick="submitForm('agregar')">Registrar</button>
							<button type="reset" class="btn btn-warning">Borrar</button>
						</div>
					</form>
				</div>
				<div class="col-md-1"></div>
			</div>
		</div>
	</div>
</div>