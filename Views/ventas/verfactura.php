<?php $datosFactura = mysqli_fetch_assoc($datos['factura']); 

switch ($datosFactura['tipo_factura']) {
    default:
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
              <div class="invoice-title">
                 <h2>Resumen de Venta</h2><h3 class="pull-right">Factura <?php echo $datosFactura['tipo_factura'] . "#" . $datosFactura['num_factura'] ?></h3>
             </div>
             <hr>
             <div class="row">
                 <div class="col-xs-6">
                    <address>
                        <strong>De:</strong><br>
                        Paw Paw S.H. <br>
                        23-54456855-2 <br>  
                        0800-888-4444 <br> 
                        Calle Colon 2132 <br>
                        Posadas, Misiones <br> 
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                     <strong>Para:</strong><br>
                     <?php echo $datosFactura['apyn'] ?><br>
                     <?php echo $datosFactura['documento'] ?><br>
                     <?php echo $datosFactura['telefono'] ?><br>
                     <?php echo $datosFactura['direccion'] ?>
                 </address>
             </div>
         </div>
         <div class="row">
             <div class="col-xs-6">
                <address>
                   <strong>Metodo de Pago:</strong><br>
                   Efectivo<br>
               </address>
           </div>
           <div class="col-xs-6 text-right">
            <address>
               <strong>Fecha de Emision:</strong><br>
               <?php $fecha = $datosFactura['fecha_factura']; $date = date_create($fecha); $date = date_format($date, 'd/m/Y'); echo ($date); ?><br><br>                        
           </address>
       </div>
   </div>
</div>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title"><strong>Detalle</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-striped">
               <table class="table table-condensed">
                  <thead>
                    <tr>
                     <td><strong>Item</strong></td>
                     <td class="text-center"><strong>Precio</strong></td>
                     <td class="text-center"><strong>Cantidad</strong></td>
                     <td class="text-right"><strong>Totales</strong></td>
                 </tr>
             </thead>
             <tbody>
                 <?php $subt = 0 ; while($datosDetalle = mysqli_fetch_assoc($datos['detalle'])){  ?>
                 <tr>
                    <td><?php echo $datosDetalle['descripcion'] ?></td>
                    <td class="text-center"><?php echo "$" . $datosDetalle['precio_unitario']; ?></td>
                    <td class="text-center"><?php echo $datosDetalle['cantidad'];?></td>
                    <td class="text-right"><?php $subtotal = $datosDetalle['cantidad'] * $datosDetalle['precio_unitario']; echo "$" . $subtotal; ?></td>
                </tr>
                <?php $subt  += $subtotal;  } ?>
                <?php $tipo = $datosFactura['tipo_factura']; $iva = 0; if($tipo == "A"){//Depende de la factura, se discrimina o no el IVA?>
                <tr>
                    <td class="highrow"></td>
                    <td class="highrow"></td>
                    <td class="highrow"></td>
                    <td class="highrow"></td>
                </tr>                                   
                <tr>
                    <td class="thick-line"></td>
                    <td class="thick-line"></td>
                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                    <td class="thick-line text-right"><?php  echo "$" . $subt; ?></td>
                </tr>
                <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>IVA (21%)</strong></td>
                    <td class="no-line text-right"><?php $iva = ($subt * 21)/100 ;echo "$" . $iva; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right"><?php $total = $subt + $iva ; echo "$" . $total; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>

</div>
</div>
<div class="row">
    <div class="col-xs-12 text-center">
        <a type="button" class="btn btn-default no-print" onclick="window.print()">Imprimir</a>
        <button type="button" class="btn btn-info no-print" onclick="goBack()">Atras</button>
    </div>
</div>

</div>
</div>

<?php
break;





case 'B':

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="invoice-title">
             <h2>Resumen de Venta</h2><h3 class="pull-right">Factura <?php echo $datosFactura['tipo_factura'] . "#" . $datosFactura['num_factura'] ?></h3>
         </div>
         <hr>
         <div class="row">
             <div class="col-xs-6">
                <address>
                    <strong>De:</strong><br>
                    Paw Paw S.H. <br>
                    23-54456855-2 <br>  
                    0800-888-4444 <br> 
                    Calle Colon 2132 <br>
                    Posadas, Misiones <br> 
                </address>
            </div>
            <div class="col-xs-6 text-right">
                <address>
                 <strong>Para:</strong><br>
                 <?php echo $datosFactura['apyn'] ?><br>
                 <?php echo $datosFactura['documento'] ?><br>
                 <?php echo $datosFactura['telefono'] ?><br>
                 <?php echo $datosFactura['direccion'] ?>
             </address>
         </div>
     </div>
     <div class="row">
         <div class="col-xs-6">
            <address>
               <strong>Metodo de Pago:</strong><br>
               Efectivo<br>
           </address>
       </div>
       <div class="col-xs-6 text-right">
        <address>
           <strong>Fecha de Emision:</strong><br>
           <?php $fecha = $datosFactura['fecha_factura']; $date = date_create($fecha); $date = date_format($date, 'd/m/Y'); echo ($date); ?><br><br>                        
       </address>
   </div>
</div>
</div>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title"><strong>Detalle</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-striped">
               <table class="table table-condensed">
                  <thead>
                    <tr>
                     <td><strong>Item</strong></td>
                     <td class="text-center"><strong>Precio</strong></td>
                     <td class="text-center"><strong>Cantidad</strong></td>
                     <td class="text-right"><strong>Totales</strong></td>
                 </tr>
             </thead>
             <tbody>
                 <?php $subt = 0 ; while($datosDetalle = mysqli_fetch_assoc($datos['detalle'])){
                    $iva = ($datosDetalle['precio_unitario']*21)/100;
                    $totalU = $datosDetalle['precio_unitario'] + $iva;
                    ?>
                    <tr>
                        <td><?php echo $datosDetalle['descripcion'] ?></td>
                        <td class="text-center"><?php echo "$" . $totalU; ?></td>
                        <td class="text-center"><?php echo $datosDetalle['cantidad'];?></td>
                        <td class="text-right"><?php $subtotal = $datosDetalle['cantidad'] * $totalU; echo "$" . $subtotal; ?></td>
                    </tr>
                    <?php $subt  += $subtotal;  } ?>
                    <?php $tipo = $datosFactura['tipo_factura']; $iva = 0; if($tipo == "A"){//Depende de la factura, se discrimina o no el IVA?>
                    <tr>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                    </tr>                                   
                    <tr>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line text-center"><strong>Subtotal</strong></td>
                        <td class="thick-line text-right"><?php  echo "$" . $subt; ?></td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center"><strong>IVA (21%)</strong></td>
                        <td class="no-line text-right"><?php $iva = ($subt * 21)/100 ;echo "$" . $iva; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center"><strong>Total</strong></td>
                        <td class="no-line text-right"><?php $total = $subt + $iva ; echo "$" . $total; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>
<div class="row">
    <div class="col-xs-12 text-center">
        <a type="button" class="btn btn-default no-print" onclick="print()">Imprimir</a>
        <button type="button" class="btn btn-info no-print" onclick="goBack()">Atras</button>
    </div>
</div>

</div>
</div>

<?php
break;

default:
$datosFacturC = mysqli_fetch_assoc($datos['facturc']); 
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="invoice-title">
             <h2>Resumen de Venta</h2><h3 class="pull-right">Factura <?php echo $datosFacturC['tipo_factura'] . "#" . $datosFacturC['num_factura'] ?></h3>
         </div>
         <hr>
         <div class="row">
             <div class="col-xs-6">
                <address>
                    <strong>De:</strong><br>
                    Paw Paw S.H. <br>
                    23-54456855-2 <br>  
                    0800-888-4444 <br> 
                    Calle Colon 2132 <br>
                    Posadas, Misiones <br> 
                </address>
            </div>
            <div class="col-xs-6 text-right">
             <address>
               <strong>Fecha de Emision:</strong><br>
               <?php $fecha = $datosFacturC['fecha_factura']; $date = date_create($fecha); $date = date_format($date, 'd/m/Y'); echo ($date); ?><br><br>                        
           </address>
       </div>
   </div>
   <div class="row">
     <div class="col-xs-6">

     </div>
     <div class="col-xs-6 text-right">

     </div>
 </div>
</div>
</div>

<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title"><strong>Detalle</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-striped">
               <table class="table table-condensed">
                  <thead>
                    <tr>
                     <td><strong>Item</strong></td>
                     <td class="text-center"><strong>Precio</strong></td>
                     <td class="text-center"><strong>Cantidad</strong></td>
                     <td class="text-right"><strong>Totales</strong></td>
                 </tr>
             </thead>
             <tbody>
                 <?php $subt = 0 ; while($datosDetalle = mysqli_fetch_assoc($datos['detalle'])){
                    $iva = ($datosDetalle['precio_unitario']*21)/100;
                    $totalU = $datosDetalle['precio_unitario'] + $iva;
                    ?>
                    <tr>
                        <td><?php echo $datosDetalle['descripcion'] ?></td>
                        <td class="text-center"><?php echo "$" . $totalU; ?></td>
                        <td class="text-center"><?php echo $datosDetalle['cantidad'];?></td>
                        <td class="text-right"><?php $subtotal = $datosDetalle['cantidad'] * $totalU; echo "$" . $subtotal; ?></td>
                    </tr>
                    <?php $subt  += $subtotal;  } ?>
                    <?php $tipo = $datosFacturC['tipo_factura']; $iva = 0; if($tipo == "A"){//Depende de la factura, se discrimina o no el IVA?>
                    <tr>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                        <td class="highrow"></td>
                    </tr>                                   
                    <tr>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line text-center"><strong>Subtotal</strong></td>
                        <td class="thick-line text-right"><?php  echo "$" . $subt; ?></td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center"><strong>IVA (21%)</strong></td>
                        <td class="no-line text-right"><?php $iva = ($subt * 21)/100 ;echo "$" . $iva; ?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center"><strong>Total</strong></td>
                        <td class="no-line text-right"><?php $total = $subt + $iva ; echo "$" . $total; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>
<div class="row">
    <div class="col-xs-12 text-center">
        <a type="button" class="btn btn-default no-print" onclick="print()">Imprimir</a>
        <button type="button" class="btn btn-info no-print" onclick="goBack()">Atras</button>
    </div>
</div>

</div>
</div>

<?php
break;

}

?>



