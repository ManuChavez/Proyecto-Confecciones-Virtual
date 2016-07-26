<?php
    require('conexion.php');
    
    $db= new Conexion();
    $rutt= $db->escape_string($_GET['rut']);
    $nombreCliente = $db->escape_string($_POST['up-nombre']);
    $correoCliente = $db->escape_string($_POST['up-email']);
    $telefonoCliente = $db->escape_string($_POST['up-telefono']);

    /* Enviamos la instrucción SQL que permite ingresar 
    los datos a la BD en la tabla contactos */
    if($db->query("update cliente set rutCliente = '$rutt', nombreCliente = '$nombreCliente', correoCliente='$correoCliente', telefonoCliente='$telefonoCliente' where rutCliente like '$rutt';")){
        header('Content-Type: application/json');
        echo json_encode(array('exito'=>true, 'rutCliente'=>$rutCliente,'nombreCliente'=>$nombreCliente, 'correoCliente'=>$correoCliente,'telefonoCliente'=>$telefonoCliente));
    }else{
        die("Ocurrio Un problema al ejecutar la consulta de insercion en BBDD error [ ".$db->error." ]");
    }

?>