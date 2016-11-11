function Suma() {
 var ingreso1 = document.costosvariables.subtotal.value;
 var ingreso2 = document.costosvariables.mano_obra.value;
 var porcentaje = 0;
 try{
      //Calculamos el número escrito:
      ingreso1 = (isNaN(parseFloat(ingreso1)))? 0 : parseFloat(ingreso1);
      ingreso2 = (isNaN(parseFloat(ingreso2)))? 0 : parseFloat(ingreso2);
      porcentaje = (ingreso1*ingreso2)/100;  
      document.costosvariables.total.value = ingreso1+porcentaje;
  }
   //Si se produce un error no hacemos nada
   catch(e) {}
}
function submitForm(action) {
  document.getElementById('agregarproducto').action = action;
  document.getElementById('agregarproducto').submit();
}

function validarEfectivo(){
  var efectivo = Number(document.process_buy.efectivo.value);
  var total = Number(document.process_buy.total.value);
  var vuelto = parseFloat(efectivo) - parseFloat(total);
  var efec = document.getElementById('efec');

  if (isNaN(efec.value) ) {
    sweetAlert("Oops...", "El campo efectivo solo acepta numeros", "error");
    efec.focus();
    return 0;
}

    if (efectivo < total) {
 sweetAlert("Oops..","El efectivo es menor al total","warning");
 document.process_buy.efectivo.focus();
 return 0;
}

    if (efectivo >= total){          
    sweetAlert("Bien!","Su vuelto es: " + "$"+vuelto ,"success");
    window.setInterval(function(){
    document.process_buy.submit();
   },2000);
}
}

function printF() {
    window.print();
}

function goBack() {
    window.history.back();
}

function pregunta(){ 
    if (confirm('¿Estas seguro de eliminar este formulario?')){ 
       document.index.submit();
   }   
} 

function editar1(){ 
    if (confirm('¿Desea editar este formulario?')){ 
       document.index.submit()
   } 
}

function editar2(){ 
    if (confirm('¿Desea guardas los cambios?')){ 
      document.getElementById("form_editar").submit();
  } 

}

function vali_agregar(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var nombre= document.getElementById("nombre");
    var documento= document.getElementById("documento");
    var fnac= document.getElementById("fnac");
    var direccion= document.getElementById("direccion");
    var cuit= document.getElementById("cuit");
    var telefono= document.getElementById("telefono");

    if (nombre.value == "" ) {
        sweetAlert("Oops...", "El campo nombre esta vacio!", "error");
        nombre.focus();
        vereficar= false;
    }
    else if (!expRegNombre.exec(nombre.value)) {
     sweetAlert("Oops...", "El campo Apellido y Nombre solo acepta letras y espacios en blancos", "error");
     nombre.focus();
     vereficar= false;
 }

 else if (documento.value == "" ) {
    sweetAlert("Oops...", "El campo documento esta vacio!", "error"); 
    documento.focus();
    vereficar= false;
}

else if (documento.value <= 0 ) {
    sweetAlert("Oops...", "El campo documento no acepta numeros negativos o el valor 0 !", "error");
    documento.focus();
    vereficar= false;
} 

else if (isNaN(documento.value) ) {
    sweetAlert("Oops...", "El campo documento solo acepta numeros", "error");
    documento.focus();
    vereficar= false;
}
else if (fnac.value == "" ) {
    sweetAlert("Oops...", "El campo Fecha de Nacimiento esta vacio!", "error");
    fnac.focus();
    vereficar= false;
}

else if (direccion.value == "" ) {
    sweetAlert("Oops...", "El campo Direccion esta vacio!", "error");
    direccion.focus();
    vereficar= false;
}

else if (cuit.value == "" ) {
    sweetAlert("Oops...", "El campo Cuit esta vacio!", "error");
    cuit.focus();
    vereficar= false;
}   

else if (cuit.value <= 0 ) {
    sweetAlert("Oops...", "El campo cuit no acepta numeros negativos o el valor 0 !", "error");
    cuit.focus();
    vereficar= false;
} 

else if (isNaN(cuit.value) ) {
    sweetAlert("Oops...", "El campo Cuit solo acepta numeros", "error");
    cuit.focus();
    vereficar= false;
}

else if (telefono.value == "" ) {
    sweetAlert("Oops...", "El campo Telefono esta vacio!", "error");
    telefono.focus();
    vereficar= false;
}

else if (telefono.value <= 0 ) {
    sweetAlert("Oops...", "El campo telefono no acepta numeros negativos o el valor 0 !", "error");
    telefono.focus();
    vereficar= false;
} 

else if (isNaN(telefono.value) ) {
    sweetAlert("Oops...", "El campo telefono solo acepta numeros", "error");
    telefono.focus();
    vereficar= false;
}

if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("form_agregar").submit();
    },3000);
}   

}

