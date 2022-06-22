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
            <h4 class="card-title"> Editar Productos</h4>
          </div>
          <div class="card-body">
            <form action="<?=URL?>productos/editar" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Codigo Producto</label>
            <input type="text" class="form-control"   name='id_producto'aria-describedby="emailHelp" value="<?=$producto->getId_producto()?>" readonly>

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control"  name='nombre' aria-describedby="emailHelp" value="<?=$producto->getNombre()?>">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Precio Venta</label>
                <input type="text" class="form-control"  name='precio' aria-describedby="emailHelp"value="<?=$producto->getPrecio()?>">
              </div>
             
              <div class="form-group col-md-6">
                <label for="tipoProducto" '> Categoria </label>
                <select name='id_categoria' class="form-control" required>
                  <?php
                  foreach ($categorias as $cat) {
                  ?>
                    <option value="<?= $cat->getId_categoria() ?>" <?= $cat->getId_categoria() === $producto->getId_categoria()?"selected":"";?>>
                      <?= $cat->getNombre() ?>
                    </option>
                  <?php }
                  ?>
                </select>
              </div>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
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
require_once 'views/farmacia/includes/scripts.php';
?>