<?php

include_once "../modelos/gestion.bd.php";
include_once "../modelos/calificaciones.php";




if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  // echo json_encode($_POST);
  // return;

  $objeto = new Calificaciones();

  $Asignatura_idAsignatura = $_POST["Asignatura_idAsignatura"];
  $Docente_idDocente = $_POST["Docente_idDocente"];
  $Estudiantes_idEstudiantes = $_POST["Estudiantes_idEstudiantes"];
  $AnioLectivo = $_POST["AnioLectivo"];
  $IP = $_POST["IP"];
  $IIP = $_POST["IIP"];
  $NIS = $_POST["NIS"];
  $IIIP = $_POST["IIIP"];
  $IVP = $_POST["IVP"];
  $NSS = $_POST["NSS"];
  $NF = $_POST["NF"];

  //   echo json_encode("$IP");
  // return;


  if ($resp = $objeto->createCalificacion($Asignatura_idAsignatura, $Docente_idDocente, $Estudiantes_idEstudiantes, $AnioLectivo, $IP, $IIP, $NIS, $IIIP, $IVP, $NSS, $NF)) {
    echo json_encode(["respuesta" => $resp]);
    return;
  }
}
