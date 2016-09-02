<?php namespace Views;
$template = new Template();

class Template{

	public function __construct(){
		?>
		<!DOCTYPE html>
		<html lang="es">
		<head>
			<meta charset="UTF-8">
			<title>Administracion</title>
			<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/bootstrap4.css">

			<link rel="stylesheet" href="<?php echo URL; ?>Views/template/css/general.css">						
		</head>
		<body>
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Paw Paw</a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo URL; ?>">Inicio</a></li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Ventas <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo URL; ?>clientes">Vender</a></li>
									<li><a href="<?php echo URL; ?>clientes/agregar">Ventas Realizadas</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clientes <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo URL; ?>clientes">Listado</a></li>
									<li><a href="<?php echo URL; ?>clientes/agregar">Agregar Cliente</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Proveedores <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo URL; ?>proveedores">Listado</a></li>
									<li><a href="<?php echo URL; ?>proveedores/agregar">Agregar Proveedor</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Materiales<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo URL; ?>materiales">Listado</a></li>
									<li><a href="<?php echo URL; ?>materiales/agregar">Agregar Material</a></li>
									<li><a href="<?php echo URL; ?>materiales/reabastecer">Reabastecer Materiales</a></li>
								</ul>
							</li>							
							<!-- <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Costos<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo URL; ?>costos">Calcular Costos</a></li>									
									<li><a href="<?php echo URL; ?>costos/vercfijos">Ver Costos Fijos</a></li>
								</ul>
							</li> -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Productos<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo URL; ?>productos">Listado</a></li>									
									<li><a href="<?php echo URL; ?>productos/agregar">Agregar Producto</a></li>
									<li><a href="<?php echo URL; ?>productos/stock">Actualizar Stock</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Estadisticas<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?php echo URL; ?>estadisticas">Menu de Estadísticas</a></li>
									<li><a href="<?php echo URL; ?>estadisticasInv">Estadistícas de Inventario</a></li>
									<li><a href="<?php echo URL; ?>estadisticasVen">Estadistícas de Ventas</a></li>
									<li><a href="<?php echo URL; ?>">Gráficos</a></li>
								</ul>
							</li>	
							
							
						</ul>


						<ul class="nav navbar-nav navbar-right">
							<li><a href="http://codigofacilito.com">Codigo Facilito</a></li>
						</ul>
					</div>
				</div>
			</nav>



			<?php
		}

		public function __destruct(){
			?>
			<footer class="panel-footer panel-primary navbar-fixed-bottom">
				<center>Simulacion de Sistema de Facturacion <br>
					Grupo~6to "E" | <b>Paw Paw &copy </b></center>
				</footer>
				<script src="<?php echo URL; ?>Views/template/js/jquery.js"></script>
				<script src="<?php echo URL; ?>Views/template/js/bootstrap.js"></script>
				<script src="<?php echo URL; ?>Views/template/js/general.js"></script>
			</body>
			</html>	

			<?php
		}
	}

	?>