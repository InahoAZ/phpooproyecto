<?php 
$subtotal = $datos['precio_unitario'] * $datos['q'];
$iva = ($subtotal * 21)/100;
$iva = number_format($iva,2); 
//echo $iva;
$total = $subtotal + $iva;
$total = number_format($total,2); 
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="invoice-title">
             <h2>Resumen de Reabastecimiento</h2><h3 class="pull-right">Resumen # <?php echo $datos['cod_operacion'] ?></h3>
         </div>
         <hr>
         <div class="row">
             <div class="col-xs-6">
                <address>
                    <strong>De:</strong><br>
                    <?php echo $datos['razon_social'] ?><br>
                    <?php echo $datos['cuit'] ?><br>
                    <?php echo $datos['telefono'] ?><br>
                    <?php echo $datos['direccion'] ?>
                </address>
            </div>
            <div class="col-xs-6 text-right">
                <address>
                 <strong>Para:</strong><br>
                 Paw Paw <br>
                 -----<br>
                 -----<br>
                 -----
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
           <?php $fecha = $datos['fecha_operacion']; $date = date_create($fecha); $date = date_format($date, 'd-m-Y'); echo ($date); ?><br><br>                        
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
                 <!-- foreach ($order->lineItems as $line) or some such thing here -->
                 <tr>
                    <td><?php echo $datos['descripcion'] ?></td>
                    <td class="text-center"><?php echo "$" . $datos['precio_unitario']; ?></td>
                    <td class="text-center"><?php echo $datos['q'];?></td>
                    <td class="text-right"><?php  echo "$" . (number_format(($subtotal),2)); ?></td>
                </tr> 
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
                    <td class="thick-line text-right"><?php  echo "$" . number_format($subtotal, 2); ?></td>
                </tr>
                <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>IVA (21%)</strong></td>
                    <td class="no-line text-right"><?php echo "$" . $iva; ?></td>
                </tr>
                <tr>
                    <td class="no-line"></td>
                    <td class="no-line"></td>
                    <td class="no-line text-center"><strong>Total</strong></td>
                    <td class="no-line text-right"><?php echo "$" . $total; ?></td>
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