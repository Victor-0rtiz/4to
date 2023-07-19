<?php

include_once "../modelos/calificaciones.php";

if (isset($_POST['idCalificacione']) && isset($_POST['Asignatura_idAsignatura']) && isset($_POST['Docente_idDocente']) && isset($_POST['Estudiantes_idEstudiantes']) && isset($_POST['AnioLectivo']) && isset($_POST['IP']) && isset($_POST['IIP']) && isset($_POST['NIS']) && isset($_POST['IIIP']) && isset($_POST['IVP']) && isset($_POST['NSS']) && isset($_POST['NF'])) {
    $objetoCalificaciones = new Calificaciones();

    $idCalificacione = $_POST['idCalificacione'];
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

    if ($objetoCalificaciones->updateCalificacion($idCalificacione, $Asignatura_idAsignatura, $Docente_idDocente, $Estudiantes_idEstudiantes, $AnioLectivo, $IP, $IIP, $NIS, $IIIP, $IVP, $NSS, $NF)) {
        $respuesta = '1';
        header("Location: /pages/mostrarCalificacion.php?resp=$respuesta");
    } else {
        $respuesta = '2';
        header("Location: /pages/mostrarCalificacion.php?resp=$respuesta");
    }
}
