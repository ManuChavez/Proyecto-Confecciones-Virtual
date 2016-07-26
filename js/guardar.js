// Esta primera función agrega un disparador de  evento a la acción submit,
        // esto quiere decir que cuando se presione el botón de submit del formulario
        // con id 'formulario' entonces se ejecutara el código contenido en el.
        $( "#formulario" ).submit(function( event ) {
          event.preventDefault();
            // Como estamos enviamos un formulario, la acción a realizar por AJAX debe ser post.
            // Vamos a ver los parámetros que necesita el método $.post de jQuery para funcionar
            // 1. Dirección a donde se va a enviar el formulario por medio de POST
            // 2. Datos del formulario, la función serializa() convierte el formulario en una cadena de texto
            // 3. Función que se ejecutara cuando se reciba la respuesta del servidor.
            $.post('../php/addCliente.php',
              $('#formulario').serialize(),
              function(datos) {
  
                if (datos.exito){
                      window.alert('Agregado Con exito!'); 
                }else{
                    alert('Error al agregar a base de datos');              
                     }
            });
        });