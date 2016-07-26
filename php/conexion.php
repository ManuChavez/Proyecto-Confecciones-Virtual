<?php
class Conexion extends mysqli {
    public function __construct(){
        parent::__construct('localhost','root','potrillo','confecciones_de_ropa');
        $this->query("SET NAMES 'utf8';");
      
        $this->connect_errno ? die('Error con la conexion') : $x = 'conectado!';
      
        unset($x);
    }
    public function recorrer($y){
       // La función mysqli_fetch_array() obtiene una fila de resultados como un array asociativo, numérico, o ambos.
        return mysqli_fetch_array($y);
    }

    public function rows($y){
        /* La función mysqli_num_rows() obtiene el número de filas de un resultado.*/
        return mysqli_num_rows($y);
    }
}
?>