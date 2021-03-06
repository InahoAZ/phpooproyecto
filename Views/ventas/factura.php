<?php $row = mysqli_fetch_assoc($datos['factura']);?>
<div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Factura Tipo <?php echo $row['tipo_factura']  . "<br>N°" . $row['num_factura'] ?></h4>
		</div>
		<form  class="form-horizontal" method="POST" action="<?php echo URL; ?>ventas/pagoefectivo" role="form" id="datos_factura">
		<div class="panel-body">			
				<div class="form-group row">
					<label for="nombre_cliente" class="col-md-2 control-label">Apellido y Nombre</label>				
					<div class="col-md-2">
						<input type="text" class="col-md-1 form-control input-sm" name="apyn" placeholder="" value="<?php echo $row['apyn']; ?>" required>										
						<input name="type" type='hidden' value="A">

					</div>
					

					
					<label for="tel1" class="col-md-1 control-label">Teléfono</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" name="telefono" placeholder="" value="<?php echo $row['telefono'] ?>" readonly>
					</div>
					<label for="mail" class="col-md-1 control-label">DNI</label>
					<div class="col-md-3">
						<input type="text" class="form-control input-sm" name="documento" placeholder="" value="<?php echo $row['documento']; ?>" readonly>
					</div>
				</div>
				<div class="form-group row">							
					<label for="tel2" class="col-md-2 control-label">Fecha</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" name="fecha" value="<?php echo date("d/m/Y");?>" readonly>
					</div>
					<label for="email" class="col-md-1 control-label">Pago</label>
					<div class="col-md-3">
						<select class='form-control input-sm' id="condiciones">
							<option value="1">Efectivo</option>
							<option value="2">Cheque</option>
							<option value="3">Transferencia bancaria</option>
							<option value="4">Crédito</option>
						</select>
					</div>
				</div>
				
				
				<div class="col-md-12">
					<div class="pull-right">						
						<button type="button" class="btn btn-info no-print" data-toggle="modal" data-target="#productosModal">
							<span class="glyphicon glyphicon-search"></span> Buscar Productos
						</button>
						<button type="button" name="btnsubmit" onclick="vali_factua()" class="btn btn-success no-print">
							<span class="glyphicon glyphicon-arrow-right"></span> Siguiente
						</button>
					</div>	
				</div>
			</div>

			

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="text-center"><strong>Detalle Factura</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-stripped">
							<table class="table table-stripped">
								<thead>
									<tr>
										<td><strong>Descripci&oacute;n</strong></td>
										<td class="text-center"><strong>Precio Unitario</strong></td>
										<td class="text-center"><strong>Cantidad</strong></td>
										<td class="text-right"><strong>Total</strong></td>
									</tr>
								</thead>
								<tbody>
									<tbody>
										<?php $totalF = 0;  while ($rowF = mysqli_fetch_assoc($datos['detallefactura'])) {?>
										<tr>
											<td><a class="btn btn-danger btn-xs" href="<?php echo URL; ?>ventas/delProductoFactura/<?php echo $rowF['cod_producto']; ?>">X</a><?php echo $rowF['descripcion'] ?></td>
											<td class="text-center"><?php echo "$" . $rowF['precio_venta']; ?></td>
											<td class="text-center"><?php echo $rowF['cantidad'] ?></td>
											<td class="text-right"><?php $total = $rowF['precio_venta'] * $rowF['cantidad']; echo "$" . $total;  ?></td>
										</tr> 
										<?php $totalF += $total; } ?>   
										<tr>
											<td class="highrow"></td>
											<td class="highrow"></td>
											<td class="highrow text-center"><strong>Subtotal</strong></td>
											<td class="highrow text-right"><input type="text" class="sm-input transparent" value="<?php echo "$" . $totalF;  ?>"  name="subtotal" readonly></td>
										</tr>
										<tr>
											<td class="emptyrow"></td>
											<td class="emptyrow"></td>
											<td class="emptyrow text-center"><strong>IVA(21%)</strong></td>
											<td class="emptyrow text-right"><input type="text" value="<?php $iva = ($totalF*21)/100; echo "$" . $iva;  ?>" class="sm-input transparent" name="iva" readonly></td>
										</tr>
										<tr>
											<td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
											<td class="emptyrow"></td>
											<td class="emptyrow text-center info"><strong>Total</strong></td>
											<td class="emptyrow text-right info">
											<input type="text" value="<?php echo ($totalF + $iva); ?>" class="sm-input transparent" id="total" name="total" readonly></td>
										</tr>                             
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			</form>


			<!-- Ventanas Modales -->
			<!--Seleccionar Productos-->
			<div class="modal fade bs-example-modal-lg" id="productosModal" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Selecciona un Producto</h4>
						</div>
						<div class="modal-body">
							<?php include("Views/modal/productosmodal.php");?>
						</div>

					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

			<!--Fin Seleccionar Productos-->		


			<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			

			<style>
				.height {
					min-height: 200px;
				}

				.icon {
					font-size: 47px;
					color: #5CB85C;
				}

				.iconbig {
					font-size: 77px;
					color: #5CB85C;
				}

				.table > tbody > tr > .emptyrow {
					border-top: none;
				}

				.table > thead > tr > .emptyrow {
					border-bottom: none;
				}

				.table > tbody > tr > .highrow {
					border-top: 3px solid;
				}
			</style>