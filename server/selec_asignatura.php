<?php 
include_once "../modelos/gestion.bd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    

    $conexionbd = new conexion();

   
  
    $consulta = $conexionbd->consultar("select * from asignatura ");

    $respuesta =[];

    while ($datos= mysqli_fetch_assoc($consulta)) {
        $respuesta[] = $datos;
    }

    echo json_encode($respuesta);
    return;
}
?>