function vali_editar(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var nombre= document.getElementById("nombre");
    var documento= document.getElementById("documento");
    var fnac= document.getElementById("fnac");
    var direccion= document.getElementById("direccion");
    var cuit= document.getElementById("cuit");
    var telefono= document.getElementById("telefono");

    if (nombre.value == "" ) {
        sweetAlert("Oops...", "El campo nombre esta vacio!", "error");
        nombre.focus();
        vereficar= false;
    }
    else if (!expRegNombre.exec(nombre.value)) {
     sweetAlert("Oops...", "El campo Apellido y Nombre solo acepta letras y espacios en blancos", "error");
     nombre.focus();
     vereficar= false;
 }

 else if (documento.value == "" ) {
    sweetAlert("Oops...", "El campo documento esta vacio!", "error"); 
    documento.focus();
    vereficar= false;
}

else if (documento.value <= 0 ) {
    sweetAlert("Oops...", "El campo documento no acepta numeros negativos o el valor 0!", "error");
    documento.focus();
    vereficar= false;
} 


else if (isNaN(documento.value) ) {
    sweetAlert("Oops...", "El campo documento solo acepta numeros", "error");
    documento.focus();
    vereficar= false;
}
else if (fnac.value == "" ) {
    sweetAlert("Oops...", "El campo Fecha de Nacimiento esta vacio!", "error");
    fnac.focus();
    vereficar= false;
}

else if (direccion.value == "" ) {
    sweetAlert("Oops...", "El campo Direccion esta vacio!", "error");
    direccion.focus();
    vereficar= false;
}

else if (cuit.value == "" ) {
    sweetAlert("Oops...", "El campo Cuit esta vacio!", "error");
    cuit.focus();
    vereficar= false;
}   
else if (cuit.value <= 0 ) {
    sweetAlert("Oops...", "El campo Cuit no acepta numeros negativos o el valor 0 !", "error");
    cuit.focus();
    vereficar= false;
} 

else if (isNaN(cuit.value) ) {
    sweetAlert("Oops...", "El campo Cuit solo acepta numeros", "error");
    cuit.focus();
    vereficar= false;
}

else if (telefono.value == "" ) {
    sweetAlert("Oops...", "El campo Telefono esta vacio!", "error");
    telefono.focus();
    vereficar= false;
}

else if (telefono.value <= 0 ) {
    sweetAlert("Oops...", "El campo telefono no acepta numeros negativos o el valor 0 !", "error");
    telefono.focus();
    vereficar= false;
} 

else if (isNaN(telefono.value) ) {
    sweetAlert("Oops...", "El campo telefono solo acepta numeros", "error");
    telefono.focus();
    vereficar= false;
}


if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("form_editar").submit();
    },3000);

}






}
function boxEditar($url,$cod_clientes){
    swal({   title: "Estas seguro?",   
        text: "Desea editar el registro?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#58FA82",   
        confirmButtonText: "Si, Editar!",   
        cancelButtonText: "No Editar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Espere!", "En unos segundos sera redireccionado.", "success");
                window.setInterval(function(){
                 location.href = $url + "clientes/editar/" + $cod_clientes;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se editara el registro :)", "error");   } });

}


function boxEliminar($url,$cod_clientes){
    swal({   title: "Estas seguro?",   
        text: "Desea eliminar el registro?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, Eliminar!",   
        cancelButtonText: "No Eliminar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Listo!", "Su registro se elimino.", "success");
                window.setInterval(function(){
                 location.href = $url + "clientes/eliminar/" + $cod_clientes;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se eliminara el registro :)", "error");   } });

}


function vali_provee(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var razon= document.getElementById("razon");
    var cit= document.getElementById("cuit");
    var telefono= document.getElementById("telefono");
    var direccion= document.getElementById("direccion");


    if (razon.value == "" ) {
        sweetAlert("Oops...", "El campo Razon Social  esta vacio!", "error");
        razon.focus();
        vereficar= false;
    }
    else if (!expRegNombre.exec(razon.value)) {
     sweetAlert("Oops...", "El campo Razon Social solo acepta letras y espacios en blancos", "error");
     razon.focus();
     vereficar= false;
 }

 else if (cuit.value == "" ) {
    sweetAlert("Oops...", "El campo cuit esta vacio!", "error"); 
    cuit.focus();
    vereficar= false;
}   


else if (cuit.value <= 0 ) {
    sweetAlert("Oops...", "El campo cuit no acepta numeros negativos o el valor 0 !", "error");
    cuit.focus();
    vereficar= false;
} 


else if (isNaN(cuit.value) ) {
    sweetAlert("Oops...", "El campo cuit solo acepta numeros", "error");
    cuit.focus();
    vereficar= false;
}

else if (telefono.value == "" ) {
    sweetAlert("Oops...", "El campo Telefono esta vacio!", "error");
    telefono.focus();
    vereficar= false;
}


else if (telefono.value <= 0 ) {
    sweetAlert("Oops...", "El campo telefono no acepta numeros negativos o el valor 0 !", "error");
    telefono.focus();
    vereficar= false;
} 


else if (isNaN(telefono.value) ) {
    sweetAlert("Oops...", "El campo Telefono solo acepta numeros", "error");
    telefono.focus();
    vereficar= false;
}

else if (direccion.value == "" ) {
    sweetAlert("Oops...", "El campo Direccion esta vacio!", "error");
    direccion.focus();
    vereficar= false;
}

if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("form_provee").submit();
    },3000);
}


}



function vali_proveedor(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var razon= document.getElementById("razon");
    var cit= document.getElementById("cuit");
    var telefono= document.getElementById("telefono");
    var direccion= document.getElementById("direccion");


    if (razon.value == "" ) {
        sweetAlert("Oops...", "El campo Razon Social  esta vacio!", "error");
        razon.focus();
        vereficar= false;
    }
    else if (!expRegNombre.exec(razon.value)) {
     sweetAlert("Oops...", "El campo Razon Social solo acepta letras y espacios en blancos", "error");
     razon.focus();
     vereficar= false;
 }

 else if (cuit.value == "" ) {
    sweetAlert("Oops...", "El campo cuit esta vacio!", "error"); 
    cuit.focus();
    vereficar= false;
}   


else if (cuit.value <= 0 ) {
    sweetAlert("Oops...", "El campo cuit no acepta numeros negativos o el valor 0 !", "error");
    cuit.focus();
    vereficar= false;
} 

else if (isNaN(cuit.value) ) {
    sweetAlert("Oops...", "El campo cuit solo acepta numeros", "error");
    cuit.focus();
    vereficar= false;
}

else if (telefono.value == "" ) {
    sweetAlert("Oops...", "El campo Telefono esta vacio!", "error");
    telefono.focus();
    vereficar= false;
}


else if (telefono.value <= 0 ) {
    sweetAlert("Oops...", "El campo telefono no acepta numeros negativos o el valor 0 !", "error");
    telefono.focus();
    vereficar= false;
} 


else if (isNaN(telefono.value) ) {
    sweetAlert("Oops...", "El campo Telefono solo acepta numeros", "error");
    telefono.focus();
    vereficar= false;
}

else if (direccion.value == "" ) {
    sweetAlert("Oops...", "El campo Direccion esta vacio!", "error");
    direccion.focus();
    vereficar= false;
}

if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("form_editar").submit();
    },3000);
}


}

