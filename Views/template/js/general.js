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
  if (efectivo < total) {
    alert("No se pudo completar la operacion");
    document.process_buy.efectivo.focus();
    return 0;
}
if (efectivo >= total){          
    alert("Su vuelto es: " + "$"+vuelto);

    document.process_buy.submit();
}
}

function print() {
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
        confirmButtonColor: "#DD6B55",   
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

function vali_resba(){

    var vereficar= true;
    var expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/

    var stock= document.getElementById("stock");
   

    if (stock.value == "" ) {
        sweetAlert("Oops...", "El campo  esta vacio!", "error");
        stock.focus();
        vereficar= false;
    }

     else if (isNaN(stock.value) ) {
    sweetAlert("Oops...", "El campo stock solo acepta numeros", "error");
    stock.focus();
    vereficar= false;
    }

    if (vereficar) {
    sweetAlert("Bien!", "Redireccionando!", "success");
    window.setInterval(function(){
        document.getElementById("form_resba").submit();
    },3000);

    }
}
