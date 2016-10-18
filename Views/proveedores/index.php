<div class="box-principal">
<h3 class="titulo">Listado de Proveedores<br></h3>	

	<div class="panel panel-success">		
		<div class="panel-heading">
			<h3 class="panel-title">Listado de Proveedores</h3>
		</div>
		<div class="panel-body">
			<h3 class="panel-title"><label for="inputEmail" class="control-label">Buscar Proveedor</label></h3>
				<form class="navbar-form navbar-left" action="<?php echo URL; ?>proveedores/buscar" method="GET">
			    	<div class="form-group">
			        	<input type="text" class="form-control" placeholder="Buscar" name="buscar" required>
			        </div>
			        <button type="submit" class="btn btn-default">Buscar</button>
			     </form>
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
			      
				  <td><a class="btn btn-warning" onClick="javascript: return proveeEditar('<?php echo URL; ?>','<?php echo $row['cod_proveedor'];?>');">Editar</a></td>

				 <td><a class="btn btn-danger" onClick="javascript: return proveeEliminar('<?php echo URL; ?>','<?php echo $row['cod_proveedor'];?>');">Eliminar</a></td>

			
			    <?php } ?>
		</div>
	</div>

</div>