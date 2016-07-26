

<?php
	require('conexion.php');
	$db= new Conexion();
	$var=$_GET['rut'];
	#$consulta="select nombre, email, telefono from contacto where rut = '$var';";	
	if($db->query("select nombreCliente, correoCliente, telefonoCliente from cliente where rutCliente like '$var';")){
		$dato= $db->recorrer($db->query("select nombreCliente, correoCliente, telefonoCliente from cliente where rutCliente like '$var';"));
		$name=$dato['nombreCliente'];
		$mail=$dato['correoCliente'];
		$fono=$dato['telefonoCliente'];
    	header('Content-Type: application/json');
    	echo json_encode(array('exito'=>true, 'nomb'=>$name , 'mail'=>$mail,'fono'=>$fono));
    }else{
    	header('Content-Type: application/json');
    	echo json_encode(array('exito'=>false, 'errorr'=>$db->error));   }
?>