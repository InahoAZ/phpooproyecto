<div class="box-principal">
  <h3 class="titulo">Costos Fijos<hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Costos Fijos Actuales<b></b></h3>
    </div>
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3">
            <img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/costos.png">
            <li class="list-group-item">
              <input type="hidden" name="fecha" value="<?php echo date("Y-m-d") ?>"></input>
              <b>Fecha: </b><?php echo date("d-m-Y"); ?>
            </li>
          </div>
          <div class="col-md-9">
            <ul class="list-group">            
              <li class="list-group-item">
                <b>Alquiler: </b><input class="form-control" name="alquiler" type="text" value="<?php echo $datos['alquiler']; ?>" required>
              </li>
              <li class="list-group-item">
                <b>Luz: </b><input class="form-control" name="luz" type="text" value="<?php echo $datos['luz']; ?>" required>
              </li>
              <li class="list-group-item">
                <b>Agua: </b><input class="form-control" name="agua" type="text" value="<?php echo $datos['agua']; ?>" required>
              </li>
              <li class="list-group-item">
                <b>Herramientas: </b><input class="form-control" name="herramientas" type="text" value="<?php echo $datos['herramientas']; ?>" required>
              </li>              
              <li class="list-group-item">
                <b>Porcentaje a Agregar: </b><input class="form-control" name="porcentaje" type="text" value="<?php echo $datos['porcentaje']; ?>" required>
              </li>
              <li class="list-group-item">
                <div class="btn-group">            
                  <button class="btn btn-success" type="submit">Actualizar Costos Fijos</button>                         
                  <a class="btn btn-danger" href="<?php echo URL;?>costos/vercfijos">Cancelar</a>
                </div>
              </div>
            </ul>
          </div> 
        </div>
      </form> 
    </div>
  </div>
</div>