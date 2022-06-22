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
                        <h4 class="card-title"> Listado de Clientes</h4>
                        <a href="<?=URL?>clientes/nuevo"> Agregar Clientes </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        id Cliente
                                    </th>
                                    <th>
                                        nombre
                                    </th>
                                    <th>
                                        direccion
                                    </th>
                                
                                    <th>
                                        telefono
                                    </th>
                                    <th>
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($lista_clientes as $clientes) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $clientes->getId_cliente() ?>
                                            </td>
                                            <td>
                                                <?= $clientes->getNombre() ?>
                                            </td>
                                            <td>
                                                <?= $clientes->getDireccion() ?>
                                            </td>
                                            <td>
                                                <?= $clientes->getTelefono() ?>
                                            </td>
                                            <td>
                                               <a href="<?=URL?>clientes/eliminar/<?= $clientes->getId_cliente()?>"> Eliminar</a>
                                               <a href="<?=URL?>clientes/editar/<?= $clientes->getId_cliente()?>"> Editar</a>
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