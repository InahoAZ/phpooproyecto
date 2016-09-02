<div class="box-principal">
<h3 class="titulo">Costos Fijos<hr></h3>
  <div class="panel panel-success">
    <div class="panel-heading">
      <h3 class="panel-title">Costos Fijos Actuales<b></b></h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3">
          <img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/costos.png">
        </div>
        <div class="col-md-9">
          <ul class="list-group">            
            <li class="list-group-item">
              <b>Alquiler: </b><?php echo $datos['alquiler']; ?>
            </li>
            <li class="list-group-item">
              <b>Luz: </b><?php echo $datos['luz']; ?>
            </li>
            <li class="list-group-item">
              <b>Agua: </b><?php echo $datos['agua']; ?>
            </li>
            <li class="list-group-item">
              <b>Herramientas: </b><?php echo $datos['herramientas']; ?>
            </li>
            <li class="list-group-item">
              <b>Ultima actualizaci&oacute;n: </b><?php echo $datos['fecha']; ?>
            </li>
            <li class="list-group-item">
              <b>Porcentaje a agregar: </b><?php echo $datos['porcentaje'] . "%"; ?>
            </li>

            <div>            
              <a class="btn btn-default" href="<?php echo URL;?>costos/actualizarcfijos">Actualizar Costos Fijos</a>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>