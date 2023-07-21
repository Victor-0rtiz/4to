<?php include_once "../assets/cabecera.php";
include_once "../server/zona_priv.php";
include_once('../modelos/gestion.bd.php');
$conexionbd = new conexion();


$consulta = $conexionbd->consultar("select usuario.idUsuario, usuario.Pnombre  from usuario where Tipo_usuario = 'Docente' Or Tipo_usuario = 'docente' ;");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    

    $consulta = $conexionbd->consultar("INSERT INTO docente(inns, Usuario_idUsuario) values( '". $_POST["inss"]. "' , '". $_POST["Usuario_idUsuario"]. "') ;");

    if ($consulta) {
        header("location: /");
    }

}

?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include_once "../assets/menu.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800 mt-5">Docentes</h1>
                </div>

                <!-- /.Escriban acá el contenido -->
                <div class="container">
                    <form method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label for="Usuario_idUsuario" class="col-sm-2 control-label">ID:</label>
                            <select id="Usuario_idUsuario" class="form-control" name="Usuario_idUsuario">
                                <option value="0"> -- Seleccione --</option>
                                <?php
                                while ($datos = mysqli_fetch_assoc($consulta)) { ?>
                                    <option value="<?php echo $datos["idUsuario"] ?>"> <?php echo $datos["Pnombre"] ?> </option>

                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inss" class="col-sm-2 control-label">INSS:</label>
                            <div class="col-sm-10">
                                <input type="text" id="inss" name="inss" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Enviar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.Escriban acá el contenido -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Salomón Ibarra Mayorga</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<?php include_once "../assets/footer.php"; ?>