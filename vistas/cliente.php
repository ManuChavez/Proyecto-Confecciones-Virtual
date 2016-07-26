<?php
session_start();
if ($_SESSION["on"] != true){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>index.php</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/cliente.css">
</head>
<body >
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
        <li class="active"><a href="cliente.php"><span class="glyphicon glyphicon-plus-sign"></span> Clientes</a></li>
        <li><a href="pedido.php"><span class="glyphicon glyphicon-book"></span> Pedidos</a></li>
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
    
    
  <!--
     Creamos el formulario que vamos a enviar para crear una persona
     Este formulario lo vamos a enviar por AJAX con jQuery y por eso le colocamos un id
     La dirección a donde se enviara el formulario va en el código de jQuery y no en el formulario
   -->
   <legend>Ingreso de Cliente</legend><br>
   <div class="container">
     
    <form id="formulario" class="form" >
                  <div class="row form-group">
                    <div class="col-md-3">
                      <label class="etiqueta"for="email">Rut :</label>
                    </div>
                    <div class="col-md-5">
                      <input name="rutCliente" class ="form-control"type="text" required="" placeholder="Aquí el Rut">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-3">
                      <label class="etiqueta"for="nombre">Nombre : </label>
                    </div>
                    <div class="col-md-5">
                      <input name="nombreCliente" class ="form-control"type="text" required="" placeholder="Aquí el Nombre">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-3">
                      <label class="etiqueta"for="email">Correo Electrónico :</label>
                    </div>
                    <div class="col-md-5">
                      <input name="correoCliente" class ="form-control"type="text" required="" placeholder="Aquí el E-Mail">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-3">
                      <label class="etiqueta"for="email">Teléfono :</label>
                    </div>
                    <div class="col-md-5">
                      <input name="telefonoCliente" class ="form-control"type="text" required="" placeholder="Aquí el Telefono">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"><button class="btn btn-lg btn-success"  name="Submit" value="agregar" type="submit"><span class="glyphicon glyphicon-plus-sign"></span> Agregar</button></div>
                  </div>
                </form>
                <!-- Fin formulario -->
            
        </div>
  </div>



  <!-- link para importar jQuery a nuestro proyecto -->


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
      <script src="../js/guardar.js" type="text/javascript"></script>
  
  </body>
</html>