function proveeEliminar($url,$cod_proveedor){
    swal({   title: "Estas seguro?",   
        text: "Desea eliminar el registro?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, Eliminar!",   
        cancelButtonText: "No Eliminar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Listo!", "Su registro se elimino.", "success");
                window.setInterval(function(){
                 location.href = $url + "proveedores/eliminar/" + $cod_proveedor;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se eliminara el registro :)", "error");   } });

}


function proveeEditar($url,$cod_proveedor){
    swal({   title: "Estas seguro?",   
        text: "Desea editar el registro?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#58FA82",   
        confirmButtonText: "Si, Editar!",   
        cancelButtonText: "No Editar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Espere!", "En unos segundos sera redireccionado.", "success");
                window.setInterval(function(){
                 location.href = $url + "proveedores/editar/" + $cod_proveedor;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se editara el registro :)", "error");   } });

}

function mateEditar($url,$cod_material){
    swal({   title: "Estas seguro?",   
        text: "Desea editar el registro?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#58FA82",   
        confirmButtonText: "Si, Editar!",   
        cancelButtonText: "No Editar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Espere!", "En unos segundos sera redireccionado.", "success");
                window.setInterval(function(){
                 location.href = $url + "materiales/editar/" + $cod_material;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se editara el registro :)", "error");   } });

}



function mateEliminar($url,$cod_material){
    swal({   title: "Estas seguro?",   
        text: "Desea eliminar el registro?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, Eliminar!",   
        cancelButtonText: "No Eliminar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Listo!", "Su registro se elimino.", "success");
                window.setInterval(function(){
                 location.href = $url + "materiales/eliminar/" + $cod_material;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se eliminara el registro :)", "error");   } });

}

function mateHisto($url,$cod_material){
    swal({   title: "Estas seguro?",   
        text: "Desea ver el Historial de Compras?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#58FA82",   
        confirmButtonText: "Si, Quiero verlo!",   
        cancelButtonText: "No Quiero!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Listo!", "En unos segundos sera redirigido.", "success");
                window.setInterval(function(){
                 location.href = $url + "materiales/historial/" + $cod_material;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se mostrara el Historial de Compras :)", "error");   } });

}

function mateReabastecer($url,$cod_material){
    swal({   title: "Estas seguro?",   
        text: "Deseas Reabastecer el producto?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#58FA82",   
        confirmButtonText: "Si, Quiero !",   
        cancelButtonText: "No Quiero!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Listo!", "En unos segundos sera redirigido.", "success");
                window.setInterval(function(){
                 location.href = $url + "materiales/reabastecer/" + $cod_material;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se Reabastecera el producto :)", "error");   } });

}

function vali_materiales(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var descripcion= document.getElementById("descripcion");
    var precio= document.getElementById("precio");
    var stock= document.getElementById("stock");


    if (descripcion.value == "" ) {
        sweetAlert("Oops...", "El campo Descripcion esta vacio!", "error");
        descripcion.focus();
        vereficar= false;
    }
    else if (!expRegNombre.exec(descripcion.value)) {
     sweetAlert("Oops...", "El campo Descripcion solo acepta letras y espacios en blancos", "error");
     descripcion.focus();
     vereficar= false;
 }

 else if (precio.value == "" ) {
    sweetAlert("Oops...", "El campo precio esta vacio!", "error"); 
    precio.focus();
    vereficar= false;
} 


else if (precio.value <= 0 ) {
    sweetAlert("Oops...", "El campo precio no acepta numeros negativos o el valor 0!", "error");
    precio.focus();
    vereficar= false;
}   

else if (isNaN(precio.value) ) {
    sweetAlert("Oops...", "El campo precio solo acepta numeros", "error");
    precio.focus();
    vereficar= false;
}

else if (stock.value == "" ) {
    sweetAlert("Oops...", "El campo stock esta vacio!", "error");
    stock.focus();
    vereficar= false;
}


else if (stock.value <= 0 ) {
    sweetAlert("Oops...", "El campo stock no acepta numeros negativos o el valor 0!", "error");
    stock.focus();
    vereficar= false;
} 

else if (isNaN(stock.value) ) {
    sweetAlert("Oops...", "El campo stock solo acepta numeros", "error");
    stock.focus();
    vereficar= false;
}


if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("form_mate").submit();
    },3000);

}

}



function vali_materiales2(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var descripcion= document.getElementById("descripcion");
    var precio= document.getElementById("precio");


    if (descripcion.value == "" ) {
        sweetAlert("Oops...", "El campo Descripcion esta vacio!", "error");
        descripcion.focus();
        vereficar= false;
    }
    else if (!expRegNombre.exec(descripcion.value)) {
     sweetAlert("Oops...", "El campo Descripcion solo acepta letras y espacios en blancos", "error");
     descripcion.focus();
     vereficar= false;
 }

 else if (precio.value == "" ) {
    sweetAlert("Oops...", "El campo precio esta vacio!", "error"); 
    precio.focus();
    vereficar= false;
}   


else if (precio.value <= 0 ) {
    sweetAlert("Oops...", "El campo precio no acepta numeros negativos o el valor 0!", "error");
    precio.focus();
    vereficar= false;
} 

else if (isNaN(precio.value) ) {
    sweetAlert("Oops...", "El campo precio solo acepta numeros", "error");
    precio.focus();
    vereficar= false;
}

if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("form_mate2").submit();
    },3000);
}

}

function vali_reabast(){
    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var stock= document.getElementById("stock");


    if (stock.value == "" ) {
        sweetAlert("Oops...", "El campo  Stock Nuevo esta vacio!", "error");
        stock.focus();
        vereficar= false;
    }

   
    else if (isNaN(stock.value) ) {
        sweetAlert("Oops...", "El campo Cantidad solo acepta numeros", "error");
        stock.focus();
        vereficar= false;
    }

    else if (stock.value == 0 ) {
    sweetAlert("Oops...", "El campo Stock Nuevo no puede ser 0!", "error"); 
    stock.focus();
    vereficar= false;

    }

    else if (stock.value < 0 ) {
    sweetAlert("Oops...", "El campo Stock Nuevo no puede ser menor a  0!", "error"); 
    stock.focus();
    vereficar= false;

    }

    if (vereficar) {
        sweetAlert("Bien!", "Redireccionando!", "success");
        window.setInterval(function(){
            document.getElementById("form_reabast").submit();
        },3000);

    }
}

function proEditar($url,$cod_producto){
    swal({   title: "Estas seguro?",   
        text: "Desea editar el registro?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#58FA82",   
        confirmButtonText: "Si, Editar!",   
        cancelButtonText: "No Editar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Espere!", "En unos segundos sera redireccionado.", "success");
                window.setInterval(function(){
                 location.href = $url + "productos/editar/" + $cod_producto;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se editara el registro :)", "error");   } });

}



function proEliminar($url,$cod_producto){
    swal({   title: "Estas seguro?",   
        text: "Desea eliminar el registro?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, Eliminar!",   
        cancelButtonText: "No Eliminar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Listo!", "Su registro se elimino.", "success");
                window.setInterval(function(){
                 location.href = $url + "productos/eliminar/" + $cod_producto;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se eliminara el registro :)", "error");   } });

}

function proRes($url,$cod_producto){
    swal({   title: "Estas seguro?",   
        text: "Desea Reabastecer el producto?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#58FA82",   
        confirmButtonText: "Si, Quiero verlo!",   
        cancelButtonText: "No Quiero!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Listo!", "En unos segundos sera redirigido.", "success");
                window.setInterval(function(){
                 location.href = $url + "productos/reabastecerAdd/" + $cod_producto;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se reabastecera el producto :)", "error");   } });

}




function vali_costos(){

    var vereficar= true;

    var obra= document.getElementById("obra");
    var total= document.getElementById("total");

    if (obra.value == "" ) {
        sweetAlert("Oops...", "El campo Mano de Obra esta vacio!", "error");
        obra.focus();
        vereficar= false;
    }

    else if (obra.value <= 0 ) {
    sweetAlert("Oops...", "El campo Mano de obra no acepta numeros negativos o el valor 0 !", "error");
    obra.focus();
    vereficar= false;
} 

    else if (isNaN(obra.value) ) {
    sweetAlert("Oops...", "El campo Mano de Obra solo acepta numeros", "error");
    obra.focus();
    vereficar= false;
}
     else if (total.value == 0) {
    sweetAlert("Oops...", "Debe agregar los materiales primero!", "error"); 
    total.focus();
    vereficar= false;
}   


if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("form_costos").submit();
    },3000);

}

}

function editar_productos(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var descripcion= document.getElementById("descripcion");
    var precio= document.getElementById("precio");


    if (descripcion.value == "" ) {
        sweetAlert("Oops...", "El campo Descripcion esta vacio!", "error");
        descripcion.focus();
        vereficar= false;
    }
    else if (!expRegNombre.exec(descripcion.value)) {
     sweetAlert("Oops...", "El campo Descripcion solo acepta letras y espacios en blancos", "error");
     descripcion.focus();
     vereficar= false;
 }

     else if (precio.value == "" ) {
    sweetAlert("Oops...", "El campo precio unitario esta vacio!", "error"); 
    precio.focus();
    vereficar= false;
}   

    else if (precio.value <= 0 ) {
    sweetAlert("Oops...", "El campo precio no acepta numeros negativos o el valor 0 !", "error");
    precio.focus();
    vereficar= false;
} 

    else if (isNaN(precio.value) ) {
    sweetAlert("Oops...", "El campo precio unitario solo acepta numeros", "error");
    precio.focus();
    vereficar= false;
}


if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("edi_productos").submit();
    },3000);

}

}

function reaba_productos(){

    var vereficar= true;

    var stock= document.getElementById("stock");


    if (stock.value== "" ) {
        sweetAlert("Oops...", "El campo Stock esta vacio!", "error");
        stock.focus();
        vereficar= false;
    }

    else if (isNaN(stock.value) ) {
    sweetAlert("Oops...", "El campo Stock solo acepta numeros", "error");
    stock.focus();
    vereficar= false;
}

else if (stock.value <= 0 ) {
    sweetAlert("Oops...", "El campo stock no acepta numeros negativos o el valor 0 !", "error");
    stock.focus();
    vereficar= false;
} 


if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("reab_productos").submit();
    },3000);

}

}

function vali_cfijos(){

    var vereficar= true;

    var alquiler= document.getElementById("alquiler");
    var agua= document.getElementById("agua");
    var luz= document.getElementById("luz");
    var herramientas= document.getElementById("herramientas");
    var porcentaje= document.getElementById("porcentaje");


    if (alquiler.value== "" ) {
        sweetAlert("Oops...", "El campo alquiler esta vacio!", "error");
        alquiler.focus();
        vereficar= false;
    }


    else if (alquiler.value <= 0 ) {
    sweetAlert("Oops...", "El campo alquiler no acepta numeros negativos o el valor 0!", "error");
    alquiler.focus();
    vereficar= false;
    } 

    else if (isNaN(alquiler.value) ) {
    sweetAlert("Oops...", "El campo alquiler solo acepta numeros", "error");
    alquiler.focus();
    vereficar= false;
}

    if (agua.value== "" ) {
        sweetAlert("Oops...", "El campo agua esta vacio!", "error");
        agua.focus();
        vereficar= false;
    }


    else if (agua.value <= 0 ) {
    sweetAlert("Oops...", "El campo agua no acepta numeros negativos o el valor 0!", "error");
    agua.focus();
    vereficar= false;
} 

    else if (isNaN(agua.value) ) {
    sweetAlert("Oops...", "El campo alquiler solo acepta numeros", "error");
    agua.focus();
    vereficar= false;
}

    if (luz.value== "" ) {
        sweetAlert("Oops...", "El campo luz esta vacio!", "error");
        luz.focus();
        vereficar= false;
    }


    else if (luz.value <= 0 ) {
    sweetAlert("Oops...", "El campo luz no acepta numeros negativos o el valor 0!", "error");
    luz.focus();
    vereficar= false;
} 

    else if (isNaN(luz.value) ) {
    sweetAlert("Oops...", "El campo luz solo acepta numeros", "error");
    luz.focus();
    vereficar= false;
}

    if (herramientas.value== "" ) {
        sweetAlert("Oops...", "El campo herramientas esta vacio!", "error");
        herramientas.focus();
        vereficar= false;
    }


    else if (herramientas.value <= 0 ) {
    sweetAlert("Oops...", "El campo herramientas no acepta numeros negativos o el valor 0!", "error");
    herramientas.focus();
    vereficar= false;
} 

    else if (isNaN(herramientas.value) ) {
    sweetAlert("Oops...", "El campo herramientas solo acepta numeros", "error");
    herramientas.focus();
    vereficar= false;
}
    if (porcentaje.value== "" ) {
        sweetAlert("Oops...", "El campo Porcetaje a Agregar esta vacio!", "error");
        porcentaje.focus();
        vereficar= false;
    }


    else if (porcentaje.value <= 0 ) {
    sweetAlert("Oops...", "El campo porcentaje no acepta numeros negativos o el valor 0!", "error");
    porcentaje.focus();
    vereficar= false;
} 

    else if (isNaN(porcentaje.value) ) {
    sweetAlert("Oops...", "El campo Porcetaje a Agregar solo acepta numeros", "error");
    porcentaje.focus();
    vereficar= false;
}



if (vereficar) {
    sweetAlert("Bien!", "Costos Fijos Actualizados!", "success");
    window.setInterval(function(){
        document.getElementById("costos_fijos").submit();
    },3000);

}

}

function agregar_producto(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-Z1-9ÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var descripcion= document.getElementById("descripcion");
    var precio= document.getElementById("precio");
    var final= document.getElementById("final");
    var stock= document.getElementById("stock");


    if (descripcion.value == "" ) {
        sweetAlert("Oops...", "El campo Descripcion esta vacio!", "error");
        descripcion.focus();
        vereficar= false;
    }
    else if (!expRegNombre.exec(descripcion.value)) {
     sweetAlert("Oops...", "El campo Descripcion solo acepta letras y espacios en blancos", "error");
     descripcion.focus();
     vereficar= false;
 }

 else if (precio.value == "" ) {
    sweetAlert("Oops...", "Debe calcular el Precio Sugerible!", "error"); 
    precio.focus();
    vereficar= false;
}   

 else if (final.value == "" ) {
    sweetAlert("Oops...", "El campo Precio Final esta vacio!", "error"); 
    precio.focus();
    vereficar= false;

} 

else if (final.value <= 0 ) {
    sweetAlert("Oops...", "El campo Precio Final no acepta numeros negativos o el valor 0 !", "error");
    final.focus();
    vereficar= false;
} 

else if (isNaN(final.value) ) {
    sweetAlert("Oops...", "El campo Precio Final  solo acepta numeros", "error");
    final.focus();
    vereficar= false;
}

 else if (stock.value == "" ) {
    sweetAlert("Oops...", "El campo Stock Inicial esta vacio!", "error"); 
    stock.focus();
    vereficar= false;

}

else if (stock.value <= 0 ) {
    sweetAlert("Oops...", "El campo Stock  Incial no acepta numeros negativos o el valor 0 !", "error");
    stock.focus();
    vereficar= false;
} 

else if (isNaN(final.value) ) {
    sweetAlert("Oops...", "El campo Stock Inicial  solo acepta numeros", "error");
    stock.focus();
    vereficar= false;
}

 else if (stock.value == 0 ) {
    sweetAlert("Oops...", "El campo Stock Inicial no puede ser 0!", "error"); 
    stock.focus();
    vereficar= false;

} 

if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("agregarproducto").submit();
    },3000);
}

}

