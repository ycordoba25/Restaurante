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
            <h4 class="card-title"> Nuevo insumos</h4>
          </div>
          <div class="card-body">
            <form action="<?=URL?>insumos/nuevo" method="POST">

              <div class="form-group">
                <label for="exampleInputEmail1">id insumo</label>
                <input type="number" min="0" class="form-control"   name='id_insumo'aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control"  name='nombre' aria-describedby="emailHelp">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Cantidad</label>
                <input type="text" class="form-control"  name='cantidad' aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">unidad de medida</label>
                <input type="text" class="form-control"  name='unidadmedida' aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Precio </label>
                <input type="text" class="form-control"  name='precio' aria-describedby="emailHelp">
              </div>

              <div class="form-group col-md-6">
                <label for="tipoproveedor" '>Proveedor</label>

                <select name='id_proveedor' class="form-control" required>
                  <?php
                  foreach ($proveedor as $pro) {
                  ?>
                    <option value="<?= $pro->getId_proveedor() ?>">
                      <?= $pro->getNombre() ?>
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