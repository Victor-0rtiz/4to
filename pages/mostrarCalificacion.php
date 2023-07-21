<?php include_once "../assets/cabecera.php";
include_once "../server/zona_priv.php"; ?>
<?php include_once('../modelos/gestion.bd.php'); ?>
<?php include_once('../modelos/calificaciones.php');
// echo "<pre>";


// $objeto = new Calificaciones();
// $consulta = $objeto->readCalificaciones();
// $rep =[];
// while ($dat = mysqli_fetch_assoc($consulta)){
//     $rep =$dat;

// }
// var_dump($rep);
// echo "</pre>";
// return;

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
                    <h1 class="h3 mb-0 text-gray-800 mt-5">Calificaciones</h1>
                </div>

                <!-- /.Escriban acá el contenido -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <button id="btnNuevo" class="btn btn-primary " data-toggle="modal" data-target="#modalCRUD">Nuevo</button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="tablaCalificaciones" class="table table-striped table-bordered table-condensed" style="width:100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Id</th>
                                            <th>Asignatura</th>
                                            <th>Docente</th>
                                            <th>Estudiante</th>
                                            <th>Año Lectivo</th>
                                            <th>IP</th>
                                            <th>IIP</th>
                                            <th>NIS</th>
                                            <th>IIIP</th>
                                            <th>IVP</th>
                                            <th>NSS</th>
                                            <th>NF</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $objeto = new Calificaciones();
                                        $consulta = $objeto->readCalificaciones();
                                        while ($dat = mysqli_fetch_array($consulta)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $dat['id'] ?></td>
                                                <td><?php echo $dat['Asignatura'] ?></td>
                                                <td><?php echo $dat['docente'] ?></td>
                                                <td><?php echo $dat['nombre_estudiante'] ?></td>
                                                <td><?php echo $dat['AnioLectivo'] ?></td>
                                                <td><?php echo $dat['IP'] ?></td>
                                                <td><?php echo $dat['IIP'] ?></td>
                                                <td><?php echo $dat['NIS'] ?></td>
                                                <td><?php echo $dat['IIIP'] ?></td>
                                                <td><?php echo $dat['IVP'] ?></td>
                                                <td><?php echo $dat['NSS'] ?></td>
                                                <td><?php echo $dat['NF'] ?></td>
                                                <td>
                                                    <button class="btn-primary" data-toggle="modal" data-target="#modalEditar">Editar</button>
                                                    <button class="btn-danger btnBorrarCali" data-id="<?php echo $dat['idCalificacione'] ?>">Eliminar</button>
                                                </td>
                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para CRUD -->
                <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> Agregar Calificación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formcalificacion" method="POST" >
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="Asignatura_idAsignatura" class="col-form-label">Asignatura:</label>
                                        <input type="text" class="form-control" id="Asignatura_idAsignatura" name="Asignatura_idAsignatura">
                                    </div>
                                    <div class="form-group">
                                        <label for="Docente_idDocente" class="col-form-label">Docente:</label>
                                        <input type="text" class="form-control" id="Docente_idDocente" name="Docente_idDocente">
                                    </div>
                                    <div class="form-group">
                                        <label for="Estudiantes_idEstudiantes" class="col-form-label">Estudiante:</label>
                                        <input type="text" class="form-control" id="Estudiantes_idEstudiantes" name="Estudiantes_idEstudiantes">
                                    </div>
                                    <div class="form-group">
                                        <label for="AnioLectivo" class="col-form-label">Año Lectivo:</label>
                                        <input type="text" class="form-control" id="AnioLectivo" name="AnioLectivo">
                                    </div>
                                    <div class="form-group">
                                        <label for="IP" class="col-form-label">IP:</label>
                                        <input type="text" class="form-control" id="IP" name="IP">
                                    </div>
                                    <div class="form-group">
                                        <label for="IIP" class="col-form-label">IIP:</label>
                                        <input type="text" class="form-control" id="IIP" name="IIP">
                                    </div>
                                    <div class="form-group">
                                        <label for="NIS" class="col-form-label">NIS:</label>
                                        <input type="text" class="form-control" id="NIS" name="NIS">
                                    </div>
                                    <div class="form-group">
                                        <label for="IIIP" class="col-form-label">IIIP:</label>
                                        <input type="text" class="form-control" id="IIIP" name="IIIP">
                                    </div>
                                    <div class="form-group">
                                        <label for="IVP" class="col-form-label">IVP:</label>
                                        <input type="text" class="form-control" id="IVP" name="IVP">
                                    </div>
                                    <div class="form-group">
                                        <label for="NSS" class="col-form-label">NSS:</label>
                                        <input type="text" class="form-control" id="NSS" name="NSS">
                                    </div>

                                    <div class="form-group">
                                        <label for="NF" class="col-form-label">NF:</label>
                                        <input type="text" class="form-control" id="NF" name="NF">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="btnGuardar" class="btn btn-dark aggCalificacion">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para editar -->
            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Calificacion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="asignatura" class="col-form-label">Asignatura:</label>
                                <input type="text" class="form-control" id="asignatura" name="asignatura">
                            </div>
                            <div class="form-group">
                                <label for="Docente" class="col-form-label">Docente:</label>
                                <input type="text" class="form-control" id="Docente" name="Docente">
                            </div>
                            <div class="form-group">
                                <label for="Estudiante" class="col-form-label">Estudiante:</label>
                                <input type="text" class="form-control" id="Estudiante" name="Estudiante">
                            </div>
                            <div class="form-group">
                                <label for="anioLectivo" class="col-form-label">Año Lectivo:</label>
                                <input type="text" class="form-control" id="anioLectivo" name="anioLectivo">
                            </div>
                            <div class="form-group">
                                <label for="ip" class="col-form-label">IP:</label>
                                <input type="text" class="form-control" id="ip" name="ip">
                            </div>
                            <div class="form-group">
                                <label for="iip" class="col-form-label">IIP:</label>
                                <input type="text" class="form-control" id="iip" name="iip">
                            </div>

                            <div class="form-group">
                                <label for="iiip" class="col-form-label">IIIP:</label>
                                <input type="text" class="form-control" id="iiip" name="iiip">
                            </div>
                            <div class="form-group">
                                <label for="ivp" class="col-form-label">IVP:</label>
                                <input type="text" class="form-control" id="ivp" name="ivp">
                            </div>

                            <div class="form-group">
                                <label for="nf" class="col-form-label">NF:</label>
                                <input type="text" class="form-control" id="nf" name="nf">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
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

<?php include_once "../assets/footer.php"; ?>