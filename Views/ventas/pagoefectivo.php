<?php 
if(!isset($_POST['type']))
	$_POST['type'] = "D";

switch ($_POST['type']) {
	case 'A':
	?>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-usd'></i> Procesar Compra - Factura A</h4>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/carro_compra.png">
				</div>
				<div class="col-md-9">
					<ul class="list-group">            
						<li class="list-group-item">
							<b>Apellido y Nombre: </b><?php echo $_POST['apyn']; ?>
						</li>
						<li class="list-group-item">
							<b>Documento: </b><?php echo $_POST['documento']; ?>
						</li>
						<li class="list-group-item">
							<b>Telefono: </b><?php echo $_POST['telefono']; ?>
						</li>
						<li class="list-group-item">
							<b>DNI: </b><?php echo $_POST['documento']; ?>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4> Pago en Efectivo</h4>
										</div>
										<div class="panel-body">										
											<div class="col-md-6"><table class="table table-stripped">
												<tr class="info">
													<td>Subtotal</td>
													<td><?php echo $_POST['subtotal']; ?></td>
												</tr>
												<tr class="warning">
													<td>IVA 21%</td>
													<td><?php echo $_POST['iva']; ?></td>
												</tr>
												<tr class="danger">
													<td>Total</td>
													<td><?php echo "$" . $_POST['total']; ?></td>
												</tr>
											</table></div>
											<div class="col-md-6">
												<form name="facturaa" class="form-horizontal" method="POST" action="<?php echo URL;?>ventas/finalizarventa">
													<div class="form-group">
														<label class="control-label col-sm-2" for="email">Efectivo:</label>
														<div class="col-sm-10"> 
														<input id="efec" type="text" class="form-control" name="efectivo" onkeyup="vueltofacta()" >
														<input type="hidden" id="total" value="<?php echo $_POST['total']; ?>">
														</div>
													</div>													
													<div class="form-group">
														<label class="control-label col-sm-2" for="pwd">Vuelto:</label>
														<div class="col-sm-10"> 
															<input type="text" class="form-control" id="vuelto" placeholder="" readonly>
														</div>
													</div>												
													<div class="form-group"> 
														<div class="col-sm-offset-2 col-sm-10">
															<button type="button" name="btnsubmit" onclick="vali_facturaa()" class="btn btn-default"><i class="glyphicon glyphicon-check"></i> Procesar Venta</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php
	break;
	case 'B':
	?>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-usd'></i> Procesar Compra - Factura B</h4>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/carro_compra.png">
				</div>
				<div class="col-md-9">
					<ul class="list-group">            
						<li class="list-group-item">
							<b>Apellido y Nombre: </b><?php echo $_POST['apyn']; ?>
						</li>
						<li class="list-group-item">
							<b>Documento: </b><?php echo $_POST['documento']; ?>
						</li>
						<li class="list-group-item">
							<b>Telefono: </b><?php echo $_POST['telefono']; ?>
						</li>
						<li class="list-group-item">
							<b>DNI: </b><?php echo $_POST['documento']; ?>
						</li>
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4> Pago en Efectivo</h4>
										</div>
										<div class="panel-body">										
											<div class="col-md-6"><table class="table table-stripped">
												<tr class="danger">
													<td>Total</td>
													<td id="total"><?php echo $_POST['total']; ?></td>
												</tr>
											</table></div>
											<div class="col-md-6">
												<form name="form_efectivob" class="form-horizontal" method="POST" action="<?php echo URL;?>ventas/finalizarventa">
													<div class="form-group">
														<label class="control-label col-sm-2">Efectivo:</label>
														<div class="col-sm-10">
															<input type="text" class="form-control" id="efectivo" onkeyup="vueltofact()" placeholder="">
															<input type="hidden" id="total" value="<?php echo $_POST['total']; ?>">
														</div>
													</div>													
													<div class="form-group">
														<label class="control-label col-sm-2">Vuelto:</label>
														<div class="col-sm-10"> 
															<input type="text" class="form-control" id="vuelto" placeholder="" readonly>
														</div>
													</div>												
													<div class="form-group"> 
														<div class="col-sm-offset-2 col-sm-10">
														<button type="button" name="btnsubmit" onclick="vali_facb();" class="btn btn-default"><i class="glyphicon glyphicon-check"></i> Procesar Venta</button>

												
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php
	break;
	case 'C':
	?>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-usd'></i> Procesar Compra - Factura C</h4>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3">
					<img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/carro_compra.png">
				</div>
				<div class="col-md-9">
					<ul class="list-group">            
						<li class="list-group-item">
							<b>Apellido y Nombre: </b><?php echo $_POST['apyn']; ?>
						</li>
						<li class="list-group-item">
							<b>Direccion: </b><?php echo $_POST['direccion']; ?>
						</li>
						<li class="list-group-item">
							<b>Telefono: </b><?php echo $_POST['telefono']; ?>
						</li>						
						<li class="list-group-item">
							<div class="row">
								<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4> Pago en Efectivo</h4>
										</div>
										<div class="panel-body">										
											<div class="col-md-6"><table class="table table-stripped">	
												<tr class="danger">
													<td>Total</td>
													<td><?php echo $_POST['total']; ?></td>
												</tr>
											</table></div>
											<div class="col-md-6">
												<form name="facturac" id="efec" class="form-horizontal" action="<?php echo URL;?>ventas/finalizarventa" >
													<div class="form-group">
														<label class="control-label col-sm-2" for="email">Efectivo:</label>
														<div class="col-sm-10">
															<input type="text" class="form-control" id="efectivo" name="efectivo" onkeyup="vueltofactc()" placeholder="">
															<input type="hidden" id="total" value="<?php echo $_POST['total']; ?>">

														</div>
													</div>													
													<div class="form-group">
														<label class="control-label col-sm-2" for="pwd">Vuelto:</label>
														<div class="col-sm-10"> 
															<input type="text" class="form-control" id="vuelto" placeholder="" readonly>
														</div>
													</div>												
													<div class="form-group"> 
														<div class="col-sm-offset-2 col-sm-10">
														<button type="button" name="btnsubmit" onclick="vali_facc()" class="btn btn-default"><i class="glyphicon glyphicon-check"></i> Procesar Venta</button>

														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<?php
	break;

	default:
	?>
	<h1>HA OCURRIDO UN ERROR, INTENTE VOLVIENDO A CREAR UNA NUEVA FACTURA</h1>
	<?php
	break;
}



?>

