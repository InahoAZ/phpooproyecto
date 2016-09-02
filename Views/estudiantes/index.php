<div class="box-principal">
<h3 class="titulo">Listado de Estudiantes<br></h3>	


	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Listado de Estudiantes</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover ">
			  <thead>
			    <tr>
			      <th>Imagen</th>
			      <th>Id</th>
			      <th>Nombre</th>
			      <th>Edad</th>
			      <th>Promedio</th>
			      <th colspan="2">Accion</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php while ($row = mysqli_fetch_array($datos)) { ?>				
			    <tr>
			      <td><img class="imagen-avatar" src="<?php echo URL;?>Views/template/imagenes/avatars/<?php echo $row['imagen']?>">
			      <td><?php echo $row['id'];?></td>
			      <td><?php echo $row['nombre'];?></td>
			      <td><?php echo $row['edad'];?></td>
			      <td><?php echo $row['promedio'];?></td>
			      <td><a class="btn btn-warning" href=" <?php echo URL; ?>estudiantes/editar/<?php echo $row['id']?>">Editar</a></td>
			      <td><a class="btn btn-danger" href=" <?php echo URL; ?>estudiantes/eliminar/<?php echo $row['id']?>">Eliminar</a></td>
			    </tr>
			    <?php } ?>
		</div>
	</div>

</div>