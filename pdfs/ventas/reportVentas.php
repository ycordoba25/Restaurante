<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,
        td {
            padding: 8px;
        }

        table {
            font-size: 12pt;
            margin-left: 190px;
            text-align: left;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h6>Lover´s Burguer</h6>
    <?php
    $totalventas = 0;
    ?>
    <span><?= date('d-m-Y h:i:s a', time()) ?></span>
    <br>
    <h1 style="text-align: center;">REPORTE DE VENTAS </h1>
    <H4 style="text-align: center;">Del <?= $contenido['fechaInicio']  ?> hasta <?= $contenido['fechaFin']  ?></H4>
    <hr>
    <?php
    foreach ($contenido['ventas'] as $venta) {
    ?>

        <br>
        <table border="1" style="border-collapse: collapse;">
            <thead>

                <tr>

                    <th colspan="6" class="center">INFORMACIÓN DE LA VENTA</th>

                </tr>

            </thead>

            <tbody>

                <tr>
                    <th>Fecha y hora de la Venta</th>
                    <td colspan="5"><?= $venta->getFecha() ?></td>
                </tr>
                <tr>
                    <th>Nombre Cliente</th>
                    <td colspan="5"><?= $venta->getId_cliente() ?></td>
                </tr>
                <tr>
                    <th>Metodo de Pago</th>
                    <td colspan="5"><?= $venta->getMetodo_pago() ?></td>

                </tr>
                <tr>
                    <th colspan="6" class="center">PRODUCTOS</th>

                </tr>
                <?php
                $totalventas += $venta->getPrecio();
                foreach ($venta->getId_venta() as $producto) {
                ?>
                    <tr>
                        <td colspan="6" class="center"><?= $producto ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <th colspan="3" class="center">Valor Venta</th>
                    <td colspan="3" class="center"> $ <?= $venta->getPrecio() ?></td>

                </tr>
            </tbody>

        </table>
        <br>
        <hr>

    <?php
    }
    ?>
    <br>
    <h4 class="center">Total valor ventas en el periodo seleccionado: $ <?= $totalventas ?></h4>
</body>

</html>