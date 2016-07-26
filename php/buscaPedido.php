<?php
require('conexion.php');
$db= new Conexion();
$dato= $db->escape_string($_POST['dato']);
<<<<<<< HEAD

    $registro= $db->query("SELECT * FROM pedido 
           INNER JOIN cliente
           ON pedido.rutCliente=cliente.rutCliente
           WHERE detallePedido LIKE '%$dato%'
           ORDER BY fechaInicioPedido ASC");

=======
echo $dato;

    $registro= $db->query("SELECT idPedido,detallePedido,fechaInicioPedido,fechaTerminoPedido,nombreCliente
           FROM pedido
           WHERE idPedido like '$dato'
           INNER JOIN cliente
           ON pedido.rutCliente=cliente.rutCliente");
>>>>>>> 7ce81181920279b521d971c49934e61eabd3d559
	
  echo '<table class="table table-hover table-bordered text-center">
    		<tr>
      			<th>id</th>
      			<th>Cliente</th>
      			<th>Fecha Inicio</th>
      			<th>Fecha Termino</th>
      			<th>Detalle</th>
<<<<<<< HEAD
    		</tr>';                                 

  $nfilas = $db->rows($registro);
=======
    		</tr>';          
 	
 	 $nfilas = $db->rows($registro);
>>>>>>> 7ce81181920279b521d971c49934e61eabd3d559
                       

                        if ($nfilas > 0){
                            for ($i=0; $i<$nfilas; $i++) {
                               
<<<<<<< HEAD
                                $datoss = $db->recorrer($registro);
                            
                                echo '<tr id="filaDatosPedido'.$datoss['idPedido'].'">
                                <td>'.$datoss['idPedido'].'</td>
                                <td>'.$datoss['nombreCliente'].'</td>
                                <td>'.$datoss['fechaInicioPedido'].'</td>
                                <td>'.$datoss['fechaTerminoPedido'].'</td>
                                <td>'.$datoss['detallePedido'].'</td>
=======
                                $datos = $db->recorrer($registro);
                            
                               echo '<tr id="filaDatosPedido'.$datos['idPedido'].'">
                                <td>'.$datos['idPedido'].'</td>
                                <td>'.$datos['nombreCliente'].'</td>
                                <td>'.$datos['fechaInicioPedido'].'</td>
                                <td>'.$datos['fechaTerminoPedido'].'</td>
                                <td>'.$datos['detallePedido'].'</td>
>>>>>>> 7ce81181920279b521d971c49934e61eabd3d559

                          </tr>';
                            }
                        
 }else{
<<<<<<< HEAD
    echo '<tr>
 		<td colspan="5">No se Encontraron Resultados</td>
 		 </tr>';
=======
 	
  echo '<tr>
 			<td colspan="5">No se Encontraron Resultados</td>
 		  </tr>';
>>>>>>> 7ce81181920279b521d971c49934e61eabd3d559
 }  	

echo '</table';

?>