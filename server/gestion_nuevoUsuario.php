<?php

include_once "../modelos/usuarios.php";

if(isset($_POST['Pnombre']) && isset($_POST['Papellido']) && isset($_POST['Usuario']) && isset($_POST['Contra']) && isset($_POST['fecha_nacimiento']) && isset($_POST['Celular']) && isset($_POST['Tipo_usuario'])){

    $objeto = new Usuarios();

    $Pnombre = $_POST['Pnombre'];
    $Papellido = $_POST['Papellido'];
    $Usuario = $_POST['Usuario'];
    $Contra = $_POST['Contra'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $Celular = $_POST['Celular'];
    $Tipo_usuario = $_POST['Tipo_usuario'];

    if($objeto->createUsuario($Pnombre, $Papellido, $Usuario, $Contra, $fecha_nacimiento, $Celular, $Tipo_usuario)){
        $ok = "1";
        header("Location: /index.php?variable=$ok");
    }else{
        $notok = "2";
        header("Location: /index.php?variable=$notok");
    }

}

