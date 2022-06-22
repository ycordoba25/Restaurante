<?php
require_once 'views/farmacia/includes/header.php';
require_once 'views/farmacia/includes/sidebar.php';
?>

<div class="main-panel">
    <?php
    require_once 'views/farmacia/includes/navbar.php';
    ?>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Reportes</h4>
                    </div>
                    <div class="card-body">
                        <br>
                        <h3 style="text-align: center;">Accede a reportes en formato pdf</h3>

                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://michoacancoronavirus.com/nuevaconvivencia/assets/img/pdf-icon.png" alt="" width="200px">
                                <br>
                                <hr>
                                <br>
                                <a class="btn btn-outline-primary" href="<?= URL ?>reportes/downloadInsumos">descargar reporte de insumos</a>
                            </div>
                            <div class="col-md-3">
                                <img src="https://michoacancoronavirus.com/nuevaconvivencia/assets/img/pdf-icon.png" alt="" width="200px">
                                <br>
                                <hr>
                                <br>
                                <a class="btn btn-outline-primary" href="<?= URL ?>reportes/downloadProductos">descargar reporte de productos</a>
                            </div>
                            <div class="col-md-3">
                                <img src="https://michoacancoronavirus.com/nuevaconvivencia/assets/img/pdf-icon.png" alt="" width="200px">
                                <br>
                                <hr>
                                <br>
                                <form action="<?= URL ?>reportes/downloadVentas" method="post">
                                    <div class="input-group">
                                        <span class="input-group-text">Fecha inicio</span>
                                        <input type="date" required aria-label="First name" name="fecha_inicio" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text">Fecha fin</span>
                                        <input type="date" required aria-label="First name" name="fecha_fin" class="form-control">
                                    </div>
                                    <button class="btn btn-outline-danger">descargar reporte de ventas</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once 'views/farmacia/includes/navbar.php';
    ?>
</div>

<?php
require_once 'views/farmacia/includes/scripts.php';
?>