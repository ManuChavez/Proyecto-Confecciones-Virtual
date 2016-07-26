<?php
	require('conexion.php');
	$db= new Conexion();

	$rutCliente = $db->escape_string($_POST['rutCliente']);
    $nombreCliente = $db->escape_string($_POST['nombreCliente']);
    $correoCliente = $db->escape_string($_POST['correoCliente']);
    $telefonoCliente = $db->escape_string($_POST['telefonoCliente']);


    /* Enviamos la instrucción SQL que permite ingresar 
    los datos a la BD en la tabla contactos */
    if($db->query("insert into cliente values ('$rutCliente','$nombreCliente','$correoCliente','$telefonoCliente');")){
    	header('Content-Type: application/json');
    	echo json_encode(array('exito'=>true, 'rutCliente'=>$rutCliente,'nombreCliente'=>$nombreCliente, 'correoCliente'=>$correoCliente,'telefonoCliente'=>$telefonoCliente));
    }else{
    	die("Ocurrio UN problema al ejecutar la consulta de insercion en BBDD error [ ".$db->error." ]");
    }

?>