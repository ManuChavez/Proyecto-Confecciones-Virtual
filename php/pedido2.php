<?php 			
require('conexion.php');
$db                            = new Conexion();   
						
$id                            = $db->escape_string($_POST['in-id']);
$detalle                       = $db->escape_string($_POST['detalle']);
$fechaini                      = $db->escape_string($_POST['in-fechaini']);
$fechater                      = $db->escape_string($_POST['in-fechater']);
$nombres                       = $db->escape_string($_POST['nombres']);

if($db->query("INSERT INTO pedido VALUES ('$id','$detalle','$fechaini','$fechater','$nombres')")){
	$sql=$db->query("SELECT idPedido,nombreCliente
										FROM pedido
										INNER JOIN cliente
										ON pedido.rutCliente=cliente.rutCliente");
                        $nfilas = $db->rows($sql);
                        if ($nfilas > 0){
                            for ($i=0; $i<$nfilas; $i++) {
                               
                                $datos = $db->recorrer($sql);
                            
                                $id = $datos['idPedido'];
                                $nombres = $datos['nombreCliente'];
                            }
                        }

	header('Content-Type: application/json');
	echo json_encode(array('exito' =>true, 'idPedido'=>$id,'detalle'=>$detalle, 'fechaini'=>$fechaini,'fechater'=>$fechater, 'nombres'=>$nombres));
}else{
	die("Problema al ejecutar la consulta [ ".$db->error." ]");
}
?>