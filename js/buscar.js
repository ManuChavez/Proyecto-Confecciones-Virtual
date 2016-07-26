$('#buscaPed').on('keyup',function (){
	var dato = $('#buscaPed').val();	
	var url = '../php/buscaPedido.php';
		$.ajax({
			type:'POST',
			url:url,
			data:'dato='+dato,
			success: function(datos){
				$('#misPedidos').html(datos);
			}
		});
		return false;
		});		
