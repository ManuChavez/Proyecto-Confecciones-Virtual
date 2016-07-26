<?php
	require('conexion.php');
	$db= new Conexion();

	$var=$db->escape_string($_GET['idPedido']);
    /* Enviamos la instrucción SQL que permite ingresar 
    los datos a la BD en la tabla cliente */
    if($db->query("DELETE FROM pedido WHERE idPedido = '".$var."';")){
    	header('Content-Type: application/json');
    	echo json_encode(array('exito'=>true, 'idPedido'=>$var));
    }else{
    	die("Ocurrio un problema al ejecutar la consulta de insercion en BBDD error [ ".$db->error." ]");
    }

?>
