<?php 
include_once "../modelos/gestion.bd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $idCalificacion= $_POST["idCalificacione"];
    

    $conexionbd = new conexion();

   
  
    $consulta = $conexionbd->consultar("select * from calificaciones where idCalificacione = $idCalificacion");

    $respuesta = mysqli_fetch_assoc($consulta);
   

    echo json_encode($respuesta);
    return;
}
?>