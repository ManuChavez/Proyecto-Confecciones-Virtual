<?php
	require('conexion.php');
	$db= new Conexion();
	$var=$_GET['idPedido'];
	if($db->query("SELECT idPedido,detallePedido,fechaInicioPedido,fechaTerminoPedido,nombreCliente
				   FROM pedido
				   WHERE idPedido like '$var'
				   INNER JOIN cliente
				   ON pedido.rutCliente=cliente.rutCliente")){
		$dato= $db->recorrer($db->query("SELECT idPedido,detallePedido,fechaInicioPedido,fechaTerminoPedido,nombreCliente
				   FROM pedido
				   WHERE idPedido like '$var'
				   INNER JOIN cliente
				   ON pedido.rutCliente=cliente.rutCliente"));
	
		$idPedido=$dato['idPedido'];
		$detallePedido=$dato['detallePedido'];
		$fechaInicioPedido=$dato['fechaInicioPedido'];
		$fechaTerminoPedido=$dato['fechaTerminoPedido'];
		$nombreCliente=$dato['nombreCliente'];

    	header('Content-Type: application/json');
    	echo json_encode(array('exito'=>true, 'idPedido'=>$idPedido , 'detallePedido'=>$detallePedido,'fechaInicioPedido'=>$fechaInicioPedido,'fechaTerminoPedido'=>$fechaTerminoPedido,'nombreCliente'=>$nombreCliente));
    }else{
    	header('Content-Type: application/json');
    	echo json_encode(array('exito'=>false, 'errorr'=>$db->error));   }
?>