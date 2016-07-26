      var id;
      $('.botonBorrar').click(function(){
        id = $(this).val();
        console.log(id);
        $.get('../php/eliminarPedido.php?idPedido='+id,
          function(datos){
              if (datos.exito){
               // si la respuesta fue exitosa entonces eliminamos la fila de la tabla
                  $('#filaDatosPedido'+id).remove();
              }else{
                     
              }
           });
      });   
        $( "#formuPedido" ).submit(function( event ) {
          event.preventDefault();
            
            $.post('../php/pedido2.php',
              $('#formuPedido').serialize(),
              function(datos) {
                if (datos.exito){
                  window.alert('Pedido Agregado Con Exito!'); 
                  $('#tablaPedido tr:last').after(
                         '<tr id="filaDatosPedido'+datos.idPedido+'">'+
                           '<td>'+datos.idPedido+'</td>'+
                           '<td>'+datos.nombres+'</td>'+
                           '<td>'+datos.fechaini+'</td>'+
                           '<td>'+datos.fechater+'</td>'+
                           '<td>'+datos.detalle+'</td>'+
                           '<td> <button value=\''+id+'\' type="button" class="btn btn-danger" id="botonBorrar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></td>'+
               '</tr>'
                         ); 
                }else{
                    alert('Error Al Agregar Datos');              
                }
            });
        });