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
function submitForm(action)
    {
        document.getElementById('agregarproducto').action = action;
        document.getElementById('agregarproducto').submit();
    }