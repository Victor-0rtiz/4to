<?php

include_once "gestion.bd.php";

class Calificaciones
{
    private $objeto;

    public function __construct()
    {
        $this->objeto = new conexion();
    }

    public function createCalificacion($asignaturaId, $docenteId, $estudiantesId, $anioLectivo, $ip, $iip, $nis, $iiip, $ivp, $nss, $nf)
    {
        // return "insert into Calificaciones (Asignatura_idAsignatura, Docente_idDocente, Estudiantes_idEstudiantes, AnioLectivo, IP, IIP, NIS, IIIP, IVP, NSS, NF) values ('$asignaturaId', '$docenteId', '$estudiantesId', '$anioLectivo', '$ip', '$iip', '$nis','$iiip', '$ivp', '$nss', '$nf'); ";
        return $this->objeto->consultar("insert into Calificaciones (Asignatura_idAsignatura, Docente_idDocente, Estudiantes_idEstudiantes, AnioLectivo, IP, IIP, NIS, IIIP, IVP, NSS, NF) values ('$asignaturaId', '$docenteId', '$estudiantesId', '$anioLectivo', '$ip', '$iip', '$nis','$iiip', '$ivp', '$nss', '$nf'); ");

    }

    public function readCalificaciones()
    {
        return $this->objeto->consultar("SELECT calificaciones.idCalificacione AS id,
        asignatura.NombreAsignatura AS Asignatura,
        docente_usuario.Pnombre AS docente,
        estudiante_usuario.Pnombre AS nombre_estudiante,
        calificaciones.AnioLectivo,
        calificaciones.IP,
        calificaciones.IIP,
        calificaciones.NIS,
        calificaciones.IIIP,
        calificaciones.IVP,
        calificaciones.NSS,
        calificaciones.NF
 FROM calificaciones
 INNER JOIN asignatura ON calificaciones.Asignatura_idAsignatura = asignatura.idAsignatura
 INNER JOIN docente ON calificaciones.Docente_idDocente = docente.idDocente
 INNER JOIN datosacademicosestudiante ON calificaciones.Estudiantes_idEstudiantes = datosacademicosestudiante.idEstudiantes
 INNER JOIN usuario AS docente_usuario ON docente.Usuario_idUsuario = docente_usuario.idUsuario
 INNER JOIN usuario AS estudiante_usuario ON datosacademicosestudiante.Usuario_idUsuario = estudiante_usuario.idUsuario;
 ");
    }


    public function updateCalificacion($calificacionId, $asignaturaId, $docenteId, $estudiantesId, $anioLectivo, $ip, $iip,$nis, $iiip, $ivp, $nss, $nf)
    {
        return $this->objeto->consultar("UPDATE Calificaciones SET califificacionId '$calificacionId', asignaturaId = '$asignaturaId', docenteId = '$docenteId', estudiantesId = '$estudiantesId', aniolectivo = '$anioLectivo', IP ='$ip', IIP = '$iip', NIS = '$nis', IIP = '$iiip' IVP ='$ivp', 
        NSS = '$nss' , 'NF ='$nf' WHERE id = '$calificacionId';"); 
    }

    public function deleteCalificacion($calificacionId)
    {
        return $this->objeto->consultar("delete from Calificaciones WHERE idCalificacione = '$calificacionId';");
    }
    
}
