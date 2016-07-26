<?php
session_start();
require('conexion.php');
    
$db = new Conexion();
$usuario = mysqli_real_escape_string($db,$_POST['user']);
$contrasena = mysqli_real_escape_string($db,$_POST['passw']);

$sql = "SELECT * FROM usuario";  

if(!$resultado= $db->query($sql)){
	echo "Error en la Consulta";
	exit;
}


while( $var = $resultado->fetch_assoc() ){
	
	if($usuario==$var['nombreUsuario'] and $contrasena==$var['contrasenaUsuario']){
		$_SESSION["on"] = true;
		$_SESSION["nombre"] = $var['nombreUsuario'];
		$_SESSION["contrasenaa"] = $var['contrasenaUsuario']; 

		header ("Location: ../vistas/inicio.php");
		break;
	}else{
		header("Location: ../vistas/login.php");
	}
}
?>