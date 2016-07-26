<?php
session_start();
if ($_SESSION["on"] != true){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Entrega</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  
  <link rel="stylesheet" type="text/css" href="../css/entrega.css">
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
        <li><a href="pedido.php"><span class="glyphicon glyphicon-book"></span> Pedidos</a></li>
        <li class="active"><a href="entrega.php"><span class="glyphicon glyphicon-search"></span> Buscar</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><h4><span class="glyphicon glyphicon-user"></span><?php echo " Bienvenido ".$_SESSION['nombre']."" ;?></h4></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="col-sm-2"></div>
<div class="col-sm-8">
  
  <table class="table table-hover table-bordered text-center">
    <tr>
      <td width="500"><input type="text" class="form-control" placeholder="Busca Tu Pedido" id="buscaPed"/></td>
    </tr>           
  </table>
  <div class="registro" id="misPedidos">
   <!-- TABLA -->
                <table class="table table-hover table-bordered text-center">
                    <!-- Cabeza tabla -->
                    
                        <tr>
                          <th>Id</th>
                          <th>Cliente</th>
                          <th>Fecha Inicio</th>
                          <th>Fecha Termino</th>
                          <th>Detalle</th>
                          <th>Opciones</th>
                        </tr>
                    <?php
                      require('conexion.php');
                      $db= new Conexion();
                      $registro = $db->query("SELECT idPedido,detallePedido,fechaInicioPedido,fechaTerminoPedido,nombreCliente
                        FROM pedido
                        INNER JOIN cliente
                        ON pedido.rutCliente=cliente.rutCliente
                        ORDER BY fechaInicioPedido ASC");
                      //$nfilas = $db->rows($registro);
                      while( $registro2 = $db->recorrer($registro)){
                         
                          echo '<tr id="filaDatosPedido'.$registro2['idPedido'].'">
                                <td>'.$registro2['idPedido'].'</td>
                                <td>'.$registro2['nombreCliente'].'</td>
                                <td>'.$registro2['fechaInicioPedido'].'</td>
                                <td>'.$registro2['fechaTerminoPedido'].'</td>
                                <td>'.$registro2['detallePedido'].'</td>

                          </tr>';
                      }
                    ?>
                   
                </table>
  </div>

</div>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="../js/buscar.js" type="text/javascript"></script>
</body>
</html>

