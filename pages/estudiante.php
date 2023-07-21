<?php include_once "../assets/cabecera.php";
include_once "../server/zona_priv.php";

include_once('../modelos/gestion.bd.php');
$conexionbd = new conexion();


$consulta = $conexionbd->consultar("select usuario.idUsuario, usuario.Pnombre, usuario.Papellido  from usuario where Tipo_usuario = 'Estudiante' Or Tipo_usuario = 'estudiante' ;");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  
  $consulta = $conexionbd->consultar("INSERT INTO datosacademicosestudiante(codigo_estudiante, Usuario_idUsuario, Grado, Seccion, Padre_idPadre) values( '" . $_POST["codigo_estudiante"] . "' , '" . $_POST["Usuario_idUsuario"] . "' , '" . $_POST["Grado"] . "',  '" . $_POST["Seccion"] . "' , '" . $_POST["Padre_idPadre"] . "') ;");

  if ($consulta) {
    header("location: /");
  }
}


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
          <h1 class="h3 mb-0 text-gray-800 mt-5">Estudiante</h1>
        </div>

        <!-- /.Escriban acá el contenido -->
        <div class="container">
          <form method="post" class="form-horizontal">
            <div class="form-group">
              <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
              <div class="col-sm-10">
                <select id="Usuario_idUsuario" class="form-control" name="Usuario_idUsuario">
                  <option value="0"> -- Seleccione --</option>
                  <?php
                  while ($datos = mysqli_fetch_assoc($consulta)) { ?>
                    <option value="<?php echo $datos["idUsuario"] ?>"> <?php echo $datos["Pnombre"] . " " . $datos["Papellido"]; ?> </option>

                  <?php
                  }
                  ?>

                </select>
              </div>
            </div>



            <div class="form-group">
              <label for="codigo_estudiante" class="col-sm-2 control-label">Código Estudiante:</label>
              <div class="col-sm-10">
                <input type="tex" id="codigo_estudiante" name="codigo_estudiante" class="form-control" required>
              </div>
            </div>

            <div class="form-group">
              <label for="Grado" class="col-sm-2 control-label">Año o grado:</label>
              <div class="col-sm-10">
                <select id="Grado" name="Grado" class="form-control" required>
                  <option value="">Seleccione un año</option>
                  <option value="Primero">1er año</option>
                  <option value="Segundo">2do año</option>
                  <option value="Tercero">3er año</option>
                  <option value="Cuarto">4to año</option>
                  <option value="Quinto">5to año</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="Seccion" class="col-sm-2 control-label">Sección:</label>
              <div class="col-sm-10">
                <select id="Seccion" name="Seccion" class="form-control" required>
                  <option value="">Seleccione su Sección</option>
                  <option value="A"> A </option>
                  <option value="B"> B </option>
                  <option value="C"> C </option>

                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="Padre_idPadre" class="col-sm-2 control-label">Padre o Tutor:</label>
              <div class="col-sm-10">
                <select id="Padre_idPadre" class="form-control" name="Padre_idPadre">
                  <option value="0"> -- Seleccione --</option>
                  <?php
                  $consulta2 = $conexionbd->consultar("select usuario.idUsuario, usuario.Pnombre, usuario.Papellido  from usuario where Tipo_usuario = 'Padre' Or Tipo_usuario = 'padre' Or Tipo_usuario = 'Tutor' Or Tipo_usuario = 'tutor' ;");
                  while ($datos = mysqli_fetch_assoc($consulta2)) { ?>
                    <option value="<?php echo $datos["idUsuario"] ?>"> <?php echo $datos["Pnombre"] . " " . $datos["Papellido"]; ?> </option>

                  <?php
                  }
                  ?>

                </select>
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

<!-- Scripts necesarios -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php include_once "../assets/footer.php"; ?>