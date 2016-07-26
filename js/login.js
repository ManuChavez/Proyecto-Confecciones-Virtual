$('#sunmitt').click(function(e){
	e.preventDefault();
	$.post('validar.php',
		$('#form-login').serialize(),
			function(respuestaServer){
				if(!respuestaServer.salida){
					$(location).attr('href', 'inicio.html');
					alert('Exito al Ingresar');
				}else{
					alert('Datos Incorrectos');

				}
			});
});