<?php 
$clientes = 0;
if (isset($_SESSION['clienteFactura']))
	$clientes = $datos['clienteFactura']; 
?>

<div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Factura</h4>
		</div>
		<div class="panel-body">		
			<form id="factura" class="form-horizontal" action="<?php echo URL ?>ventas/comprobarTipoFactura" method="POST">
				<div class="form-group row">
					<label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>				
					<div class="col-md-2">
						<input type="text" class="col-md-1 form-control input-sm" id="apyn" name="apyn" placeholder="Selecciona un cliente" value="<?php echo $clientes['apyn'];  ?>" >

						<input name="cod_clientes" type='hidden' value="<?php echo $clientes['cod_clientes'];  ?>">	
						<input name="iva" type='hidden' value="<?php echo $clientes['iva'];  ?>">	
					</div>					
					<label for="tel1" class="col-md-1 control-label">Teléfono</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" id="tel1" placeholder="Teléfono" value="<?php echo $clientes['telefono'];  ?>" readonly>
					</div>
					<label for="mail" class="col-md-1 control-label">DNI</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" id="mail" placeholder="DNI" value="<?php echo $clientes['documento'];  ?>" readonly>
					</div>											
					<label for="tel2" class="col-md-1 control-label">Fecha</label>
					<div class="col-md-2">
						<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
					</div>
					<div class="col-md-12">
						<div class="form-group row">
							<button type="button" class="btn btn-info col-md-offset-5 no-print" data-toggle="modal" data-target="#addCliente">
								<span class="glyphicon glyphicon-user"></span> Buscar Cliente
							</button>

						</div>
						<div class="form-group row">
							<a type="button" href="<?php URL ?>ventas/cancelarCliente" class="btn btn-danger col-md-2 col-md-offset-5 no-print" data-toggle="modal">
								<span class="glyphicon glyphicon-remove"></span> Quitar Cliente
							</a>

						</div>
					</div>

					
					
				</div>
				
				
				<div class="col-md-12">
					<div class="pull-right">						
						<button type="button" name="btnsubmit" onclick="factura()" class="btn btn-success no-print">
							<span class="glyphicon glyphicon-arrow-right"></span> Siguiente
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


		</div>
	</div>