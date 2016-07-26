  var rut;
  $('.botonBorrar').click(function(){
      rut = $(this).val();
      console.log(rut);
    $.get('../php/eliminarCliente.php?rutCliente='+rut,
          function(dato){
              if (dato.exito){
               // si la respuesta fue exitosa entonces eliminamos la fila de la tabla
                  $('#filaDatos'+rut).remove();
                  window.alert('Eliminado Con exito!');
              }else{
                 window.alert('Error al recibir la respuesta del Servidor');
                     
              }
       });
  });

