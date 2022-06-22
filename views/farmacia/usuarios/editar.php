<?php
require_once 'views/includes/header.php';
require_once 'views/includes/sidebar.php';
?>

<div class="main-panel">
    <?php
    require_once 'views/includes/navbar.php';
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
            <input type="text" class="form-control"   name='codPro'aria-describedby="emailHelp" value="<?=$producto->getCod_producto()?>" readonly>

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control"  name='nombre' aria-describedby="emailHelp" value="<?=$producto->getNombre()?>">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Precio Venta</label>
                <input type="text" class="form-control"  name='precioVen' aria-describedby="emailHelp"value="<?=$producto->getPrecioVenta()?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Precio Compra</label>
                <input type="text" class="form-control" name='precioCom'  aria-describedby="emailHelp"value="<?=$producto->getPrecioCompra()?>">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Fecha Vencimiento</label>
                <input type="date" class="form-control"  name='fecha' aria-describedby="emailHelp"value="<?=$producto->getFechaVenci()?>">

              </div>
              <div class="form-group col-md-6">
                <label for="tipoProducto" '> Tipo Producto </label>
                <select name='tipoPro' class="form-control" required>
                  <?php
                  foreach ($tiposDeProductos as $tipo) {
                  ?>
                    <option value="<?= $tipo->getCod_tipoProd() ?>">
                      <?= $tipo->getNombre() ?>
                    </option>
                  <?php }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="tipoProducto"> Proveedor </label>
                <select name="proveedor" class="form-control" required>
                <?php
                  foreach ($tiposDeProveedores as $tipo) {
                  ?>
                <option value="<?= $tipo->getCedula() ?>">
                      <?= $tipo->getNombre() ?>
                    </option>
                    <?php }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="tipoProducto"> Tipo Presentacion </label>
                <select name="presentacion"  class="form-control" required>
                <?php
                  foreach ($tiposDePresentacion as $tipo) {
                  ?>
                  <option value="<?= $tipo->getCod_presentacion() ?>">
                      <?= $tipo->getNombre() ?>
                    </option>
                    <?php }
                  ?>
                </select>
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" aria-describedby="emailHelp" value="<?=$producto->getCantidad()?>" >

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
require_once 'views/includes/navbar.php';
?>

</div>

<?php
require_once 'views/includes/scripts.php';
?>