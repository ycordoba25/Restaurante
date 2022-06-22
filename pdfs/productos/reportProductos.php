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
    <h1 style="text-align: center;">Reporte de Productos!!</h1>
    <hr>
    <br>
    <table border="1" style="border-collapse: collapse;">
        <thead>

            <tr>

                <th>Id</th>

                <th>Nombre</th>

                <th>Precio</th>

                <th>Categoria</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach ($contenido['productos'] as $p) { ?>
                <tr>

                    <td><?= $p->getId_producto() ?></td>

                    <td><?= $p->getNombre() ?></td>

                    <td><?= $p->getPrecio() ?></td>

                    <td><?= $p->getId_categoria() ?></td>

                </tr>
            <?php } ?>
        </tbody>

    </table>
    <br>
    <h3 style="text-align: center;">Categorias</h3>
    <hr>
    <br>
    <table border="1" style="border-collapse: collapse;">
        <thead>

            <tr>

                <th>Id</th>

                <th>Categoria</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach ($contenido['categorias'] as $c) { ?>
                <tr>

                    <td><?= $c->getId_categoria() ?></td>

                    <td><?= $c->getNombre() ?></td>

                </tr>
            <?php } ?>
        </tbody>

    </table>

    <br>
    <br>
    <hr>
    <br>
    <br>
    <img src="https://blog.gs1mexico.org/hs-fs/hubfs/Newsletter/2017/Septiembre%202017/Clasificacion%20de%20Productos%20SAT%20ONU%20UNSPSC%20GS1%20Mexico%20Syncfonia%20Factura%20Blog.png?width=690&height=372&name=Clasificacion%20de%20Productos%20SAT%20ONU%20UNSPSC%20GS1%20Mexico%20Syncfonia%20Factura%20Blog.png" alt="" width="300px" style="margin-left: 46px;">
</body>

</html>