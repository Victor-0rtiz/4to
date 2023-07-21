<?php 
include_once "../modelos/gestion.bd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    

    $conexionbd = new conexion();

   
  
    $consulta = $conexionbd->consultar("select docente.idDocente, usuario.Pnombre, usuario.Papellido  from docente inner join usuario on docente.Usuario_idUsuario = usuario.idUsuario");

    $respuesta =[];
    while ($datos= mysqli_fetch_assoc($consulta)) {
        $respuesta[] = $datos;
    }

    echo json_encode($respuesta);
    return;
}
?>