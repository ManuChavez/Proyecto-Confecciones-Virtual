<?php
session_start();
if ($_SESSION["on"] != true){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inicio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/inicio.css">
  
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
        <li class="active"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
        <li><a href="cliente.php"><span class="glyphicon glyphicon-plus-sign"></span> Clientes</a></li>
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
        <table class="table table-hover table-bordered text-center" id="tablita">
          <thead>
            <tr>
              <td>RUT</td>
              <td>Nombre</td>
              <td>Correo Electrónico</td>
              <td>Teléfono</td>
              <td>Acción</td>
            </tr>
          </thead>
          <tbody>
          <?php 
            require('../php/conexion.php');
            $db = new Conexion();

            
            $sql = $db->query("SELECT * FROM cliente");
            $resultado =  $db->rows($sql); 
            if ($resultado > 0){
                for ($i=0; $i<$resultado; $i++) {
                   
                    $datos = $db->recorrer($sql);
                
                    echo '<tr id="filaDatos'.$datos['rutCliente'].'">';
                    echo '<td>'. $datos['rutCliente'] . '</td>';
                    echo '<td>'. $datos['nombreCliente'] . '</td>';
                    echo '<td>'. $datos['correoCliente'] . '</td>';
                    echo '<td>'. $datos['telefonoCliente'] . '</td>';
                    echo '<td> <button value=\''.$datos['rutCliente'].'\' type="button" class="btn btn-warning boton" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-edit"></span> Actualizar</button>'." ".'<button value=\''.$datos['rutCliente'].'\' type="button" class="btn btn-danger botonBorrar"><span class="glyphicon glyphicon-trash"></span> Eliminar</button></td>';
                    echo '</tr>';
                }
            }
          ?>
            
          </tbody>
          <tfoot>
            <tr></tr>
          </tfoot>
        </table>
        <!-- Modal para actualizar usuario -->
        <div class="modal fade myModal" id="myModal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content" id="actualizar">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title etiqueta">Actualizar Contacto</h4>
              </div>
              <div class="modal-body">
              <!-- Formulario que utilizaremos para actualizar contacto, llenaremos campos a traves de consulta ajax -->
                <form id="form-actualizar" class="form" >
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="etiqueta"for="rut">RUT :</label>
                    </div>
                    <div class="col-md-5">
                      <input id="up-rut" name="up-rut" class ="form-control"type="text" required="" placeholder="Aquí el Rut" disabled>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="etiqueta"for="nombre">Nombre : </label>
                    </div>
                    <div class="col-md-5">
                      <input id="up-nombre" name="up-nombre" class ="form-control"type="text" required="" placeholder="Aquí el Nombre">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="etiqueta"for="email">Correo Electrónico :</label>
                    </div>
                    <div class="col-md-5">
                      <input id="up-email" name="up-email" class ="form-control"type="text" required="" placeholder="Aquí el E-Mail">
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-md-5">
                      <label class="etiqueta"for="fono">Telefono :</label>
                    </div>
                    <div class="col-md-5">
                      <input id="up-telefono" name="up-telefono" class ="form-control"type="text" required="" placeholder="Aquí el Telefono">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-5"><input type="submit" class="btn btn-success btn-lg" value="Actualizar Contacto" ></div>
                  </div>
                </form>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
              </div>
            </div>

          </div>
        </div>

      </div>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="../js/eliminarCliente.js" type="text/javascript"></script>
      <script src="../js/actualizar.js" type="text/javascript"></script>
    </body>
</html>