function factura() {
 
    var apyn= document.getElementById("apyn");

    if (apyn.value == "") {
    sweetAlert("Atencion", "La factura sera tipo C!", "warning"); 
    window.setInterval(function(){
        document.getElementById("factura").submit();
    },3000);
}
    else{
    document.getElementById("factura").submit();
}


}




function vali_facturab(){

    var vereficar= true;

    var total= document.getElementById("total");


    if (total.value == 0 ) {
    sweetAlert("Error", "Debe Buscar los Productos primero!", "error"); 
    total.focus();
    vereficar= false;
        
    }
if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("facturab").submit();
    },3000);
}

}



function vali_facb(){
    var efec= document.getElementById('efectivo')
  var efectivo = Number(document.form_efectivob.efectivo.value);
  var total = Number(document.form_efectivob.total.value);
  var vuelto = parseFloat(efectivo) - parseFloat(total);

 if (isNaN(efec.value) ) {
    sweetAlert("Oops...", "El campo Efectivo  solo acepta numeros", "error");
    efec.focus();
    vereficar= false;
}

 else if (efectivo == "") {
 sweetAlert("Oops..","El campo efectivo esta vacio","warning");
 return 0;


}

else if (efectivo < total) {
 sweetAlert("Oops..","El efectivo es menor al total","warning");
 return 0;
}

    
   if (efectivo >= total){          
    sweetAlert("Bien!","Su vuelto es: " + "$"+vuelto ,"success");
    window.setInterval(function(){
    document.form_efectivob.submit();
   },3000);
}
}


