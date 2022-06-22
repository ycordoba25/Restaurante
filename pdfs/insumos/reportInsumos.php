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
            margin-left: 40px;
            text-align: left;
        }
    </style>
</head>

<body>
    <span><?= date('d-m-Y h:i:s a', time()) ?></span>
    <br>
    <h1 style="text-align: center;">Reporte de Insumos!!</h1>
    <hr>
    <br>
    <table border="1" style="border-collapse: collapse;">
        <thead>

            <tr>
                <th>Cantidad</th>
                <th>Nombre</th>



                <th>Proveedor</th>

                <th>Precio</th>



                <th>Unidad de medida</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach ($contenido['insumos'] as $insumo) { ?>
                <tr>
                    <td><?= $insumo->getCantidad() ?></td>
                    <td><?= $insumo->getNombre() ?></td>



                    <td><?= $insumo->getId_proveedor() ?></td>

                    <td><?= $insumo->getPrecio() ?></td>

                    <td><?= $insumo->getUnidadmedida() ?></td>

                </tr>
            <?php } ?>
        </tbody>

    </table>
    <br>
    <hr>
    <br>
</body>

</html>