<?php
	require('conexion.php');
	$db= new Conexion();

	$var=$db->escape_string($_GET['rutCliente']);
    /* Enviamos la instrucción SQL que permite ingresar 
    los datos a la BD en la tabla cliente */
    if($db->query("DELETE FROM cliente WHERE rutCliente = '".$var."';")){
    	header('Content-Type: application/json');
    	echo json_encode(array('exito'=>true, 'rutCliente'=>$var));
    }else{
    	die("Ocurrio un problema al ejecutar la consulta de insercion en BBDD error [ ".$db->error." ]");
    }

?>
