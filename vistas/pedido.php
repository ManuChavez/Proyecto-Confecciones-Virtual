<?php
session_start();
if ($_SESSION["on"] != true){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
		<title>Pedidos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
		<link rel="stylesheet" type="text/css" href="../css/pedido.css">
  </head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Confecciones Virtual</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
        <li><a href="cliente.php"><span class="glyphicon glyphicon-plus-sign"></span> Clientes</a></li>
        <li class="active"><a href="pedido.php"><span class="glyphicon glyphicon-book"></span> Pedidos</a></li>
        <li><a href="entrega.php"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><h4><span class="glyphicon glyphicon-user"></span><?php echo " Bienvenido ".$_SESSION['nombre']."" ;?></h4></li>
        <li><a href="../php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
    
<div class="container">    
    <div class="col-sm-4" >
    	            <form role="form" method="POST" id="formuPedido">
                    <h3>Ingreso de pedidos</h3>
                    
                    <div class="form-group">
                        
                        <label for="exampleInputEmail1">
                            Cliente:
                        </label>
						
						
					           	<?php
                        require('../php/conexion.php');
                        $db = new Conexion();   
						          $sentencia = $db->query("SELECT * FROM cliente");
						          $filas= $db->rows($sentencia);
						          ?>
						          <select class="btn btn-default" name="nombres" size="0">
						            <?php if($filas>0){
	                        	 	for($i=0 ; $i<$filas ; $i++){ 
	                        	 		$datoss= $db->recorrer($sentencia); 
	                        ?>
	                        			<option value=<?php echo $datoss['rutCliente']; ?> > <?php echo $datoss['nombreCliente'] ?></option>
							           <?php 	} 
								     } 
							       ?>
						      </select>
						
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ingrese Fecha Inicio:   
                        </label>
                        <input name="in-fechaini" type="date" required="" placeholder="Fecha Inicio" class="form-control" required  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ingrese Fecha Termino:
                        </label>
                        <input name="in-fechater" type="date" required="" placeholder="Fecha Termino" class="form-control" required  />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Ingrese Detalle:
                        </label>
                        <textarea name="detalle" required="">Escribe aquí el Detalle</textarea>
                    </div>
                    <div class="col-sm-4"></div>
                   <button class="btn btn-lg btn-success" type="submit" ><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button>
                </form>
      
    </div>

    <div class="col-sm-8">
        <div class="row">
            <h3>Lista de Pedidos</h3>
        </div>
            <div class="row" id="formu">
                <!-- TABLA -->
                <table class="table table-hover table-bordered text-center" id="tablaPedido">
                    <!-- Cabeza tabla -->
                    <thead>
                        <tr>
                          <th>Id</th>
                          <th>Cliente</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Termino</th>
                          <th>Detalle</th>
                          <th>Opciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo tabla -->
                    <tbody>
                      <?php 
						//$sql = $db->query("SELECT * FROM pedido");
						$sql=$db->query("SELECT idPedido,detallePedido,fechaInicioPedido,fechaTerminoPedido,nombreCliente
										FROM pedido
										INNER JOIN cliente
										ON pedido.rutCliente=cliente.rutCliente
                    ORDER BY fechaInicioPedido");
                        $nfilas = $db->rows($sql);
                       

                        if ($nfilas > 0){
                            for ($i=0; $i<$nfilas; $i++) {
                               
                                $datos = $db->recorrer($sql);
                            
                                echo '<tr id="filaDatosPedido'.$datos['idPedido'].'">';
                                echo '<td>'. $datos['idPedido'] . '</td>';
                                echo '<td>'. $datos['nombreCliente'] . '</td>';
                                echo '<td>'. $datos['fechaInicioPedido'] . '</td>';
                                echo '<td>'. $datos['fechaTerminoPedido'] . '</td>';
                                echo '<td>'. $datos['detallePedido'] . '</td>';
                                echo '<td>'. '<button value=\''.$datos['idPedido'].'\' type="button" class="btn btn-danger botonBorrarPedido"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></td>';
                            }
                        }
                      ?>
                    </tbody>
                </table>
            </div>  
    </div> 
    
 
 </div>   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="../js/guardarPedido.js" type="text/javascript"></script>
    <script src="../js/eliminarPedido.js" type="text/javascript"></script>       
      
    

</body>
</html>
