<?php 
include_once "../modelos/gestion.bd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conexionbd = new conexion();
 
  
    $consulta = $conexionbd->consultar("select datosacademicosestudiante.idEstudiantes as id, usuario.Pnombre as nombre, usuario.Papellido as apellido from datosacademicosestudiante inner join usuario on datosacademicosestudiante.idEstudiantes = usuario.idUsuario   ");

    $respuesta =[];
    while ($datos= mysqli_fetch_assoc($consulta)) {
        $respuesta[] = $datos;
    }

    echo json_encode($respuesta);
    return;
}
?>