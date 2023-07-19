<?php include_once "../assets/cabecera.php"; 
include_once "../server/zona_priv.php";?>
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
                    <h1 class="h3 mb-0 text-gray-800 mt-5">Padre o Tutor</h1>
                </div>

                <!-- /.Escriban acá el contenido -->
                <div class="container">
               <form method="post" class="form-horizontal">
               <div class="form-group">
                 <label for="tutor" class="col-sm-2 control-label">ID:</label>
                   <div class="col-sm-10">
                     <input type="text" id="tutor" name="tutor" class="form-control" required>
                    </div>
                 </div>

                    <div class="form-group">
                     <label for="apellido" class="col-sm-2 control-label">Cédula:</label>
                       <div class="col-sm-10">
                         <input type="text" id="apellido" name="apellido" class="form-control" required>
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
