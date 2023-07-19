<?php

include_once "../modelos/gestion.bd.php";
include_once "../modelos/usuarios.php";
include_once "../modelos/calificaciones.php";




if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $objeto = new Usuarios();
    

    $usuario = $_POST['idUsuario'];
       
   

    if($resp = $objeto->deleteUsuario($usuario)){
        echo json_encode(["respuesta"=> true]);
        return;
    }else{
        echo json_encode(["respuesta"=> false]);
        return;
    }
}
?>
