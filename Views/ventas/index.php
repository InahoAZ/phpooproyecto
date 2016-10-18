<div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Factura</h4>
		</div>
		<div class="panel-body">		
			<form class="form-horizontal" role="form" id="datos_factura">
				<div class="form-group row">
					<label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>					
					<div class="col-md-2">
						<input type="text" class="col-md-1 form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required>
						<button type="button" class="btn btn-info col-md-12" data-toggle="modal" data-target="#addCliente">
							<span class="glyphicon glyphicon-user"></span> Buscar Cliente
						</button>							
						<input id="id_cliente" type='hidden'>	
					</div>
					

					
					<label for="tel1" class="col-md-1 control-label">Teléfono</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" value="<?php print_r($datos['clienteFactura'])  ?>" readonly>
					</div>
					<label for="mail" class="col-md-1 control-label">DNI</label>
					<div class="col-md-3">
						<input type="text" class="form-control input-sm" id="mail" placeholder="DNI" readonly>
					</div>
				</div>
				<div class="form-group row">							
					<label for="tel2" class="col-md-1 control-label">Fecha</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
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
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#productosModal">
							<span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
						<button type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	
<!-- Ventanas Modales -->
	<!--Seleccionar Cliente-->
			<div class="modal fade bs-example-modal-lg" id="addCliente" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Selecciona un Cliente</h4>
						</div>
						<div class="modal-body">
							<?php include("Views/modal/clientesmodal.php");?>
						</div>
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

	<!--Fin Seleccionar Cliente-->

	<!--Seleccionar Cliente-->
			<div class="modal fade bs-example-modal-lg" id="productosModal" tabindex="-1" role="dialog">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Selecciona un Cliente</h4>
						</div>
						<div class="modal-body">
							<?php include("Views/modal/productosmodal.php");?>
						</div>
						
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

	<!--Fin Seleccionar Cliente-->		

			
			<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>		
	<div class="row-fluid">
		<div class="col-md-12">
			<table class="table">
				<tr>
					<th class='text-center'>CODIGO</th>
					<th class='text-center'>CANT.</th>
					<th>DESCRIPCION</th>
					<th class='text-right'>PRECIO UNIT.</th>
					<th class='text-right'>PRECIO TOTAL</th>
					<th></th>
				</tr>
				<tr>
					<td class='text-right' colspan=4>SUBTOTAL $</td>
					<td class='text-right'></td>
					<td></td>
				</tr>
				<tr>
					<td class='text-right' colspan=4>IVA (21)% $</td>
					<td class='text-right'></td>
					<td></td>
				</tr>
				<tr>
					<td class='text-right' colspan=4>TOTAL $</td>
					<td class='text-right'></td>
					<td></td>
				</tr>

			</table>



		</div>	
	</div>
</div>