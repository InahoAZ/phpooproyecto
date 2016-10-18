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
					<div class="form-group">
						<form action="" method="POST">
							<label for="inputEmail" class="control-label">Descripcion</label>
							<input class="form-control" id="descripcion" name="descripcion" type="text" value="<?php echo $datos['descripcion']; ?>" >				        
							<label for="inputEmail" class="control-label">Precio Sugerido</label>				      
							<div class="input-group add-on">
								<input class="form-control" id="precio" name="precio_sugerido" id="srch-term" type="text" value="<?php echo $datos['precio_sugerido'] ?>" readonly >

								<div class="input-group-btn">

									<input type="hidden" name="act" value="1">								
									<button class="btn btn-default" type="submit">Calcular</button>	
								</form>	        
							</div>
						</div>
						<form class="form-horizontal" action="" id="agregarproducto" method="POST" enctype="multipart/form-data">
							<label for="inputEmail" class="control-label">Precio Final</label>
							<input class="form-control" id="final" name="precio_unitario" type="text" >
							<label for="inputEmail" class="control-label">Stock Inicial</label>
							<input class="form-control" id="stock" name="stock" value="" min="1" max="99999"  />	



							<input type="hidden" name="act" value="2">
							<input type="hidden" name="cod_producto" value="<?php echo $datos['cod_producto'] ?>">
							<div class="form-group">
								<button type="button" name="btnsubmit" onclick="agregar_producto();" class="btn btn-success" >Registrar</button>
								<button type="reset" class="btn btn-warning">Borrar</button>
							</div>
						</form>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>