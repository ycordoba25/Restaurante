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
                        <h4 class="card-title"> Listado de Usuarios</h4>
                        <a href="<?=URL?>Usuario/nuevo"> Agregar Usuarios </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Cedula
                                    </th>
                                    <th>
                                        usuarios
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Direccion
                                    </th>
                                    <th>
                                        Sexo
                                    </th>
                                    <th>
                                        Telefono
                                    </th>
                                    <th>
                                        Rol
                                    </th>
                                    <th>
                                        Contraseña
                                    </th>
                                    <th>
                                        Codigo Dueño
                                    </th>
                                    <th>
                                        Codigo Ciudad
                                    </th>
                                    <th>
                                       Acciones 
                                    </th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach  ($lista_usuarios as $usuarios) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $usuarios->getCedula() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getUsuario() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getNombre() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getDireccion() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getTelefono() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getSexo() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getRol() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getContrasena() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getCod_dueno() ?>
                                            </td>
                                            <td>
                                                <?= $usuarios->getCod_ciudad() ?>
                                            </td>
                                            <td>
                                               <a href="<?=URL?>usuario/eliminar/<?= $usuarios->getCedula()?>"> Eliminar</a>
                                    
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