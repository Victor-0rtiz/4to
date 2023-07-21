<?php

include_once "../modelos/usuarios.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $objeto = new Usuarios();

    $Pnombre = $_POST['Pnombre'];
    $Papellido = $_POST['Papellido'];
    $Usuario = $_POST['Usuario'];
    $Contra = $_POST['Contra'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $Celular = $_POST['Celular'];
    $Tipo_usuario = $_POST['Tipo_usuario'];

    if($objeto->createUsuario($Pnombre, $Papellido, $Usuario, $Contra, $fecha_nacimiento, $Celular, $Tipo_usuario)){
        $respuesta= ["respuesta"=> true];
        echo json_encode($respuesta);
        return;
    }else{
        $respuesta= ["respuesta"=> false];
        echo json_encode($respuesta);
        return;
    }

}

