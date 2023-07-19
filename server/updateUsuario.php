<?php

include_once "../modelos/gestion.bd.php";
include_once "../modelos/usuarios.php";




if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $objetoUsuario = new Usuarios();

    $idUsuario = $_POST['idUsuario'];
    $Pnombre = $_POST['Pnombre'];
    $Papellido = $_POST['Papellido'];
    $Usuario = $_POST['Usuario'];
    $Contra = $_POST['Contra'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $Celular = $_POST['Celular'];
    $Tipo_usuario = $_POST['Tipo_usuario'];



    if ($objetoUsuario->updateUsuario($idUsuario, $Pnombre, $Papellido, $Usuario, $Contra, $fecha_nacimiento, $Celular, $Tipo_usuario)) {
       
        echo json_encode(["correcto" => true]);
        return;
    } else {

        echo json_encode(["incorrecto" => false]);
        return;
    }
}
