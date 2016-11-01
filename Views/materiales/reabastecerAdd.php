<?php 
//print_r($datos);
$stockNuevo = $datos['stokcxd'];
$datos = $datos['material'];
$subt = $datos['precio_unitario'] * $stockNuevo;
$total = $subt ;

 ?>
<div class="box-principal">
    <h3 class="titulo">Agregar Materiales<hr></h3>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Procesar Compra</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form class="form-horizontal" name="process_buy" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="inputEmail" class="control-label">Descripcion</label>
                            <input class="form-control" name="descripcion" type="text" value="<?php echo $datos['descripcion'] ?>" readonly>
                            <label for="inputEmail" class="control-label">Cantidad a Agregar </label> 
                            <input class="form-control" name="cantidad" type="text" value="<?php echo $stockNuevo ?>" readonly>                           
                            <label for="inputEmail" class="control-label">Total (<small><b>*Precio con IVA incluido</b></small>)</label>                            
                            <input type="hidden" name="subt" value="<?php echo $subt; ?>">
                            <input class="form-control" name="total" type="text" value="<?php  echo $total; ?>" readonly>                                               
                            <label for="inputEmail" class="control-label">Proveedor</label>  
                            <input class="form-control" name="proveedor" type="text" value="<?php echo $datos['razon_social'] ?>" readonly>                          
                            <label for="inputEmail" class="control-label">Efectivo</label>
                            <input class="form-control" id="efec" name="efectivo" type="text" required onkeyup="reabastecerAddVuelto()" >  
                            <input class="form-control" id="vuelto" name="vuelto" type="hidden" required>  
                        </div>
                        <div class="form-group">
                            <button type="button" name="btnsubmit" class="btn btn-success" onclick="validarEfectivo()">Reabastecer</button>
                            <button type="reset" class="btn btn-warning" >Cancelar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>