function vueltofact() {
 var ingreso1 = document.form_efectivob.efectivo.value;
 var ingreso2 = document.form_efectivob.total.value;
 var vuelto = 0;
 try{
      //Calculamos el número escrito:
      ingreso1 = (isNaN(parseFloat(ingreso1)))? 0 : parseFloat(ingreso1);
      ingreso2 = (isNaN(parseFloat(ingreso2)))? 0 : parseFloat(ingreso2);
      vuelto = (ingreso1-ingreso2);
      vuelto = vuelto.toFixed(2);

      document.form_efectivob.vuelto.value =vuelto;
  }
   //Si se produce un error no hacemos nada
   catch(e) {}

}








function vali_factua(){

    var vereficar= true;

    var total= document.getElementById("total");


    if (total.value ==0) {
    sweetAlert("Error", "Debe Buscar los Productos primero!", "error"); 
    total.focus();
    vereficar= false;  
    }

if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("datos_factura").submit();
    },3000);
}

}



function vali_facturaa(){
    var efec= document.getElementById('efec')
  var efectivo = Number(document.facturaa.efectivo.value);
  var total = Number(document.facturaa.total.value);
  var vuelto = parseFloat(efectivo) - parseFloat(total);

 if (isNaN(efec.value) ) {
    sweetAlert("Oops...", "El campo Efectivo  solo acepta numeros", "error");
    efec.focus();
    vereficar= false;
}

 else if (efectivo == "") {
 sweetAlert("Oops..","El campo efectivo esta vacio","warning");
 return 0;


}

else if (efectivo < total) {
 sweetAlert("Oops..","El efectivo es menor al total","warning");
 return 0;
}

    
   if (efectivo >= total){          
    sweetAlert("Bien!","Su vuelto es: " + "$"+vuelto.toFixed(2) ,"success");
    window.setInterval(function(){
    document.facturaa.submit();
   },3000);
}
}

