
<div class="box-principal">
  <h3 class="titulo">Gastos en Materiales<hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Gastos Totales en Materiales<b></b></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3">
          <img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/reabast.png">          
        </div> 
        <div class="col-md-6 text-right">
          <h3>*--Agregar Rango de Fechas--*</h3>          
        </div> 
               
        <table class="table table-hover ">        
          <thead>
            <tr>
              <th>#</th>
              <th>Descripcion</th>
              <th>Cantidad de Compras</th>
              <th>Precio Unitario</th>
              <th>Cantidad Pedida</th>              
              <th>Total Gastado</th>             
            </tr>
          </thead>
          <tbody>
          <?php  $totaltotal=0; $i=0; while($row = mysqli_fetch_array($datos)){?>
            <tr>
              <td><?php $i++; echo $i; ?></td>
              <td><?php echo $row['descripcion']; ?> </td>
              <td><?php echo $row['veces']; ?></td>
              <td><?php echo "$" . $row['precio_unitario']; ?></td>
              <td><?php echo $row['pedidos']; ?></td>
              
              <td><?php print "$".($row['precio_unitario']*$row['pedidos'])  ?></td> 
          <?php $totaltotal += $row['precio_unitario']*$row['pedidos'];} ?>
          </tr>
          <tr>
            <td colspan="3">Total Gastado <b>Desde</b> --Fecha1-- <b>Hasta</b> --Fecha2--  :</td>
            <td colspan="3"><input type="text" name="" readonly="" class="form-control" value="<?php echo "$" . ($totaltotal)?>"></td>

          </tr>
            <tr align="center"><td colspan="6"><a class="btn btn-default">Ver Grafico</a></td></tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>