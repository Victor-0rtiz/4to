<?php
include_once "server/zona_priv.php";
include_once "assets/cabecera.php";
include_once "modelos/usuarios.php";
?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php include_once "assets/menu.php"; ?>
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
                    <h1 class="h3 mb-0 text-gray-800 mt-5">Usuarios</h1>
                </div>

                <!-- /.Escriban acá el contenido -->

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <button id="btnNuevo" class="btn btn-primary" data-toggle="modal" data-target="#modalCRUD">Nuevo</button>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="tablaUsuario" class="table table-striped table-bordered table-condensed" style="width:100%">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Usuario</th>
                                            <th>Contraseña</th>
                                            <th>Fecha de Nacimiento</th>
                                            <th>Celular</th>
                                            <th>Tipo de Usuario</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $objeto = new usuarios();
                                        $consulta = $objeto->readUsuario();
                                        while ($dat = mysqli_fetch_array($consulta)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $dat['idUsuario'] ?></td>
                                                <td><?php echo $dat['Pnombre'] ?></td>
                                                <td><?php echo $dat['Papellido'] ?></td>
                                                <td><?php echo $dat['Usuario'] ?></td>
                                                <td><?php echo $dat['Contra'] ?></td>
                                                <td><?php echo $dat['fecha_nacimiento'] ?></td>
                                                <td><?php echo $dat['Celular'] ?></td>
                                                <td><?php echo $dat['Tipo_usuario'] ?></td>
                                                <td>
                                                    <button class="btn-primary editarBtn" data-toggle="modal" data-target="#modalEditar" data-id="<?php echo $dat['idUsuario'] ?>">Editar</button>
                                                    <button class="btn-danger borrarBtn" data-id="<?php echo $dat['idUsuario'] ?>">Eliminar</button>
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
                                <h5 class="modal-title" id="exampleModalLabel"> Agregar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="formUsuario" method="POST" action="index.php">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido" class="col-form-label">Apellido:</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido">
                                    </div>
                                    <div class="form-group">
                                        <label for="Usuario" class="col-form-label">Usuario:</label>
                                        <input type="text" class="form-control" id="Usuario" name="usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="Contra" class="col-form-label">Contraseña:</label>
                                        <input type="password" class="form-control" id="Contra" name="contra">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_nacimiento" class="col-form-label">Fecha de Nacimiento:</label>
                                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                                    </div>
                                    <div class="form-group">
                                        <label for="Celular" class="col-form-label">Celular:</label>
                                        <input type="text" class="form-control" id="Celular" name="celular">
                                    </div>
                                    <div class="form-group">
                                        <label for="Tipo_usuario" class="col-form-label">Tipo de Usuario:</label>
                                        <input type="text" class="form-control" id="Tipo_usuario" name="tipo_usuario">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Modal para editar -->
                <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="Pnombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="Pnombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="Papellido" class="col-form-label">Apellido:</label>
                                        <input type="text" class="form-control" id="Papellido">
                                    </div>
                                    <div class="form-group">
                                        <label for="Usuario" class="col-form-label">Usuario:</label>
                                        <input type="text" class="form-control UsuarioEdit" id="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <label for="Contra" class="col-form-label">Contraseña:</label>
                                        <input type="password" class="form-control ContraEdit" id="Contra">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_nacimiento" class="col-form-label">Fecha de Nacimiento:</label>
                                        <input type="date" class="form-control fecha_nacimientoEdit" id="fecha_nacimiento">
                                    </div>
                                    <div class="form-group">
                                        <label for="Celular" class="col-form-label">Celular:</label>
                                        <input type="text" class="form-control CelularEdit" id="Celular">
                                    </div>
                                    <div class="form-group">
                                        <label for="Tipo_usuario" class="col-form-label">Tipo de Usuario:</label>
                                        <input type="text" class="form-control Tipo_usuarioEdit" id="Tipo_usuario">
                                        <input type="hidden" class="form-control idUsuarioEdit" id="idUsuario">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary btn-edit-guardar" data-edit="">Guardar cambios</button>
                                    </div>
                                </form>
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



<?php include_once "assets/footer.php"; ?>