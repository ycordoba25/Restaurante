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
                        <h4 class="card-title"> Listado de Productos</h4>
                        <a href="<?=URL?>productos/nuevo"> Agregar Productos </a>
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
                                        precio
                                    </th>
                                
                                    <th>
                                        categoria
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($lista_productos as $producto) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $producto->getid_producto() ?>
                                            </td>
                                            <td>
                                                <?= $producto->getNombre() ?>
                                            </td>
                                            <td>
                                                <?= $producto->getPrecio() ?>
                                            </td>
                                            <td>
                                                <?= $producto->getId_categoria() ?>
                                            </td>
                                            <td>
                                               <a href="<?=URL?>productos/eliminar/<?= $producto->getId_producto()?>"> Eliminar</a>
                                               <a href="<?=URL?>productos/editar/<?= $producto->getId_producto()?>"> Editar</a>
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