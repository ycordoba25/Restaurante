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
                        <h4 class="card-title"> Listado de Proveedores</h4>
                        <a href="<?= URL ?>proveedor/nuevo"> Agregar Proveedores </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        id
                                    </th>
                                    <th>
                                        nombre
                                    </th>
                                    <th>
                                        Empresa
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($lista_proveedores as $proveedor) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $proveedor->getId_proveedor() ?>
                                            </td>
                                            <td>
                                                <?= $proveedor->getNombre() ?>
                                            </td>
                                            <td>
                                                <?= $proveedor->getEmpresa() ?>
                                            </td>

                                            <td>
                                                <a href="<?= URL ?>proveedor/eliminar/<?= $proveedor->getId_proveedor() ?>"> Eliminar</a>
                                                <a href="<?= URL ?>proveedor/editar/<?= $proveedor->getId_proveedor() ?>"> Editar</a>
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