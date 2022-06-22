<?php
require_once 'views/cajeros/includes/header.php';
require_once 'views/cajeros/includes/sidebar.php';
?>

<div class="main-panel">
  <?php
  require_once 'views/cajeros/includes/navbar.php';
  ?>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Editar Clientes</h4>
          </div>
          <div class="card-body">
            <form action="<?= URL ?>clientes/editar" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Codigo Producto</label>
                <input type="text" class="form-control" name='id_cliente' aria-describedby="emailHelp" value="<?= $cliente->getId_Cliente() ?>" readonly>

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name='nombre' aria-describedby="emailHelp" value="<?= $cliente->getNombre() ?>">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Direccion</label>
                <input type="text" class="form-control" name='direccion' aria-describedby="emailHelp" value="<?= $cliente->getDireccion() ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Telefono</label>
                <input type="text" class="form-control" name='telefono' aria-describedby="emailHelp" value="<?= $cliente->getTelefono() ?>">
              </div>

          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
          </div>
          <button type="submit" class="btn btn-primary">aceptar</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once 'views/cajeros/includes/navbar.php';
?>

</div>

<?php
require_once 'views/cajeros/includes/scripts.php';
?>