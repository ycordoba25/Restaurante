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
            <h4 class="card-title"> Nuevo Clientes</h4>
          </div>
          <div class="card-body">
            <form action="<?= URL ?>clientes/nuevo" method="POST">

              <div class="form-group">
                <label for="exampleInputEmail1">id Cliente</label>
                <input type="number" min="0" class="form-control" name='id_cliente' aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name='nombre' aria-describedby="emailHelp">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">direccion</label>
                <input type="text" class="form-control" name='direccion' aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">telefono</label>
                <input type="text" class="form-control" name='telefono' aria-describedby="emailHelp">
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
require_once 'views/cajeros/includes/navbar.php';
?>

</div>

<?php
require_once 'views/cajeros/includes/scripts.php';
?>