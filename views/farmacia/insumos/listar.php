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
                        <h4 class="card-title"> Listado de Insumos</h4>
                        <a href="<?=URL?>insumos/nuevo"> Agregar Insumos </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        codigo
                                    </th>
                                    <th>
                                        nombre
                                    </th>
                                    <th>
                                        cantidad
                                    </th>
                                
                                    <th>
                                        proveedor
                                    </th>
                                    <th>
                                        precio
                                    </th>
                                    <th>
                                        Unidad de Medida
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($lista_insumos as $insumo) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $insumo->getId_insumo() ?>
                                            </td>
                                            <td>
                                                <?= $insumo->getNombre() ?>
                                            </td>
                                            <td>
                                                <?= $insumo->getCantidad() ?>
                                            </td>
                                            <td>
                                                <?= $insumo->getId_proveedor() ?>
                                            </td>
                                            <td>
                                                <?= $insumo->getPrecio() ?>
                                            </td>
                                            <td>
                                                <?= $insumo->getUnidadmedida() ?>
                                            </td>
                                            <td>
                                               <a href="<?=URL?>insumos/eliminar/<?= $insumo->getId_insumo()?>"> Eliminar</a>
                                               <a href="<?=URL?>insumos/editar/<?= $insumo->getId_insumo()?>"> Editar</a>
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
        </div>
    </div>

    <?php
    require_once 'views/farmacia/includes/navbar.php';
    ?>

</div>

<?php
require_once 'views/farmacia/includes/scripts.php';
?>