<div class="container">
  <div class="panel panel-default">
    <table class="table table-striped table-hover ">
      <thead>

        <div class="panel-heading">Costos</div>    

        <div class="panel-body">     
          <tr>
            <td>
            <div id="myTabContent" class="tab-content">            
              <div class="tab-pane fade active in" id="home">
                <!--Inicio de Formulario de Costo :v --> 
                <div class="box-principal">
                  <h3 class="titulo">Calcular Precio de un Nuevo Producto<hr></h3>
                  <div class="panel panel-success">
                    <div class="panel-heading">
                      <h3 class="panel-title">Costos</h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                          <form class="form-horizontal" action="costos/agregar" name="costosvariables" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                            	<input type="hidden" name="cod_producto" value="<?php echo($datos['contar']); ?>"> 
                              <label for="inputEmail" class="control-label">Descripcion</label>
                              <input class="form-control" name="descripcion" value="<?php $desc = $datos['descripcion']; echo $desc['descripcion'];?>" type="text" required readonly>                       
                              <label for="inputEmail" class="control-label">Materiales Utilizados</label>
                              <!--Inicio Grid de Materiales-->
                              <table class="table table-striped table-hover ">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Descripcion del Material </th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                	<?php $subt = 0; $n = 0; while ($row = mysqli_fetch_array($datos['costostemp']) ) { ?>				
												<tr>
													<td><?php echo ++$n;?></td>			      
													<td><?php echo $row['descripcion'];?></td>
													<td><?php echo $row['cantidad']?></td>
													<td><?php echo $row['precio_unitario'];?></td>
													<td><?php $total = $row['cantidad'] * $row['precio_unitario']; echo $total;?></td>
                          <?php $subt = $subt + $total; ?>																										
													<td><a class="btn btn-warning" href="<?php echo URL; ?>costos/delMaterial/<?php echo $row['cod_material']?>">Quitar</a></td>
													
												</tr>
												<?php } ?>
                                  
                                </tbody>
                                <tr><td colspan="6" align="center"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Agregar Material</button></td></tr>
                              </table>
                              <!--Fin Grid de Materiales-->                                        
                              
                              <label for="inputEmail" class="control-label">SubTotal</label>
                              <input class="form-control" name="subtotal" value="<?php echo $subt; ?>" type="text" required readonly>      
                              <label for="inputEmail" class="control-label">Mano de Obra (%)</label>
                              <input class="form-control" name="mano_obra" type="text" id="demo1" onKeyUp="Suma()" required> 
                              <label for="inputEmail" class="control-label">Total</label>
                              <input class="form-control" name="total" type="text" required readonly > 
                            </div>
                            <div class="form-group">
                             <button type="submit" class="btn btn-success">Calcular</button>
                             <a type="button" class="btn btn-warning" href="<?php echo URL; ?>costos/cancelar">Cancelar</a>

                           </div>
                         </form>
                       </div>
                       <div class="col-md-1"></div>
                     </div>
                   </div>
                 </div>
               </div>
               <!--Fin de Formulario de Costo :v -->    
               <!--Inicio de Ventana Modal :v -->
               <!-- Modal -->
               <div id="myModal" class="modal fade" role="dialog">
                <?php include("Views/materiales/indexcostos.php");?>                  
                <!--Fin Ventana Modal-->
              </div>
            </div>
            <div class="tab-pane fade" id="addmateriales">              
            </div>
            <div class="tab-pane fade" id="dropdown1">
              <p>Ver Costos Fijos</p>
            </div>
            <div class="tab-pane fade" id="dropdown2">
              <p>Actualizar Costos Fijos</p>
            </div>
          </div></td>
        </tr>         
      </thead>  
    </div>

  </div>
</div>
</table>