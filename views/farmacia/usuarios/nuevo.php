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
            <h4 class="card-title"> Nuevo Usuarios</h4>
          </div>
          <div class="card-body">
            <form action="<?=URL?>usuario/nuevo" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Cedula</label>
                <input type="text" class="form-control"   name='cedula'aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" class="form-control"  name='usuario' aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control"  name='nombre' aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Direccion</label>
                <input type="text" class="form-control" name='direccion'  aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Telefono</label>
                <input type="text" class="form-control"  name='telefono' aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Sexo</label>
                <input type="text" class="form-control"  name='sexo' aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Rol</label>
                <input type="text" class="form-control"  name='rol' aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Contraseña</label>
                <input type="password" class="form-control"  name='contrasena' aria-describedby="emailHelp">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Pin Dueño</label>
                <input type="password" class="form-control"  name='cod_dueno' aria-describedby="emailHelp">

              </div>
              <div class="form-group col-md-6">
                <label > Codigo Ciudad </label>
                <select name="cod_ciudad" class="form-control" required>
                <?php
                  foreach ($ciudades as $ciudad) {
                  ?>
                <option value="<?= $ciudad->getId_ciudad() ?>">
                      <?= $ciudad->getNombre()?>
                    </option>
                    <?php }
                  ?>
                </select>
              </div>
          </div>
          
          <div class="form-group form-check">
            
          </div>
          <button type="submit" class="btn btn-primary">Agregar</button>

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