  var id;
  $('.botonBorrarPedido').click(function(){
      id = $(this).val();
      console.log(id);
    $.get('../php/eliminarPedido.php?idPedido='+id,
          function(dato){
              if (dato.exito){
               // si la respuesta fue exitosa entonces eliminamos la fila de la tabla
                  $('#filaDatosPedido'+id).remove();
                  window.alert('Eliminado Con exito El Pedido!');
              }else{
                 window.alert('Error al recibir la respuesta del Servidor');
                     
              }
       });
  });
