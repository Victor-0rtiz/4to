<?php

include_once "gestion.bd.php";


class usuarios
{

    private $objeto;
    

    public function __construct(){
        $this->objeto = new conexion();
    }

    public function createUsuario($Pnombre, $Papellido, $usuario, $contrasena, $fechanac, $celular, $tipo){
        return $this->objeto->consultar("insert into Usuario(Pnombre, Papellido, Usuario, Contra, fecha_nacimiento, Celular, Tipo_usuario) values ('$Pnombre', '$Papellido', '$usuario', '$contrasena', '$fechanac','$celular', '$tipo');");
    
    }
    
    public function readUsuario(){
       return $this->objeto->consultar("select * from Usuario;");
    }

    public function updateUsuario($id, $Pnombre, $Papellido, $usuario, $contrasena, $fechanac, $celular, $tipo){

        return $this->objeto->consultar("UPDATE usuario SET Pnombre = '$Pnombre', Papellido = '$Papellido', Usuario = '$usuario', Contra = '$contrasena', fecha_nacimiento = '$fechanac', Celular ='$celular', Tipo_usuario = '$tipo' WHERE idUsuario = '$id'; "); 
     }

    public function deleteUsuario($id){

        return $this->objeto->consultar("delete from Usuario where idUsuario ='$id';");
    }


    
}
