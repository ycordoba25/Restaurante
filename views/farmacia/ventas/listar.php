<?php
require_once 'views/farmacia/includes/header.php';
require_once 'views/farmacia/includes/sidebar.php';
?>
<style>
    .categorias {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-auto-rows: 100px;
        grid-gap: 5px;
    }

    #productos {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-auto-rows: 100px;
        grid-gap: 5px;
    }

    .item-categoria {
        background-color: aqua;
        text-align: center;
        font-size: 20px;
        line-height: 100px;
    }



    .producto {
        background-color: antiquewhite;
        font-size: 20px;
        line-height: 100px;
        text-align: center;
    }
</style>
<div class="main-panel">
    <?php
    require_once 'views/farmacia/includes/navbar.php';
    ?>
    <div class="content">
        <?php
        if (isset($_GET['s'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" id="ventaExito" role="alert">
                <strong>Venta Registrada Con Exito!</strong> sigue registrando mas ventas.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                const alert = document.getElementById("ventaExito");
                setTimeout(() => {
                    alert.hidden = "true";
                }, 1500)
            </script>
        <?php

        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Mis Ventas</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <img src="https://cdn.metro-group.com/nextcms/-/media/Project/MCW/ES_Makro/Info-y-servicios/productos/Carnes/Hamburguesas/cabecera-hamburguesas.jpg?rev=f27036d157944a2e9c1c2e9c4f1bb8bf&w=1416&hash=DD015219981C46B0E19A83C2DAF2B204" width="20px" alt="">
                                </div>
                                <div class="row">
                                    <form action="" method="post" style="text-align:center" id="form-factura">

                                        <table class="table table-striped table-hover mt-5">
                                            <thead>
                                                <th>
                                                <td>Cantidad</td>
                                                <td>Descripción</td>
                                                <td>Precio</td>
                                                <td></td>
                                                </th>
                                            </thead>
                                            <tbody id="factura">

                                            </tbody>
                                        </table>
                                        <div id="total">
                                        </div>

                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Información del Pago</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Cliente:</label>
                                                            <select id="cliente" class="form-control" required>
                                                                <?php
                                                                foreach ($clientes as $cliente) {
                                                                ?>
                                                                    <option value="<?= $cliente->getId_cliente() ?>">
                                                                        <?= $cliente->getNombre() ?> - <?= $cliente->getTelefono() ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Metodo de Pago:</label>
                                                            <input type="text" class="form-control" id="metodoPago" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label">Detalles:</label>
                                                            <textarea class="form-control" id="detalles"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="button" class="btn btn-primary" id="btn-aceptar">Aceptar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Pagar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7 ">
                                <div class="row">
                                    <div class="categorias " style="cursor: pointer">
                                        <?php
                                        foreach ($categorias as $c) {
                                        ?>
                                            <div class="item-categoria" data-id="<?= $c->getId_categoria() ?>"><?= $c->getNombre() ?> </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <dic class="row">
                                    <div id="productos" style="cursor: pointer">

                                    </div>
                                </dic>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ventaForm" style="display: none;"></div>
    <?php
    require_once 'views/farmacia/includes/navbar.php';
    ?>

</div>

<?php
require_once 'views/farmacia/includes/scripts.php';
?>
<script src="<?= URL ?>public/js/custom.js"></script>