function vueltofacta() {
 var ingreso1 = document.facturaa.efectivo.value;
 var ingreso2 = document.facturaa.total.value;
 var vuelto = 0;
 try{
      //Calculamos el número escrito:
      ingreso1 = (isNaN(parseFloat(ingreso1)))? 0 : parseFloat(ingreso1);
      ingreso2 = (isNaN(parseFloat(ingreso2)))? 0 : parseFloat(ingreso2);
      vuelto = (ingreso1-ingreso2);
      vuelto = vuelto.toFixed(2);

      document.facturaa.vuelto.value =vuelto;
  }
   //Si se produce un error no hacemos nada
   catch(e) {}

}








function vali_facturac(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/


    var apyn= document.getElementById("apyn");
    var direccion= document.getElementById("direccion");
    var telefono= document.getElementById("telefono");
    var total =document.getElementById('total')


   // if (apyn.value == "" ) {
   //     sweetAlert("Oops...", "El campo Apellido y Nombre  esta vacio!", "error");
   //     apyn.focus();
   //     vereficar= false;
   // }
    //else if (!expRegNombre.exec(apyn.value)) {
    // sweetAlert("Oops...", "El campo Apellido y Nombre solo acepta letras y espacios en blancos", "error");
     //apyn.focus();
     //vereficar= false;
    //}


    //else if (direccion.value == "" ) {
    //sweetAlert("Error", "El campo direccion  esta vacio!!", "error"); 
    //direccion.focus();
    //vereficar= false;
        
    //}

   //else if (telefono.value == "" ) {
    //sweetAlert("Error", "El campo Telefono esta vacio!!", "error"); 
    //telefono.focus();
    //vereficar= false; 

    //}

     if (isNaN(telefono.value) ) {
    sweetAlert("Oops...", "El campo Telefono solo acepta numeros", "error");
    telefono.focus();
    vereficar= false;
    }

    else if (total.value == 0 ) {
    sweetAlert("Error", "Debe Buscar los productos primero!", "error"); 
    direccion.focus();
    vereficar= false;
        
    }
    

if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("datos_factura").submit();

    },3000);
}

}



