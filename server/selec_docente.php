<?php 
include_once "../modelos/gestion.bd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    

    $conexionbd = new conexion();

   
  
    $consulta = $conexionbd->consultar("select idUsuario, Pnombre, Papellido  from usuario where Tipo_usuario = 'docente' OR Tipo_usuario = 'Docente'");

    $respuesta =[];
    while ($datos= mysqli_fetch_assoc($consulta)) {
        $respuesta[] = $datos;
    }

    echo json_encode($respuesta);
    return;
}
?>