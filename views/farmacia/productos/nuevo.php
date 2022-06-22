<!DOCTYPE html>
<html lang="en">
<?php
require_once 'views/farmacia/includes/header.php';
require_once 'views/farmacia/includes/sidebar.php';
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


  <div class="main-panel">
    <?php
    require_once 'views/farmacia/includes/navbar.php';
    ?>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Nuevo Productos</h4>
            </div>
            <div class="card-body">
              <form action="<?= URL ?>productos/nuevo" method="POST">

                <div class="form-group">
                  <label for="exampleInputEmail1">Codigo Producto</label>
                  <input type="number" min="0" class="form-control" name='id_producto' aria-describedby="emailHelp">

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name='nombre' aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Precio Venta</label>
                  <input type="text" class="form-control" name='precio' aria-describedby="emailHelp">
                </div>

                <div class="form-group col-md-6">
                  <label for="tipoProducto" '>Categoria</label>

                <select name=' id_categoria' class="form-control" required>
                    <?php
                    foreach ($categorias as $cat) {
                    ?>
                      <option value="<?= $cat->getId_categoria() ?>">
                        <?= $cat->getNombre() ?>
                      </option>
                    <?php }
                    ?>
                    </select>

                </div>
                <div class="form-group">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Carne</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Pan</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Cebolla</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Tomate</label>
                  </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

            </form>

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
  // require_once 'views/farmacia/includes/scripts.php';
  ?>
</body>

</html>