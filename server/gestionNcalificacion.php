<?php

include_once "../modelos/calificaiones.php";

if (isset($_POST['Asignatura_idAsignatura']) && isset($_POST['Docente_idDocente']) && isset($_POST['Estudiantes_idEstudiantes']) && isset($_POST['AnioLectivo']) && isset($_POST['IP']) && isset($_POST['IIP']) && isset($_POST['NIS']) && isset($_POST['IIIP']) && isset($_POST['IVP']) && isset($_POST['NSS']) && isset($_POST['NF'])) {
    // Assuming the Usuarios class handles Calificaciones related operations

    $objetoCalificaciones = new Usuarios();

    $Asignatura_idAsignatura = $_POST['Asignatura_idAsignatura'];
    $Docente_idDocente = $_POST['Docente_idDocente'];
    $Estudiantes_idEstudiantes = $_POST['Estudiantes_idEstudiantes'];
    $AnioLectivo = $_POST['AnioLectivo'];
    $IP = $_POST['IP'];
    $IIP = $_POST['IIP'];
    $NIS = $_POST['NIS'];
    $IIIP = $_POST['IIIP'];
    $IVP = $_POST['IVP'];
    $NSS = $_POST['NSS'];
    $NF = $_POST['NF'];

    if ($objetoCalificaciones->createCalificacion($Asignatura_idAsignatura, $Docente_idDocente, $Estudiantes_idEstudiantes, $AnioLectivo, $IP, $IIP, $NIS, $IIIP, $IVP, $NSS, $NF)) {
        $calificacionOk = "1";
        header("Location: /pages/mostrarCalificacion.php?variable=$calificacionOk");
    } else {
        $calificacionNotOk = "2";
        header("Location: /pages/mostrarCalificacion.php?variable=$calificacionNotOk");
    }
}






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

