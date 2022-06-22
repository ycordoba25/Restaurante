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
            <h4 class="card-title"> Editar Proveedor</h4>
          </div>
          <div class="card-body">
            <form action="<?= URL ?>proveedor/editar" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">ID Proveedor</label>
                <input type="text" class="form-control" name='id_proveedor' aria-describedby="emailHelp" value="<?= $proveedor->getId_proveedor() ?>" readonly>

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name='nombre' aria-describedby="emailHelp" value="<?= $proveedor->getNombre() ?>">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Empresa</label>
                <input type="text" class="form-control" name='empresa' aria-describedby="emailHelp" value="<?= $proveedor->getEmpresa() ?>">
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