function vali_facc(){
  var efec= document.getElementById('efectivo')
  var efectivo = Number(document.facturac.efectivo.value);
  var total = Number(document.facturac.total.value);
  var vuelto = parseFloat(efectivo) - parseFloat(total);



 if (isNaN(efec.value) ) {
    sweetAlert("Oops...", "El campo Efectivo  solo acepta numeros", "error");
    efec.focus();
    vereficar= false;
}

 else if (efectivo == "") {
 sweetAlert("Oops..","El campo efectivo esta vacio","warning");
 return 0;


}

else if (efectivo < total) {
 sweetAlert("Oops..","El efectivo es menor al total","warning");
 return 0;
}

    
   if (efectivo >= total){          
    sweetAlert("Bien!","Su vuelto es: " + "$"+vuelto ,"success");
    window.setInterval(function(){
    document.facturac.submit();
   },3000);
}
}

function vueltofactc() {
 var ingreso1 = document.facturac.efectivo.value;
 var ingreso2 = document.facturac.total.value;
 var vuelto = 0;
 try{
      //Calculamos el número escrito:
      ingreso1 = (isNaN(parseFloat(ingreso1)))? 0 : parseFloat(ingreso1);
      ingreso2 = (isNaN(parseFloat(ingreso2)))? 0 : parseFloat(ingreso2);
      vuelto = (ingreso1-ingreso2);
      vuelto = vuelto.toFixed(2);
 
      document.facturac.vuelto.value =vuelto;
  }
   //Si se produce un error no hacemos nada
   catch(e) {}

}



