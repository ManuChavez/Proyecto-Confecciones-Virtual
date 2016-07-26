	var rutt;

	$('.boton').click( function (){
		rutt = $(this).val();
		console.log(rutt);
		$.get('mostrarUsuario.php?rut='+rutt,
			function(response){
				//Callback que se encarga de llenar el modal con valores actuales
				if(response.exito){// exito es el primer valor del JSON y es de tipo booleano
					$("#up-rut").val(rutt);
					$("#up-nombre").val(response.nomb);
					$("#up-email").val(response.mail);
					$("#up-telefono").val(response.fono);
				}else
					alert("Error al procesar respuesta del servidor"+"\n"+response.errorr)
			})
	});


	$('#form-actualizar').submit(function(event){
		event.preventDefault();

		$.post('actualizar.php?rut='+rutt,
			$('#form-actualizar').serialize(),
				function(datos){
					if(datos.exito){
						$('#filaDatos'+rutt).remove();
						 $('#tablita tr:last').after(
		                     '<tr id="filaDatos'+rutt+'">'+
			                     '<td>'+rutt+'</td>'+
			                     '<td>'+datos.nombreCliente+'</td>'+
			                     '<td>'+datos.correoCliente+'</td>'+
			                     '<td>'+datos.telefonoCliente+'</td>'+
								 '<td> <button value=\''+rutt+'\' type="button" class="btn btn-warning boton" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></span> Actualizar</button> <a id="eliminar" onclick="eliminar( \''+rutt+'\')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></td>'+
							 '</tr>'
		                     );	
						 
	                     $("#myModal").modal('hide');
	                     window.alert('Actualizacion Con Exito!')
					}else{
						alert('Error al recibir la respuesta del Servidor');
					}
				});
	});
