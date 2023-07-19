<?php
include_once "../modelos/gestion.bd.php";
include_once "../modelos/calificaciones.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $objeto = new Calificaciones();

    $Calificacion = $_POST['idCalificacione'];

    if($objeto->deleteCalificacion($Calificacion)){
        echo json_encode(["respuesta" => true]);
        return;
    }
}
?>
