<div class="box-principal">
<h3 class="titulo">Resultado de la Busqueda<br></h3>	

	<div class="panel panel-success">		
		<div class="panel-heading">
			<h3 class="panel-title">Se encontraron <?php $cuenta = mysqli_num_rows($datos); echo $cuenta;?> resultados.</h3>
		</div>
		<div class="panel-body">
			<a href="<?php echo URL;?>proveedores" class="btn btn-default">Volver</a>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover ">
			  <thead>
			    <tr>
			      <th>Codigo</th>
			      <th>Razon Social</th>
			      <th>CUIT/CUIL</th>
			      <th>Telefono</th>
			      <th>Direccion</th>				     
			      <th colspan="2">Accion</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php while ($row = mysqli_fetch_array($datos)) { ?>				
			    <tr>			      
			      <td><?php echo $row['cod_proveedor'];?></td>
			      <td><?php echo $row['razon_social'];?></td>
			      <td><?php echo $row['cuit'];?></td>
			      <td><?php echo $row['telefono'];?></td>
			      <td><?php echo $row['direccion'];?></td>
			      
			      <td><a class="btn btn-warning" href=" <?php echo URL; ?>proveedores/editar/<?php echo $row['cod_proveedor']?>">Editar</a></td>
			      <td><a class="btn btn-danger" href=" <?php echo URL; ?>proveedores/eliminar/<?php echo $row['cod_proveedor']?>">Eliminar</a></td>
			    </tr>
			    <?php } ?>
		</div>
	</div>

</div>