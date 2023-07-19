<?php
session_start();

include_once "../modelos/gestion.bd.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conexionbd = new conexion();

    $user = $_POST['username'];
    $pwd = $_POST['password'];
    $consulta = $conexionbd->consultar("select * from usuario where Usuario = '$user' and Contra = '$pwd';");

    if (mysqli_num_rows($consulta)>0) {

        $sesion = mysqli_fetch_array($consulta);
        $_SESSION['sesioncreada'] = $sesion;
        header('Location: /');
    }else{
        $consulta_fallida=true;      

    }
}




