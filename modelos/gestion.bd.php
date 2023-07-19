<?php

class conexion
{

    private $server;
    private $user;
    private $pwd;
    private $bd;
    private $mysqli;

    function __construct()
    {
        $this->server = 'localhost';
        $this->user = 'root';
        $this->bd = 'isim_sc';
        $this->pwd = 'cookies';
    }

    public function conectar()
    {

        $this->mysqli = new mysqli($this->server, $this->user, $this->pwd, $this->bd);

        if ($this->mysqli->connect_errno) {

            echo "No se pudo conectar con la base de datos: " . $this->mysqli->connect_error;
            return 0;

        } else {
            //echo "<h1>Lo logré</h1>";
            return $this->mysqli;
        }
    }

    public function cerrarConexion()
    {
        $this->mysqli->close();
    }


    public function consultar($query)
    {
        $result = mysqli_query($this->conectar(), $query);
        if(!$result) {
            die('Query Failed: ' . mysqli_error($this->conectar()));
        }
        $this->cerrarConexion();
        return $result;
    }
}