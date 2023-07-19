<?php

include_once "../modelos/gestion.bd.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexionbd = new conexion();

    $idUsuario = $_POST['idUsuario'];
  
    $consulta = $conexionbd->consultar("select * from usuario where idUsuario = '$idUsuario';");

    $respuesta  = mysqli_fetch_assoc($consulta);

    echo json_encode($respuesta);
    return;
}