function reabastecerAddVuelto() {
 var efectivo = document.process_buy.efectivo.value;
 var total = document.process_buy.total.value;
 var vuelto = 0;
 try{
      //Calculamos el número escrito:
      efectivo = (isNaN(parseFloat(efectivo)))? 0 : parseFloat(efectivo);
      total = (isNaN(parseFloat(total)))? 0 : parseFloat(total);
      vuelto = (efectivo-total);
      vuelto = vuelto.toFixed(2);

      document.process_buy.vuelto.value =vuelto;
  }
   //Si se produce un error no hacemos nada
   catch(e) {}

}


function cuentaEditar($url,$cod_cuenta){
    swal({   title: "Estas seguro?",   
        text: "Desea editar la cuenta?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#58FA82",   
        confirmButtonText: "Si, Editar!",   
        cancelButtonText: "No Editar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Espere!", "En unos segundos sera redireccionado.", "success");
                window.setInterval(function(){
                 location.href = $url + "cuentas/editar//" + $cod_cuenta;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se editara la cuenta :)", "error");   } });

}


function cuentaEliminar($url,$cod_cuenta){
    swal({   title: "Estas seguro?",   
        text: "Desea eliminar la cuenta?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Si, Eliminar!",   
        cancelButtonText: "No Eliminar!",   
        closeOnConfirm: false,   
        closeOnCancel: false },

        function(isConfirm){   
            if (isConfirm) {  

                swal("Listo!", "Su cuenta no se elimino.", "success");
                window.setInterval(function(){
                 location.href = $url + "cuentas/eliminar/" + $cod_cuenta;
             },2000);
                
            } 

            else {     
                swal("Cancelado", "No se eliminara la cuenta :)", "error");   } });

}


function vali_cuentas(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var codcuenta= document.getElementById("codcuenta");
    var detalle= document.getElementById("detalle");
    

    if (codcuenta.value == "" ) {
        sweetAlert("Oops...", "El campo Codigo de Cuenta esta vacio!", "error");
        codcuenta.focus();
        vereficar= false;
    }

    else if (isNaN(codcuenta.value) ) {
    sweetAlert("Oops...", "El campo Codigo de Cuenta solo acepta numeros", "error");
    documento.focus();
    vereficar= false;
    }



    else if (detalle.value == "" ) {
        sweetAlert("Oops...", "El campo Detalle esta vacio!", "error");
        detalle.focus();
        vereficar= false;
    }

    else if (!expRegNombre.exec(detalle.value)) {
     sweetAlert("Oops...", "El campo Detalle solo acepta letras y espacios en blancos", "error");
     detalle.focus();
     vereficar= false;
 }



if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("cuenta_agregar").submit();
    },3000);

}

}



function vali_cuentas2(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var codcuenta= document.getElementById("codcuenta");
    var detalle= document.getElementById("detalle");
    

    if (codcuenta.value == "" ) {
        sweetAlert("Oops...", "El campo Codigo de Cuenta esta vacio!", "error");
        codcuenta.focus();
        vereficar= false;
    }

    else if (isNaN(codcuenta.value) ) {
    sweetAlert("Oops...", "El campo Codigo de Cuenta solo acepta numeros", "error");
    documento.focus();
    vereficar= false;
    }



    else if (detalle.value == "" ) {
        sweetAlert("Oops...", "El campo Detalle esta vacio!", "error");
        detalle.focus();
        vereficar= false;
    }

    else if (!expRegNombre.exec(detalle.value)) {
     sweetAlert("Oops...", "El campo Detalle solo acepta letras y espacios en blancos", "error");
     detalle.focus();
     vereficar= false;
 }



if (vereficar) {
    sweetAlert("Bien!", "Guardando!", "success");
    window.setInterval(function(){
        document.getElementById("editar_cuentas").submit();
    },3000);

}

}


